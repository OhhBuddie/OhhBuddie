<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

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


    foreach ($products as $product_id => $quantity) {
        $pid = DB::table('carts')->where('id', $product_id)->latest()->first();
        $seller_id = DB::table('products')->where('id', $pid->product_id)->latest()->first();
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $pid->product_id,
            'seller_id' => $seller_id->seller_id,
            'cart_id' => $product_id,
            'quantity' => $quantity,
            'price' => $request->total_price / count($products),
            'tax' => $request->total_tax / count($products),
            'shipping_cost' => $request->total_shippingg === 'Free' ? 0 : $request->total_shippingg,
            'payment_status' => 'Pending',
            'delivery_status' => 'Order Confirmed',
            'shipping_cost' => $shipping_cost,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $order_id2 = 'order_' . rand(1111111111, 9999999999);
     

    $url = "https://sandbox.cashfree.com/pg/orders";
    $headers = [
        "Content-Type: application/json",
        "x-api-version: 2022-01-01",
        "x-client-id: " . env('CASHFREE_API_KEY'),
        "x-client-secret: " . env('CASHFREE_API_SECRET'),
    ];

    $data = json_encode([
        'order_id' => $order_id2,
        'order_amount' => $request->total_payable,
        "order_currency" => "INR",
        "customer_details" => [
            "customer_id" => 'customer_' . rand(111111111, 999999999),
            "customer_name" => Auth::user()->name ?? 'Guest',
            "customer_email" => Auth::user()->email ?? 'guest@example.com',
            "customer_phone" => $request->mobile ?? '0000000000',
        ],
        "order_meta" => [
            "return_url" => url('/cashfree/payments/success?order_id={order_id}&order_token={order_token}')
        ]
    ]);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $resp = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($resp);

    if (isset($response->payment_link)) {
        return response()->json([
            'payment_url' => $response->payment_link
        ]);
    } else {
        return response()->json(['error' => 'Payment initialization failed'], 500);
    }
}

}
