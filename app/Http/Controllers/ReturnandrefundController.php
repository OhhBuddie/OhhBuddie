<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;
use App\Http\Controllers\WhatsAppController;

class ReturnandrefundController extends Controller
{

    public function returnandrefund($id)
    {
        $orderdetail = DB::table('orderdetails')->where('id',$id)->latest()->first();
        $order = DB::table('orders')->where('id',$orderdetail->order_id)->latest()->first();
        $product_details = DB::table('products')->where('id',$orderdetail->product_id)->latest()->first();
        $seller_details = DB::table('sellers')->where('seller_id',$product_details->seller_id)->latest()->first();
        return view('Order.returnandrefund',compact('orderdetail','product_details','order','seller_details'));
    }
    
    public function store(Request $request)
    {
    //   return $request;
        // Determine the selected reason
        $reason = $request->input('quality_reason') ??
                  $request->input('size_reason') ??
                  $request->input('mind_reason') ??
                  $request->input('different_reason') ??
                  $request->input('damaged_reason');
    
        // Prepare AWS S3 path
        $folderPath = "returnandrefund/{$request->oid}/{$request->pid}";
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension());
    
        // Create image resource
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $sourceImage = imagecreatefromjpeg($file->getPathname());
                break;
            case 'png':
                $sourceImage = imagecreatefrompng($file->getPathname());
                break;
            default:
                return back()->with('error', 'Unsupported image format.');
        }
    
        // Compress and capture output
        ob_start();
        imagejpeg($sourceImage, null, 70); // adjust quality if needed
        $imageData = ob_get_clean();
    
        // Store to S3
        $filePath = $folderPath . '/' . $fileName;
        Storage::disk('s3')->put($filePath, $imageData, 'public');
    
        // Cleanup
        imagedestroy($sourceImage);
    
        // Get public URL
        $imageUrl = Storage::disk('s3')->url($filePath);
    
        $transaction_data = DB::table('transactions')->where('order_id',$request->oid)->latest()->first();
        $order_data = DB::table('orders')->where('order_id',$request->oid)->latest()->first();
        $orderdetails_data = DB::table('orderdetails')->where('order_id',$order_data->id)->latest()->first();
        $product_data = DB::table('products')->where('id',$orderdetails_data->product_id)->latest()->first();
        
        // Save to DB
        DB::table('orderreturns')->insert([
            'return_category' => $request->input('section'),
            'product_id'             => $request->input('product_id'),
            'order_id'               => $request->input('order_id'),
            'user_id'                => $request->input('user_id'),
            'seller_id'              => $request->input('seller_id'),
            'seller_user_id'         => $request->input('seller_user_id'),
            'refund_source'          => $request->input('refund_source'),
            // 'transaction_id'         => $transaction_data->txn_id,
            // 'payment_mode'           => $transaction_data->payment_method,
            'paid_amount'            => $transaction_data->amount,
            'address_id'             => $order_data->shipping_address,
            'product_name'           => $product_data->product_name,
            // 'color'                  => $product_data->color_name,
            // 'size'                   => $product_data->size_name,
            // 'quantity'               => $orderdetails_data->quantity,
            'sku'                    => $product_data->sku,
            'return_reason'          => $reason,
            'image'                  => $imageUrl,
            'created_at'             => now(),
            'updated_at'             => now(),
        ]);
        
        
        $user = DB::table('users')->where('id', $request->user_id)->latest()->first();
        
        $phone = preg_replace('/[^0-9]/', '', $user->phone);
        if (strlen($phone) == 10) {
                $phone = '91' . $phone;
        }
                    
            // Now create the WhatsApp request with all seller data
            $whatsappRequest = new Request([
                'userphone' => $phone,
                'message' => "Your order has been confirmed and payment received successfully!",
                'username' => $user->name,
                'id' => 4,
                'oid' => $request->oid
            ]);
            
            $whatsappController = new WhatsAppController();
            $whatsappController->sendMessage($whatsappRequest);
        
            // $table->string('pickup_required');
            // $table->string('pickup_status');
            // $table->string('product_stored_in');
            // $table->string('refund_source');
            // $table->text('note')->nullable();
            // $table->timestamps();
        
    
        return redirect()->back()->with('success', 'Return request submitted successfully.');
    }

}