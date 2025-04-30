<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; // Make sure you have this at the top



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myorders = Auth::check() ? DB::table('orders')->where('user_id', Auth::id())->latest()->get() : null;

        $order_data = [];
        
        if(!empty($myorders))
        {
            
            
            foreach($myorders as $orders)
            {
                $orderdetails = DB::table('orderdetails')->where('order_id',$orders->id)->latest()->first();
                $product_data = DB::table('products')->where('id',$orderdetails->product_id)->latest()->first();
                $brand_data = DB::table('brands')->where('id',$product_data->brand_id)->latest()->first();
                $color_data = DB::table('colors')->where('hex_code',$product_data->color_name)->latest()->first();
                
                $dat['id'] = $orderdetails->id;
                $dat['product_name'] = $product_data->product_name;
                $dat['brand_name'] = $brand_data->brand_name;
                $images = json_decode($product_data->images, true); 
                
                $dat['image'] = !empty($images) ? $images[0] : null;  
                $dat['size'] = $product_data->size_name;
                $dat['color'] = $color_data->color_name;
                $dat['date'] = Carbon::parse($orderdetails->created_at)->format('d-M-Y');
                $dat['status'] = $orderdetails->delivery_status;
                
                $order_data[] = $dat;
            }
            

        }
        return view('Order.index',compact('myorders','order_data'));
    }


    public function orderdetails($id)
    {
        $myorders = Auth::check() ? DB::table('orders')->where('user_id', Auth::id())->latest()->first() : null;
        
        return view('Order.orderdetails',compact('myorders', 'id'));
        
        
    }
    
    
    public function downloadInvoice($id)
    {
      
        $orderdetails = DB::table('orderdetails')->where('id', $id)->latest()->first();
        $order = DB::table('orders')->where('id', $orderdetails->order_id)->latest()->first();
        $product_data = DB::table('products')->where('id', $orderdetails->product_id)->first();
        $address_data = DB::table('addresses')->where('id', $order->shipping_address)->first();
        
        $brand_name = DB::table('brands')->where('id', $product_data->brand_id)->first();
        $color_data = DB::table('colors')->where('hex_code', $product_data->color_name)->first();
        $user_data = DB::table('users')->where('id', $address_data->user_id)->first();
        
        $data = compact('orderdetails', 'order', 'product_data', 'address_data', 'brand_name', 'color_data', 'user_data' );
        
        $pdf = Pdf::loadView('invoice', $data);
        
        // Set paper size (A4 portrait)
        $pdf->setPaper('a4', 'portrait');
        
        // Set minimal margins (in mm)
        $pdf->setOption('margin-top', '0');
        $pdf->setOption('margin-right', '0');
        $pdf->setOption('margin-bottom', '0');
        $pdf->setOption('margin-left', '0');
        
        // Ensure no automatic page breaks within elements
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        
        // Adjust scale if needed
        $pdf->setOption('dpi', 130); // Lower DPI can help fit more content
        
        return $pdf->download('invoice_'.$orderdetails->order_id.'.pdf');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    
    public function updateOrderStatus(Request $request, $id) 
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->save();
        
        
        $orderdetail = Orderdetail::findOrFail($id);
        $orderdetail->order_status = $request->order_status;
        $orderdetail->save();
    
        return response()->json(['success' => true, 'message' => 'Order status updated successfully.']);
    }
    
    public function returnandrefund($id)
    {
        $orderdetail = DB::table('orderdetails')->where('id',$id)->latest()->first();
        $order = DB::table('orders')->where('id',$orderdetail->order_id)->latest()->first();
        $product_details = DB::table('products')->where('id',$orderdetail->product_id)->latest()->first();
        return view('Order.returnandrefund',compact('orderdetail','product_details','order'));
    }


}
