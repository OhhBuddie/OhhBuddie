<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function checkout(Request $request)
    {
        
            
        if ($request->total_payable >= 200 && $request->total_payable <= 499) {
            $shipping_cost = 49;
        } elseif ($request->total_payable >= 499 && $request->total_payable <= 799) {
            $shipping_cost  = 29;
        } else {
            $shipping_cost =  0;
        }
        

        $order_id = 'OBD-ODR-' . now()->year . '-' . now()->format('YdmHis');

        $products = json_decode($request->products, true);
        // if (is_string($products)) {
        //     $products = json_decode($products, true);
        // }
   
        // return $products;

        $totalQuantity = count($products);
        
        // Store order details
        $order = Order::create([
            'order_id' => $order_id,
            'quantity' => $totalQuantity,
            'user_id' => Auth::id() ?? null,
            'guest_id' => Auth::check() ? null : session('temp_user_id'),
            'shipping_address' => $request->address_id,
            'payment_type' => 'Online Payment',
            'payment_status' => 'Pending',
            'grand_total' => $request->total_payable,
            'coupon_discount' => $request->total_discount,
            'total_mrp' => $request->total_mrp,
            'order_status' => 'Order Confirmed',
            'shipping_cost' => $shipping_cost,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($products as $cart_id => $quantity) {
            $cartItem = DB::table('carts')->where('id', $cart_id)->latest()->first();
            $product = DB::table('products')->where('id', $cartItem->product_id)->latest()->first();
        
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'seller_id' => $product->seller_id,
                'cart_id' => $cart_id,
                'quantity' => $quantity,
                'price' => $request->total_price / count($products),
                'tax' => $request->total_tax / count($products),
                'payment_status' => 'Pending',
                'delivery_status' => 'Order Confirmed',
                'shipping_cost' => $shipping_cost,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        // foreach ($products as $product_id => $quantity) {
        //     $pid = DB::table('carts')->where('id', $product_id)->latest()->first();
        //     $seller_id = DB::table('products')->where('id', $pid->product_id)->latest()->first();
        //     OrderDetail::create([
        //         'order_id' => $order->id,
        //         'product_id' => $pid->product_id,
        //         'seller_id' => $seller_id->seller_id,
        //         'cart_id' => $product_id,
        //         'quantity' => $quantity,
        //         'price' => $request->total_price / count($products),
        //         'tax' => $request->total_tax / count($products),
        //         'payment_status' => 'Pending',
        //         'delivery_status' => 'Order Confirmed',
        //         'shipping_cost' => $shipping_cost,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Pay U Payments

            // Generate unique order ID
            // $orderId = 'ORD-' . strtoupper(Str::random(10));
            
            // Create transaction record with pending status
            $transaction = Transaction::create([
                'order_id' => $order_id,
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'amount' => $request->total_payable,
                'status' => 'pending'
            ]);

            // Prepare PayU payment parameters
            $txnid = $order_id;
            $amount = $request->total_payable;
            $productinfo = "Payment for order: " . $order_id;
            $firstname = Auth::user()->name;
            $email = Auth::user()->email;
            $phone = Auth::user()->phone ?? '';

            $key = '1maOcq';
            $salt = 'I9Pp40tbHr5qlKgzU7Lt2U1QgGTcprGp';
            
            // Set URLs dynamically here instead of in config
            $surl = route('payment.success');
            $furl = route('payment.failure');
            
            // Generate hash
            $hashString = "$key|$txnid|$amount|$productinfo|$firstname|$email|||||||||||$salt";
            $hash = strtolower(hash('sha512', $hashString));

            // PayU parameters
            $payuData = [
                'key' => $key,
                'hash' => $hash,
                'txnid' => $txnid,
                'amount' => $amount,
                'firstname' => $firstname,
                'email' => $email,
                'phone' => $phone,
                'productinfo' => $productinfo,
                'surl' => $surl,
                'furl' => $furl,
                'service_provider' => 'payu_paisa',
            ];

       
            // PayU payment URL (live or test)
            // $payuUrl = config('payu.mode') === 'live'
            //     ? 'https://secure.payu.in/_payment'
            //     : 'https://test.payu.in/_payment';

            $payuUrl = 'https://secure.payu.in/_payment';

            return view('payment.redirect-to-payu', compact('payuData', 'payuUrl'));

    }

    
    public function paymentSuccess(Request $request)
    {

        $this->logPayUResponse($request, 'Success');
    
        if (!$request->has('txnid')) {
            return redirect('/addtocart')->with('error', 'Invalid payment response');
        }


        // Find the transaction by order ID (txnid)
        $transaction = Transaction::where('order_id', $request->txnid)->first();
        
        if ($transaction) {
            $transaction->update([
                'txn_id' => $request->mihpayid ?? null,
                'status' => 'completed',
                'payment_method' => $request->mode ?? 'online',
                'payment_details' => json_encode($request->all())
            ]);
            
            // Update orders table
            $order = DB::table('orders')->where('order_id', $request->txnid)->first();
            $phoneno = DB::table('users')->where('id', $order->user_id)->latest()->first();

            if ($order) {
                DB::table('orders')
                    ->where('order_id', $request->txnid)
                    ->update([
                        'payment_status' => 'completed',
                        'payment_type' => $request->mode ?? null
                    ]);

                // Update orderdetails table using the ID of the orders table
                DB::table('orderdetails')
                    ->where('order_id', $order->id)
                    ->update([
                        'payment_status' => 'completed',
                    ]);
            }
            
            
            
            try {
                // Get user's phone number
          
                if ($phoneno->phone) {
                    // Format phone number if needed
                    $phone = preg_replace('/[^0-9]/', '', $phoneno->phone);
                    
                    // If phone number doesn't start with country code, add it
                    if (strlen($phone) == 10) {
                        $phone = '91' . $phone;
                    }
                    
                    // Create a request object for the WhatsApp controller
                    $whatsappRequest = new Request([
                        'phone' => $phone,
                        'message' => "Your order has been confirmed and payment received successfully!",
                        'name' => $phoneno->name,
                        'id' => 1,
                        'orderid' => $request->txnid,
                        'price' => $order->grand_total
                    ]);
                    
                    // Call WhatsAppController's sendMessage method
                    $whatsappController = new WhatsAppController();
                    $whatsappController->sendMessage($whatsappRequest);
                    
                    // Log success
                    Log::info('WhatsApp notification sent for order: ' . $order->order_id);
                }
            } catch (\Exception $e) {
                // Log error but continue with the payment success flow
                Log::error('Failed to send WhatsApp notification: ' . $e->getMessage());
            }
            
           
            
        } else {
            // Handle case where transaction is not found
            return redirect('/addtocart')->with('error', 'Transaction not found');
        }

        // return view('payment.payment-success', compact('transaction'));
        return redirect('/order-confirm');
    }

    public function paymentFailure(Request $request)
    {
        $this->logPayUResponse($request, 'Failure');

        if (!$request->has('txnid')) {
            return redirect('/addtocart')->with('error', 'Invalid payment response');
        }
        // Find the transaction by order ID (txnid)
        $transaction = DB::table('transactions')->where('order_id', $request->txnid)->first();
        

        if ($transaction) {
            // Update transactions table
            DB::table('transactions')
                ->where('order_id', $request->txnid)
                ->update([
                    'txn_id' => $request->mihpayid ?? null,
                    'status' => 'failed',
                    'payment_details' => json_encode($request->all()),
                ]);

            // Update orders table
            $order = DB::table('orders')->where('order_id', $request->txnid)->first();
            $orderDetailsCount = DB::table('orderdetails')->where('order_id', $order->id)->count();
            $phoneno = DB::table('users')->where('id', $order->user_id)->latest()->first();

            if ($order) {
                DB::table('orders')
                    ->where('order_id', $request->txnid)
                    ->update([
                        'payment_status' => 'failed',
                    ]);

                // Update orderdetails table using the ID of the orders table
                DB::table('orderdetails')
                    ->where('order_id', $order->id)
                    ->update([
                        'payment_status' => 'failed',
                    ]);
            }
            
            
            
            try {
                // Get user's phone number
          
                if ($phoneno->phone) {
                    // Format phone number if needed
                    $phone = preg_replace('/[^0-9]/', '', $phoneno->phone);
                    
                    // If phone number doesn't start with country code, add it
                    if (strlen($phone) == 10) {
                        $phone = '91' . $phone;
                    }
                    
                   
                    // Create a request object for the WhatsApp controller
                    $whatsappRequest = new Request([
                        'phone' => $phone,
                        'message' => "Your order has been confirmed and payment received successfully!",
                        'name' => $phoneno->name,
                        'id' => 3,
                        'orderid' => $orderDetailsCount,
                        'price' => $order->grand_total
                    ]);
                    
                    // Call WhatsAppController's sendMessage method
                    $whatsappController = new WhatsAppController();
                    $whatsappController->sendMessage($whatsappRequest);
                    
                    // Log success
                    Log::info('WhatsApp notification sent for order: ' . $phoneno->phone);
                }
            } catch (\Exception $e) {
                // Log error but continue with the payment success flow
                Log::error('Failed to send WhatsApp notification: ' . $e->getMessage());
            }
            
           
            
            
        } 
        else {
            // Handle case where transaction is not found
            return redirect('/addtocart')->with('error', 'Transaction not found');
        }

        // return view('payment.payment-failure', compact('transaction'));
        return redirect('/addtocart')->with('error', 'Transaction not found');
    }

    private function logPayUResponse(Request $request, $status)
    {
        \Log::info("PayU {$status} Callback:", [
            'txnid' => $request->txnid,
            'mihpayid' => $request->mihpayid,
            'status' => $request->status,
            'all_data' => $request->all()
        ]);
    }


}
