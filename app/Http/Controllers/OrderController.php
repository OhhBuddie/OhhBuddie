<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



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
        
        return view('Order.orderdetails',compact('myorders'));
        
        
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
    


}
