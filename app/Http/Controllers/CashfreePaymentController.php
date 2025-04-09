<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Payment;

use DB;

class CashfreePaymentController extends Controller
{
     public function create(Request $request)
     {
          return view('payment.payment-create');
     }

     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|min:3',
             'email' => 'required|email',
             'mobile' => 'required',
             'amount' => 'required|numeric'
         ]);
     
         $order_id = 'order_' . rand(1111111111, 9999999999);
     
         // Store the initial payment attempt
         $payment = DB::table('payments')->insert([
             'obd-order_id' => $order_id,
             'name' => $validated['name'],
             'email' => $validated['email'],
             'amount' => $validated['amount'],
             'status' => 'pending',
             'payment_mode' => null, // To be updated after success
         ]);
         
         
     
         $url = "https://sandbox.cashfree.com/pg/orders";
     
         $headers = [
             "Content-Type: application/json",
             "x-api-version: 2022-01-01",
             "x-client-id: " . env('CASHFREE_API_KEY'),
             "x-client-secret: " . env('CASHFREE_API_SECRET'),
         ];
     
         $data = json_encode([
             'order_id' => $order_id,
             'order_amount' => $validated['amount'],
             "order_currency" => "INR",
             "customer_details" => [
                 "customer_id" => 'customer_' . rand(111111111, 999999999),
                 "customer_name" => $validated['name'],
                 "customer_email" => $validated['email'],
                 "customer_phone" => $validated['mobile'],
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
             return redirect()->to($response->payment_link);
         } else {
             return back()->with('error', 'Payment initialization failed');
         }
     }
     

     public function paymentSuccess(Request $request)
     {
         $order_id = $request->order_id;
         $order_token = $request->order_token;
     
         // Verify Payment Status via Cashfree API
         $url = "https://sandbox.cashfree.com/pg/orders/" . $order_id;
     
         $headers = [
             "Content-Type: application/json",
             "x-api-version: 2022-01-01",
             "x-client-id" => env('CASHFREE_API_KEY'),
             "x-client-secret" => env('CASHFREE_API_SECRET'),
         ];
     
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
     
         $response = curl_exec($curl);
         curl_close($curl);
     
         $paymentResponse = json_decode($response, true);
     
         if ($paymentResponse && isset($paymentResponse['order_status'])) {
             $payment = Payment::where('order_id', $order_id)->first();
             
             if ($payment) {
                 $payment->status = ($paymentResponse['order_status'] == "PAID") ? 'success' : 'failed';
     
                 // Extract Payment Mode (UPI, Card, Netbanking, etc.)
                 $payment->payment_mode = $paymentResponse['order_meta']['payment_method'] ?? 'unknown';
     
                 $payment->save();
             }
         }
     
         return view('payments.result', compact('paymentResponse'));
     }


     public function success(Request $request)
     {
        //   dd($request->all()); // PAYMENT STATUS RESPONSE
        
        return redirect('/order-confirm');
     }
}