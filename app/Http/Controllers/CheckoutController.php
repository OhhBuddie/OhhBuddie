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

        // Pay U Payments

            // Generate unique order ID
            // $orderId = 'ORD-' . strtoupper(Str::random(10));
            
            // Create transaction record with pending status
            $transaction = Transaction::create([
                'order_id' => $order_id,
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'amount' => $request->total_mrp,
                'status' => 'pending'
            ]);

            // Prepare PayU payment parameters
            $txnid = $order_id;
            $amount = $request->total_mrp;
            $productinfo = "Payment for order: " . $order_id;
            $firstname = Auth::user()->name  ?? '';
            $email = Auth::user()->email  ?? '';
            $phone = Auth::user()->phone ?? '';
            $key = config('payu.key');
            $salt = config('payu.salt');
            
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
            $payuUrl = config('payu.mode') === 'live'
                ? 'https://secure.payu.in/_payment'
                : 'https://test.payu.in/_payment';

            return response()->json([
                'payu_url' => $payuUrl,
                'payu_data' => $payuData,
            ]);

    }

    
    public function paymentSuccess(Request $request)
    {

        $this->logPayUResponse($request, 'Success');
    
        if (!$request->has('txnid')) {
            return redirect()->route('checkout')->with('error', 'Invalid payment response');
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
        } else {
            // Handle case where transaction is not found
            return redirect()->route('checkout')->with('error', 'Transaction not found');
        }

        return view('payment.payment-success', compact('transaction'));
    }

    public function paymentFailure(Request $request)
    {
        $this->logPayUResponse($request, 'Failure');

        if (!$request->has('txnid')) {
            return redirect()->route('checkout')->with('error', 'Invalid payment response');
        }
        // Find the transaction by order ID (txnid)
        $transaction = Transaction::where('order_id', $request->txnid)->first();
        
        if ($transaction) {
            $transaction->update([
                'txn_id' => $request->mihpayid ?? null,
                'status' => 'failed',
                'payment_details' => json_encode($request->all())
            ]);
        } else {
            // Handle case where transaction is not found
            return redirect()->route('checkout')->with('error', 'Transaction not found');
        }

        return view('payment.payment-failure', compact('transaction'));
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
