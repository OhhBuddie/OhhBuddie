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
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\ScheduledWhatsappMessage;

use App\Jobs\DelayedWhatsAppJob;

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
        
        DB::table('carts')->where('user_id', Auth::id())->update(['checkout_initiative' => true]);

            
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
            'discount_on_mrp' => $request->total_discount,
            'coupon_discount' => $request->coupon_discount,
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
    
            // =========================================WHATSAPP MESSAGE START===================================================
    
            // Update orders table
            $order = DB::table('orders')->where('order_id', $request->txnid)->first();
            $orderDetailsCount = DB::table('orderdetails')->where('order_id', $order->id)->count();
            
            
            
    
            // =========================================INVOICE CREATION START===================================================
    
    
            $od_detail = DB::table('orderdetails')->where('order_id', $order->id)->get();
    
            foreach ($od_detail as $orders1) {
                // Common seller details
                $firstOrderDetail = DB::table('orderdetails')->where('id', $orders1->id)->first();
                $seller_detail = DB::table('sellers')->where('seller_id', $firstOrderDetail->seller_id)->first();
    
                $numericSellerId = preg_replace('/\D/', '', $seller_detail->seller_id);
                $companyPrefix = strtoupper(Str::substr(preg_replace('/\W+/', '', $seller_detail->company_name), 0, 3));
                $next_year = Carbon::now()->addYear(1)->format('Y');
                $base = $numericSellerId . $companyPrefix . $next_year;
    
                // Get the last invoice number for the seller
                $latestInvoice = DB::table('invoices')
                    ->where('seller_id', $seller_detail->seller_id)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->whereNotNull('invoice_id')
                    ->orderByDesc('invoice_id')
                    ->first();
    
                if ($latestInvoice && isset($latestInvoice->invoice_id)) {
                    $lastInvId = $latestInvoice->invoice_id;
                    $lastNumber = (int) substr($lastInvId, strlen($base));
                } else {
                    $lastNumber = 0;
                }
    
                // Generate the invoice ID for the product invoice
                $order_detail = DB::table('orderdetails')->where('id', $orders1->id)->latest()->first();
                $odr_data = DB::table('orders')->where('id', $order_detail->order_id)->latest()->first();
                $product_detail = DB::table('products')->where('id', $order_detail->product_id)->latest()->first();
                $address_data = DB::table('addresses')->where('id', $odr_data->shipping_address)->latest()->first();
                $transaction_data = DB::table('transactions')->where('order_id', $odr_data->order_id)->latest()->first();
    
                $finalAmount = $order_detail->price;
                $gstRate = $product_detail->gst_rate;
                $isInterstate = false;
    
                $taxableAmount = $finalAmount * 100 / (100 + $gstRate);
                $gstAmount = $finalAmount - $taxableAmount;
    
                if ($isInterstate) {
                    $igst = $gstAmount;
                    $cgst = $sgst = 0;
                } else {
                    $cgst = $sgst = $gstAmount / 2;
                    $igst = 0;
                }
    
                // Generate new unique invoice ID for the product
                $lastNumber++;
                $nextNumber = str_pad($lastNumber, 7, '0', STR_PAD_LEFT);
                $inv_id = $base . $nextNumber;
    
                DB::table('orderdetails')->where('id', $order_detail->id)->update([
                    'invoice_id' => $inv_id,
                    'updated_at' => now()
                ]);
    
    
               if($seller_detail->shipping_mode == 'In-Store')
               {
                   
                        // Generate the invoice PDF for the product
                        $pdf = Pdf::loadView('invoice_new', [
                            'seller_detail' => $seller_detail,
                            'product_detail' => $product_detail,
                            'odr_data' => $odr_data,
                            'address_data' => $address_data,
                            'cgst'=> $cgst,
                            'sgst'=> $sgst,
                            'taxableAmount'=> $taxableAmount,
                            'finalAmount' => $finalAmount,
                            'inv_id' => $inv_id
                        ]);
            
                        $pdfContent = $pdf->output();
            
                        // Store invoice PDF to S3
                        $folderPath = "invoices/seller/{$seller_detail->seller_id}/{$odr_data->order_id}/{$inv_id}";
                        $fileName = $inv_id . '.pdf';
                        $filePath = "{$folderPath}/{$fileName}";
            
                        Storage::disk('s3')->put($filePath, $pdfContent, 'public');
                        $invoiceUrl = Storage::disk('s3')->url($filePath);
            
                        // Insert invoice into the invoices table
                        DB::table('invoices')->insert([
                            'invoice_id' => $inv_id,
                            'product_id' => $product_detail->id,
                            'seller_id' =>  $seller_detail->seller_id,
                            'order_id' =>   $odr_data->order_id,
                            'order_table_id' => $odr_data->id,
                            'user_id' => $odr_data->user_id,
                            'invoice_link' => $invoiceUrl,
                            'type' => 'Seller to customer',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                   
               }
                else {
                    // Step 1: Send invoice to Zoho
                    $zohoRequest = new Request([
                        'contact_id' => $seller_detail->zoho_contact_id ?? '2503040000000033002',
                        'product_name' => 'Shipping Charges',
                        'rate' => $odr_data->shipping_cost,
                        'quantity' => 1,
                        'custom_company_name' => $seller_detail->company_name ?? 'Unknown Company',
                    ]);
                
                    $zohoController = new OrderController();
                    $zohoInvoiceResponse = $zohoController->sendInvoiceToZoho($zohoRequest,$order_detail->id);
                
                    // Step 2: Handle response
                    if ($zohoInvoiceResponse instanceof JsonResponse) {
                        $responseArray = $zohoInvoiceResponse->getData(true);
                
                        if (isset($responseArray['success']) && $responseArray['success']) {
                            $zohoInvoiceId = $responseArray['invoice_id'];
                            $zohoInvoiceNumber = $responseArray['invoice_number'];
                            $pdfUrl = $responseArray['download_url'];
                
                            // Step 3: Use same access token & orgId again
                            $accessToken = Cache::get('zoho_access_token');
                            $orgId = '60040824848';
                
                            $pdfResponse = Http::withHeaders([
                                'Authorization' => "Bearer $accessToken",
                                'X-com-zoho-invoice-organizationid' => $orgId,
                            ])->get($pdfUrl);
                
                            if ($pdfResponse->ok()) {
                                $pdfContent = $pdfResponse->body();
                
                                $folderPath = "invoices/seller/{$seller_detail->seller_id}/{$odr_data->order_id}/{$zohoInvoiceId}";
                                $fileName = $zohoInvoiceNumber . '.pdf';
                                $filePath = "{$folderPath}/{$fileName}";
                
                                Storage::disk('s3')->put($filePath, $pdfContent, 'public');
                                $invoiceUrl = Storage::disk('s3')->url($filePath);
                
                                DB::table('invoices')->insert([
                                    'invoice_id' => $zohoInvoiceId,
                                    'product_id' => null, // Shipping invoice, no product
                                    'seller_id' => $seller_detail->seller_id,
                                    'order_id' => $odr_data->order_id,
                                    'order_table_id' => $odr_data->id,
                                    'user_id' => $odr_data->user_id,
                                    'invoice_link' => $invoiceUrl,
                                    'type' => 'Zoho shipping invoice',
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            } else {
                                Log::error('Failed to download Zoho invoice PDF', [
                                    'response' => $pdfResponse->body()
                                ]);
                            }
                        } else {
                            Log::error('Zoho Invoice Error', $responseArray);
                        }
                    } else {
                        Log::error('Unexpected Zoho response format');
                    }
                }
    
                
                
                
                
                
                
            }
        
     
           // =========================================ADDITIONAL INVOICE FOR SHIPPING COST START===================================================

            // If shipping cost is greater than 0, create a separate invoice for it
            if ($odr_data->shipping_cost > 0) {
                $shippingInvoiceId = $base . str_pad(++$lastNumber, 7, '0', STR_PAD_LEFT);
                
                // Create the invoice for the shipping cost
                DB::table('invoices')->insert([
                    'invoice_id' => $shippingInvoiceId,
                    'seller_id' => $seller_detail->seller_id,
                    'order_id' => $odr_data->order_id,
                    'user_id' => $odr_data->user_id,
                    'invoice_link' => '', // Link would be empty, if it's a manual entry
                    'type' => 'Shipping',
                    'shipping_cost' => $odr_data->shipping_cost, // Assuming a new field `shipping_cost`
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // =========================================ADDITIONAL INVOICE FOR SHIPPING COST END===================================================
        
                
            
            
            // Update orders table -> WHATSAPP MSG PART 

            
            $delivaryadd = DB::table('addresses')->where('id', $order->shipping_address)->first();
            $city_name = DB::table('cities')->where('id', $delivaryadd->city)->first();
            $state_name = DB::table('states')->where('id', $delivaryadd->state)->first();
            
            $full_address = $delivaryadd->address_line_1 . ', ' .
                            $delivaryadd->address_line_2 . ', ' .
                            $delivaryadd->locality . ', ' .
                            $city_name->name . ', ' .
                            $state_name->name . ' - ' .
                            $delivaryadd->pincode;
            
            $orderdetails = DB::table('orderdetails')->where('order_id', $order->id)->get();
            
            
            $phoneno = DB::table('users')->where('id', $order->user_id)->first();
            
           
                
            $phone = preg_replace('/[^0-9]/', '', $phoneno->phone);
            if (strlen($phone) == 10) {
                $phone = '91' . $phone;
            }
    
            $sellerData = [];

            foreach ($orderdetails as $detail) {
                // Get seller details
                $seller = DB::table('sellers')->where('seller_id', $detail->seller_id)->first();
                
                if (!$seller) continue; // Skip if no seller found
                
                // Get product name
                $product = DB::table('products')
                    ->where('id', $detail->product_id)
                    ->where('seller_id', $detail->seller_id)
                    ->first();
                
                if (!$product) continue; // Skip if no product found
                
                // Calculate total order amount for this seller
                $totalorderamount = DB::table('orderdetails')
                    ->where('order_id', $order->id)
                    ->where('seller_id', $detail->seller_id)
                    ->first();
                
                // Format phone number
                $sellernumber = preg_replace('/[^0-9]/', '', $seller->registered_phone_number);
                if (strlen($sellernumber) == 10) {
                    $sellernumber = '91' . $sellernumber;
                }
                
                // Add this seller's data to our array
                $sellerData[] = [
                    'sellername' => $seller->owner_name,
                    'productname' => $product->product_name,
                    'totalorderamount' => $totalorderamount->price,
                    'sellernumber' => $sellernumber
                ];
            }
            
            $admins = DB::table('users')->where('user_type', 'Admin')->select('name', 'phone')->get();
            
            $adminData = [];
            
            foreach ($admins as $admin) {
                
                $adminnumber = preg_replace('/[^0-9]/', '', $admin->phone);
                if (strlen($adminnumber) == 10) {
                    $adminnumber = '91' . $adminnumber;
                }
                
                $adminData[] = [
                    'adminname' => $admin->name,
                    'adminnumber' => $adminnumber
                ];
            }
            
        
            
            // Now create the WhatsApp request with all seller data
            $whatsappRequest = new Request([
                'phone' => $phone,
                'message' => "Your order has been confirmed and payment received successfully!",
                'name' => $phoneno->name,
                'id' => 1,
                'orderid' => $request->txnid,
                'price' => $order->grand_total,
                'delivaryaddress' => $full_address,
                'noofproduct' => $orderDetailsCount,
                'sellerData' => $sellerData,  // Pass the entire array of seller data
                'adminData' => $adminData
            ]);
            
            $whatsappController = new WhatsAppController();
            $whatsappController->sendMessage($whatsappRequest);
            
            // =========================================WHATSAPP MESSAGE END===================================================

        // Update orders table
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

        // return view('payment.payment-success', compact('transaction'));
        return redirect('/order-confirm');
    }
    
    // If transaction not found
        return redirect('/addtocart')->with('error', 'Transaction not found');
   }

    public function sendInvoiceToZoho(Request $request)
    {
        $clientId = '1000.VTWB7ECPGBCKRLS27SXHGCLYBGH57J';
        $clientSecret = '27947cbfe1b0a8a7d5b319bf986e494084d1f81488';
        $refreshToken = '1000.7b0a2ba27f9f4b622c09552558e92550.e1d475cdbe1dd57ec5bf7054d0142aea';
        $orgId = '60040824848';
        $apiDomain = 'https://www.zohoapis.in';
        $authDomain = 'https://accounts.zoho.in';
    
        // Step 1: Refresh Token
        $accessToken = Cache::get('zoho_access_token');
        if (!$accessToken) {
            $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
                'refresh_token' => $refreshToken,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'refresh_token',
            ]);
    
            if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
                Log::error('Zoho token refresh failed', [
                    'status' => $tokenResponse->status(),
                    'body' => $tokenResponse->body(),
                ]);
    
                return ['error' => 'Token refresh failed', 'details' => $tokenResponse->json()];
            }
    
            $accessToken = $tokenResponse->json()['access_token'];
            Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
        }
    
        // Step 2: Prepare invoice payload
        $invoicePayload = [
            'customer_id' => $request->contact_id,
            'line_items' => [
                [
                    'name' => $request->product_name,
                    'rate' => $request->rate,
                    'quantity' => $request->quantity,
                ],
            ],
            'custom_fields' => [
                [
                    'api_name' => 'cf_company_name',
                    'value' => $request->custom_company_name,
                ],
            ],
        ];
    
        // Step 3: Create invoice
        $invoiceResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
            'Content-Type' => 'application/json',
        ])->post("$apiDomain/invoice/v3/invoices", $invoicePayload);
    
        if (!$invoiceResponse->ok()) {
            return ['error' => 'Failed to create invoice.', 'details' => $invoiceResponse->json()];
        }
    
        $invoice = $invoiceResponse->json('invoice');
    
        // Step 4: Return the invoice info
        return [
            'success' => true,
            'invoice_id' => $invoice['invoice_id'],
            'invoice_number' => $invoice['invoice_number'],
            'download_url' => "$apiDomain/invoice/v3/invoices/{$invoice['invoice_id']}/pdf?organization_id=$orgId",
        ];
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
                
            // =========================================WHATSAPP MESSAGE START===================================================
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
                    // $whatsappRequest = new Request([
                    //     'phone' => $phone,
                    //     'message' => "Your order has been confirmed and payment received successfully!",
                    //     'name' => $phoneno->name,
                    //     'id' => 3,
                    //     'orderid' => $orderDetailsCount,
                    //     'price' => $order->grand_total
                    // ]);
                    
                    // // Call WhatsAppController's sendMessage method
                    // $whatsappController = new WhatsAppController();
                    // $whatsappController->sendMessage($whatsappRequest);
                    
                    ScheduledWhatsappMessage::create([
                        'phone' => $phone,
                        'message' => "Your order has been confirmed and payment received successfully!",
                        'name' => $phoneno->name,
                        'orderid' => $orderDetailsCount,
                        'price' => $order->grand_total,
                        'dynamic_id' => 3,
                        'send_after' => now()->addMinutes(45),
                    ]);
                    
                    // Log success
                    Log::info('WhatsApp notification sent for order: ' . $phoneno->phone);
                    
                    
                }
            } catch (\Exception $e) {
                // Log error but continue with the payment success flow
                Log::error('Failed to send WhatsApp notification: ' . $e->getMessage());
            }
            
            
             // =========================================WHATSAPP MESSAGE END===================================================
            
            
            
            
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
    
    public function handleRefund(Request $request)
    {
        // Log the raw payload for debugging
        Log::info('PayU Refund Webhook Received:', $request->all());

        // Example data fields (based on PayU refund webhook payload structure)
        $refundStatus = $request->input('status'); // "success" or "failure"
        $transactionId = $request->input('txnid');
        $refundAmount = $request->input('refund_amount');
        $refundId = $request->input('refundid');
        $message = $request->input('message');

        // ✅ Optional: Verify authenticity using hash if PayU provides one

        // ✅ Save or update refund status in your database
        // Example:
        // Refund::createOrUpdate(['transaction_id' => $transactionId, 'status' => $refundStatus, ...]);

        return response('OK', 200);
    }


}
