<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; // Make sure you have this at the top
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;



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
                $brandcnt = DB::table('brands')->where('id',$product_data->brand_id)->count();
                if($brandcnt == 0)
                {
                    $dat['brand_name'] = 'NA';
                }
                else
                {
                    $brand_data = DB::table('brands')->where('id',$product_data->brand_id)->latest()->first();
                    $dat['brand_name'] = $brand_data->brand_name;
                }
                
                $color_data = DB::table('colors')->where('hex_code',$product_data->color_name)->latest()->first();
                
                $dat['id'] = $orderdetails->id;
                $dat['product_name'] = $product_data->product_name;
                
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

        $order_id = DB::table('orderdetails')->where('id',$id)->latest()->first();
        
        $myorders = Auth::check() ? DB::table('orders')->where('user_id', Auth::id())->where('id',$order_id->order_id)->latest()->first() : null;
        
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
    
    
    
    
    
//   =======================================FINELY WORKING ZOHO CODE START=========================================
//   public function sendInvoiceToZoho(Request $request)
//   {
//         $clientId = '1000.H5VXKC4YGACPZ52T3L669KORUH7P6D';
//         $clientSecret = '90ba08444a803623e3ff1c8d59d05c18fa95c6131f';
//         $refreshToken = '1000.729023377f1bfae8d01e6850285f8e35.519a11469b6d59bf71203659074ff6c6';
//         $orgId = '60040794644';
//         $apiDomain = 'https://www.zohoapis.in';
//         $authDomain = 'https://accounts.zoho.in';
    
//         // Step 1: Refresh Zoho access token if needed
//         $accessToken = Cache::get('zoho_access_token');
//         if (!$accessToken) {
//             $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
//                 'refresh_token' => $refreshToken,
//                 'client_id' => $clientId,
//                 'client_secret' => $clientSecret,
//                 'grant_type' => 'refresh_token',
//             ]);
    
//             if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
//                 Log::error('Zoho token refresh failed', [
//                     'status' => $tokenResponse->status(),
//                     'body' => $tokenResponse->body(),
//                 ]);
    
//                 return response()->json([
//                     'error' => 'Failed to refresh Zoho access token.',
//                     'details' => $tokenResponse->json(),
//                 ], 500);
//             }
    
//             $accessToken = $tokenResponse->json()['access_token'];
//             Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
//         }
    
//         // Step 2: Create invoice
//         $contactId = '2507504000000037027';
//         $productName = "Random Product";
//         $rate = 2000;
//         $quantity = 5;
//         $customCompanyName = 'ABC Company';
    
//         $invoicePayload = [
//             'customer_id' => $contactId,
//             'line_items' => [
//                 [
//                     'name' => $productName,
//                     'rate' => $rate,
//                     'quantity' => $quantity,
//                 ],
//             ],
//             'custom_fields' => [
//                 [
//                     'api_name' => 'cf_company_name',
//                     'value' => $customCompanyName,
//                 ],
//             ],
//         ];
        
//             $invoiceResponse = Http::withHeaders([
//                 'Authorization' => "Bearer $accessToken",
//                 'X-com-zoho-invoice-organizationid' => $orgId,
//                 'Content-Type' => 'application/json',
//             ])->post("$apiDomain/invoice/v3/invoices", $invoicePayload);
        
//             if (!$invoiceResponse->ok()) {
//                 return response()->json([
//                     'error' => 'Failed to create invoice.',
//                     'details' => $invoiceResponse->json(),
//                 ], 500);
//             }
        
//             $invoice = $invoiceResponse->json('invoice');
        
//             // Step 3: Download PDF
//             $invoiceId = $invoice['invoice_id'];
//             $downloadResponse = Http::withHeaders([
//                 'Authorization' => "Bearer $accessToken",
//                 'X-com-zoho-invoice-organizationid' => $orgId,
//             ])->get("$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf");
        
//             if (!$downloadResponse->ok()) {
//                 return response()->json([
//                     'error' => 'Failed to download invoice PDF.',
//                     'details' => $downloadResponse->json(),
//                 ], 500);
//             }
        
//             // Step 4: Return response
//             return response()->json([
//                 'success' => true,
//                 'invoice_id' => $invoice['invoice_id'],
//                 'invoice_number' => $invoice['invoice_number'],
//                 'download_url' => "$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf?organization_id=$orgId",
//             ]);
//     }

//   =======================================FINELY WORKING ZOHO CODE END=========================================


    // public function sendInvoiceToZoho(Request $request, $id)
    // {
    //     $orderdetails = DB::table('orderdetails')->where('id', $id)->latest()->first();
    //     $order = DB::table('orders')->where('id', $orderdetails->order_id)->latest()->first();
    //     $product_data = DB::table('products')->where('id', $orderdetails->product_id)->first();
    //     $address_data = DB::table('addresses')->where('id', $order->shipping_address)->first();
        
    //     $brand_name = DB::table('brands')->where('id', $product_data->brand_id)->first();
    //     $color_data = DB::table('colors')->where('hex_code', $product_data->color_name)->first();
    //     $user_data = DB::table('users')->where('id', $address_data->user_id)->first();
       
       
       
    //     $clientId = '1000.H5VXKC4YGACPZ52T3L669KORUH7P6D';
    //     $clientSecret = '90ba08444a803623e3ff1c8d59d05c18fa95c6131f';
    //     $refreshToken = '1000.729023377f1bfae8d01e6850285f8e35.519a11469b6d59bf71203659074ff6c6';
    //     $orgId = '60040794644';
    //     $apiDomain = 'https://www.zohoapis.in';
    //     $authDomain = 'https://accounts.zoho.in';
    
    //     // Step 1: Refresh access token
    //     $accessToken = Cache::get('zoho_access_token');
    //     if (!$accessToken) {
    //         $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
    //             'refresh_token' => $refreshToken,
    //             'client_id' => $clientId,
    //             'client_secret' => $clientSecret,
    //             'grant_type' => 'refresh_token',
    //         ]);
    
    //         if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
    //             Log::error('Zoho token refresh failed', [
    //                 'status' => $tokenResponse->status(),
    //                 'body' => $tokenResponse->body(),
    //             ]);
    
    //             return response()->json([
    //                 'error' => 'Failed to refresh Zoho access token.',
    //                 'details' => $tokenResponse->json(),
    //             ], 500);
    //         }
    
    //         $accessToken = $tokenResponse->json()['access_token'];
    //         Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
    //     }
    
    //     // Step 2: Get tax rate from request and fetch tax ID
    //     // $requestedTaxRate = $request->input('tax_rate'); // e.g., 18
    //     $requestedTaxRate = $product_data->gst_rate;
    
    //     $taxResponse = Http::withHeaders([
    //         'Authorization' => "Bearer $accessToken",
    //         'X-com-zoho-invoice-organizationid' => $orgId,
    //     ])->get("$apiDomain/invoice/v3/settings/taxes");
    
    //     if (!$taxResponse->ok()) {
    //         return response()->json([
    //             'error' => 'Failed to fetch tax list from Zoho.',
    //             'details' => $taxResponse->json(),
    //         ], 500);
    //     }
    
    //     $taxes = $taxResponse->json('taxes');
    //     $matchedTax = collect($taxes)->firstWhere('tax_percentage', $requestedTaxRate);
    
    //     if (!$matchedTax) {
    //         return response()->json([
    //             'error' => 'Tax rate not found in Zoho.',
    //             'provided_rate' => $requestedTaxRate,
    //         ], 400);
    //     }
    
    //     $taxId = $matchedTax['tax_id'];
    
    //     // Step 3: Build invoice data
    //     $contactId = '2507504000000037027';
    //     $productName = $product_data->product_name;
    //     $rate =  $orderdetails->price;
    //     $quantity = $orderdetails->quantity;
    //     $customCompanyName = 'Ohh Buddie';
    
    //     $invoicePayload = [
    //         'customer_id' => $contactId,
    //         'is_inclusive_tax' => false, // change to true if your pricing includes tax
    //         'line_items' => [
    //             [
    //                 'name' => $productName,
    //                 'rate' => $rate,
    //                 'quantity' => $quantity,
    //                 'tax_id' => $taxId,
    //             ],
    //         ],
    //         'custom_fields' => [
    //             [
    //                 'api_name' => 'cf_company_name',
    //                 'value' => $customCompanyName,
    //             ],
    //         ],
    //     ];
    
    //     // Step 4: Create invoice
    //     $invoiceResponse = Http::withHeaders([
    //         'Authorization' => "Bearer $accessToken",
    //         'X-com-zoho-invoice-organizationid' => $orgId,
    //         'Content-Type' => 'application/json',
    //     ])->post("$apiDomain/invoice/v3/invoices", $invoicePayload);
    
    //     if (!$invoiceResponse->ok()) {
    //         return response()->json([
    //             'error' => 'Failed to create invoice.',
    //             'details' => $invoiceResponse->json(),
    //         ], 500);
    //     }
    
    //     $invoice = $invoiceResponse->json('invoice');
    
    //     // Step 5: Download PDF seller seller id orderid product id invoice id
        

    //     $invoiceId = $invoice['invoice_id'];
        
    //     $downloadResponse = Http::withHeaders([
    //         'Authorization' => "Bearer $accessToken",
    //         'X-com-zoho-invoice-organizationid' => $orgId,
    //     ])->get("$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf");
    
    //     if (!$downloadResponse->ok()) {
    //         return response()->json([
    //             'error' => 'Failed to download invoice PDF.',
    //             'details' => $downloadResponse->json(),
    //         ], 500);
    //     }
        
    //     // S3 Save 
        
    //     $folderPath = "invoices/";
    //     // Ensure folder exists (optional, not strictly necessary in S3)
    //     if (!Storage::disk('s3')->exists($folderPath)) {
    //         Storage::disk('s3')->makeDirectory($folderPath);
    //     }
        
    //     // Create a unique file name
    //     $fileName = $invoice['invoice_number'] . '.pdf';
    //     $filePath = $folderPath . '/' . $fileName;
        
    //     // Save PDF to S3
    //     Storage::disk('s3')->put($filePath, $downloadResponse->body(), 'public');
        
    //     // Get public URL
    //     $s3Url = Storage::disk('s3')->url($filePath);
        
        
    
    //     // Step 6: Return response
    //     return response()->json([
    //         'success' => true,
    //         'invoice_id' => $invoice['invoice_id'],
    //         'invoice_number' => $invoice['invoice_number'],
    //         'download_url' => "$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf?organization_id=$orgId",
    //     ]);
    // }
    
        
    public function sendInvoiceToZoho(Request $request, $id)
    {
        $orderdetails = DB::table('orderdetails')->where('id', $id)->latest()->first();
        $order = DB::table('orders')->where('id', $orderdetails->order_id)->latest()->first();
        $product_data = DB::table('products')->where('id', $orderdetails->product_id)->first();
        $address_data = DB::table('addresses')->where('id', $order->shipping_address)->first();
    
        $brand_name = DB::table('brands')->where('id', $product_data->brand_id)->first();
        $color_data = DB::table('colors')->where('hex_code', $product_data->color_name)->first();
        $user_data = DB::table('users')->where('id', $address_data->user_id)->first();
       
        $clientId = '1000.H5VXKC4YGACPZ52T3L669KORUH7P6D';
        $clientSecret = '90ba08444a803623e3ff1c8d59d05c18fa95c6131f';
        $refreshToken = '1000.729023377f1bfae8d01e6850285f8e35.519a11469b6d59bf71203659074ff6c6';
        $orgId = '60040794644';
        $apiDomain = 'https://www.zohoapis.in';
        $authDomain = 'https://accounts.zoho.in';
    
        // Step 1: Refresh access token
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
    
                return response()->json([
                    'error' => 'Failed to refresh Zoho access token.',
                    'details' => $tokenResponse->json(),
                ], 500);
            }
    
            $accessToken = $tokenResponse->json()['access_token'];
            Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
        }
    
        // Step 2: Get tax rate from request and fetch tax ID
        $requestedTaxRate = $product_data->gst_rate;
    
        $taxResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
        ])->get("$apiDomain/invoice/v3/settings/taxes");
    
        if (!$taxResponse->ok()) {
            return response()->json([
                'error' => 'Failed to fetch tax list from Zoho.',
                'details' => $taxResponse->json(),
            ], 500);
        }
    
        $taxes = $taxResponse->json('taxes');
        $matchedTax = collect($taxes)->firstWhere('tax_percentage', $requestedTaxRate);
    
        if (!$matchedTax) {
            return response()->json([
                'error' => 'Tax rate not found in Zoho.',
                'provided_rate' => $requestedTaxRate,
            ], 400);
        }
    
        $taxId = $matchedTax['tax_id'];
    
        // Step 3: Build invoice data
        // $contactId = '2507504000000037027';
        
        $contactId = '2507504000000037027'; // Replace if dynamic contact id
        $dynamicName = $user_data->name ?? 'Default Name';
     
        $full_address = $address_data->address_line_1.$address_data->address_line_2;
        $city_name = DB::table('cities')->where('id',$address_data->city)->latest()->first();
        $state_name = DB::table('states')->where('id',$address_data->state)->latest()->first();
        
        $updateContactResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
            'Content-Type' => 'application/json',
        ])->put("$apiDomain/invoice/v3/contacts/$contactId", [
            'contact_name' => $dynamicName,
            'display_name' => $dynamicName,
            'billing_address' => [
                'attention' => $dynamicName,
                'address' => $full_address ?? 'Default Address',
                'city' => $city_name->name ?? 'City',
                'state' => $state_name->name ?? 'State',
                'zip' => $address_data->pincode ?? '000000',
                'country' => 'India',
                'phone' => $user_data->phone ?? '',
            ],
            'shipping_address' => [
                'attention' => $dynamicName,
                'address' => $full_address ?? 'Default Address',
                'city' => $city_name->name ?? 'City',
                'state' => $state_name->name ?? 'State',
                'zip' => $address_data->pincode ?? '000000',
                'country' => 'India',
                'phone' => $user_data->phone ?? '',
            ]
        ]);
    
        if (!$updateContactResponse->ok()) {
            Log::error('Failed to update contact display name', [
                'response' => $updateContactResponse->json(),
            ]);
            return response()->json([
                'error' => 'Failed to update contact display name.',
                'details' => $updateContactResponse->json(),
            ], 500);
        }
    
    
    
        // Step 1: Get the product data
        $productName = $product_data->product_name;
        $rate = $orderdetails->price;
        $mrp = $product_data->maximum_retail_price;
        $quantity = $orderdetails->quantity;
        $customCompanyName = 'Ohh Buddie';
        
        $transaction_data = DB::table('transactions')->where('order_id',$order->order_id)->latest()->first();

        $finalAmount = $transaction_data->amount;       // Total amount including GST
        $gstRate = $product_data->gst_rate;             // GST percentage (e.g., 18%)
        $isInterstate = false;     // false = CGST + SGST, true = IGST
    
        // Formula: Taxable = FinalAmount * 100 / (100 + GST%)
        $taxableAmount = $finalAmount * 100 / (100 + $gstRate);
        $gstAmount = $finalAmount - $taxableAmount;
    
        if ($isInterstate) {
            $igst = $gstAmount;
            $cgst = $sgst = 0;
        } else {
            $cgst = $sgst = $gstAmount / 2;
            $igst = 0;
        }
        
        
        
        // Step 2: Replace 'label' with 'api_name' (you must know this from Zoho's /settings/itemfields API)
        $invoicePayload = [
            'customer_id' => $contactId,
            'is_inclusive_tax' => true, // assuming your rate includes tax as per invoice image
            'line_items' => [
                [
                    'name' => $productName,
                    'rate' => $mrp,
                    'quantity' => $quantity,
                    'tax_id' => $taxId,
                    'hsn_or_sac' => $product_data->hsn,
                    'sku' => $product_data->hsn,
                    'amount' => 1200,
                    'item_custom_fields' => [
                        [
                            'api_name' => 'cf_sku', // ✅ Must match the API name from Zoho
                            'value' => $product_data->sku
                        ]
                    ]
                ],
            ],
            'custom_fields' => [
                [
                    'label' => 'Company Name',
                    'value' => $customCompanyName
                ]
            ]
        ];
        $qrlink = $orderdetails->id;
    
        // Step 4: Create invoice
        $invoiceResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
            'Content-Type' => 'application/json',
        ])->post("$apiDomain/invoice/v3/invoices", $invoicePayload);
    
        // Log the full response for debugging
        Log::info('Zoho Invoice Creation Response', [
            'status' => $invoiceResponse->status(),
            'body' => $invoiceResponse->json(),
        ]);
    
        // Check if we have invoice details in the response
        $responseBody = $invoiceResponse->json();
        if (isset($responseBody['details']['invoice'])) {
            // Success case where invoice is in details field
            $invoice = $responseBody['details']['invoice'];
            $invoiceId = $invoice['invoice_id'];
        } elseif (isset($responseBody['invoice'])) {
            // Normal success case
            $invoice = $responseBody['invoice'];
            $invoiceId = $invoice['invoice_id'];
        } else {
            // No invoice found in response
            return response()->json([
                'error' => 'Failed to extract invoice details from response.',
                'details' => $responseBody,
            ], 500);
        }
        
        // Step 5: Download PDF - Try alternative methods
        Log::info('Attempting to download invoice PDF', ['invoice_id' => $invoiceId]);
        
        // Method 1: Try the standard PDF endpoint
        $downloadResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
        ])->get("$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf");
        
        // If first method fails, try alternative method with organization_id as query param
        if (!$downloadResponse->ok()) {
            Log::info('First PDF download method failed, trying alternative method', [
                'status' => $downloadResponse->status()
            ]);
            
            $downloadResponse = Http::withHeaders([
                'Authorization' => "Bearer $accessToken",
            ])->get("$apiDomain/invoice/v3/invoices/{$invoiceId}/pdf?organization_id=$orgId");
        }
        
        // If both direct methods fail, try to get the PDF URL from the invoice details
        if (!$downloadResponse->ok()) {
            Log::info('Second PDF download method failed, trying to get PDF URL from invoice details', [
                'status' => $downloadResponse->status()
            ]);
            
            // Wait a moment to allow Zoho to process the invoice
            sleep(2);
            
            // Get invoice details to find the PDF URL
            $invoiceDetailsResponse = Http::withHeaders([
                'Authorization' => "Bearer $accessToken",
                'X-com-zoho-invoice-organizationid' => $orgId,
            ])->get("$apiDomain/invoice/v3/invoices/$invoiceId");
            
            if ($invoiceDetailsResponse->ok()) {
                $invoiceDetails = $invoiceDetailsResponse->json();
                
                // Check if we have an invoice_url in the response
                if (isset($invoiceDetails['invoice']['invoice_url'])) {
                    $invoiceUrl = $invoiceDetails['invoice']['invoice_url'];
                    Log::info('Found invoice URL in details', ['url' => $invoiceUrl]);
                    
                    // Try to download from the invoice URL
                    $downloadResponse = Http::get($invoiceUrl);
                }
            }
        }
    
        // If all download methods fail, try to generate a temporary link to the invoice instead
        if (!$downloadResponse->ok()) {
            Log::error('All PDF download methods failed', [
                'status' => $downloadResponse->status(),
                'body' => $downloadResponse->body(),
                'invoice_id' => $invoiceId,
            ]);
            
            // Get a public link to the invoice instead (email link)
            $emailLinkResponse = Http::withHeaders([
                'Authorization' => "Bearer $accessToken",
                'X-com-zoho-invoice-organizationid' => $orgId,
                'Content-Type' => 'application/json',
            ])->post("$apiDomain/invoice/v3/invoices/$invoiceId/email", [
                'to_mail_ids' => [$user_data->email ?? 'ashutosh@ohhbuddie.com'],
                'subject' => 'Your Invoice ' . $invoice['invoice_number'],
                'body' => 'Please find your invoice attached.',
                'send_customer_statement' => false,
                'attach_pdf' => true
            ]);
            
            if ($emailLinkResponse->ok()) {
                Log::info('Email with invoice PDF sent successfully');
                
                // Since we can't download the PDF, store a placeholder or link in the database
                $s3Url = $invoice['invoice_url'] ?? 'Zoho Invoice Link - Email Sent';
                
                // Save invoice information to database without the PDF
                try {
                    DB::table('orderdetails')
                        ->where('id', $id)
                        ->update([
                            'invoice_id' => $invoiceId,
                            'invoice_number' => $invoice['invoice_number'],
                            'invoice_id' => $s3Url,
                            'updated_at' => now()
                        ]);
                        
                    Log::info('Updated database with invoice details (email only)', [
                        'orderdetails_id' => $id,
                        'invoice_id' => $invoiceId
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to update database', [
                        'exception' => $e->getMessage()
                    ]);
                }
                
                return response()->json([
                    'success' => true,
                    'invoice_id' => $invoiceId,
                    'invoice_number' => $invoice['invoice_number'],
                    'message' => 'Invoice created and emailed. PDF download not available.',
                    'note' => 'An email with the invoice has been sent to the customer.'
                ]);
            } else {
                return response()->json([
                    'error' => 'Failed to download invoice PDF and email fallback also failed.',
                    'status' => $downloadResponse->status(),
                    'invoice_id' => $invoiceId,
                    'invoice_url' => $invoice['invoice_url'] ?? null
                ], 500);
            }
        }
        
        // Make sure we have content
        $pdfContent = $downloadResponse->body();
        if (empty($pdfContent)) {
            Log::error('PDF content is empty');
            return response()->json([
                'error' => 'Downloaded PDF content is empty',
                'invoice_id' => $invoiceId,
            ], 500);
        }
        
        Log::info('Successfully downloaded PDF', ['size' => strlen($pdfContent)]);
        
        // Step 6: Save PDF to S3
        try {
            // $folderPath = "invoices/{$invoiceId}";
            
            // // Create a unique file name
            // $fileName = $invoice['invoice_number'] . '.pdf';
            // $filePath = $folderPath . '/' . $fileName;
            
            // // Save PDF to S3
            // Storage::disk('s3')->put($filePath, $pdfContent, 'public');
            
            // // Get public URL
            // $s3Url = Storage::disk('s3')->url($filePath);
            
            $folderPath = "invoices/{$invoiceId}";
            $fileName = $invoice['invoice_number'] . '.pdf';
            $filePath = $folderPath . '/' . $fileName;
            
            // Save PDF to R2
            Storage::disk('r2')->put($filePath, $pdfContent, 'public');
            
            // Get public URL
            $r2Url = Storage::disk('r2')->url($filePath);
            
            DB::table('orderdetails')
                        ->where('id', $id)
                        ->update([
                            'invoice_id' => $r2Url,
                            'updated_at' => now()
                        ]);
            
            Log::info('Saved PDF to S3', ['url' => $r2Url]);
        } catch (\Exception $e) {
            Log::error('Failed to save PDF to S3', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'error' => 'Failed to save PDF to S3: ' . $e->getMessage(),
                'invoice_id' => $invoiceId,
            ], 500);
        }
        
        // Step 8: Return response with S3 URL and invoice details
        return response()->json([
            'success' => true,
            'invoice_id' => $invoiceId,
            'invoice_number' => $invoice['invoice_number'],
            'invoice_url' => $r2Url,
            'message' => 'Invoice created, downloaded, and stored successfully'
        ]);
    }
    
    





public function fetchAllInvoicesFromZoho()
{
    $clientId = '1000.VTWB7ECPGBCKRLS27SXHGCLYBGH57J';
    $clientSecret = '27947cbfe1b0a8a7d5b319bf986e494084d1f81488';
    $refreshToken = '1000.7b0a2ba27f9f4b622c09552558e92550.e1d475cdbe1dd57ec5bf7054d0142aea';
    $orgId = '60040824848';
    $apiDomain = 'https://www.zohoapis.in';
    $authDomain = 'https://accounts.zoho.in';

    // Try to get token from cache
    $accessToken = Cache::get('zoho_access_token');

    // Refresh token if not found
    if (!$accessToken) {
        $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
            'refresh_token' => $refreshToken,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'refresh_token',
        ]);

        if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
            return response()->json([
                'error' => 'Failed to refresh Zoho access token.',
                'details' => $tokenResponse->json(),
            ], 500);
        }

        $accessToken = $tokenResponse->json()['access_token'];
        Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
    }

    // Fetch all invoices
    $response = Http::withHeaders([
        'Authorization' => "Bearer $accessToken",
        'X-com-zoho-invoice-organizationid' => $orgId,
    ])->get("$apiDomain/invoice/v3/invoices");

    if (!$response->ok()) {
        return response()->json([
            'error' => 'Failed to fetch invoices.',
            'details' => $response->json(),
        ], 500);
    }

    return response()->json([
        'success' => true,
        'invoices' => $response->json('invoices'),
    ]);
}

    public function showZohoInvoices()
    {
        $clientId = '1000.VTWB7ECPGBCKRLS27SXHGCLYBGH57J';
        $clientSecret = '27947cbfe1b0a8a7d5b319bf986e494084d1f81488';
        $refreshToken = '1000.7b0a2ba27f9f4b622c09552558e92550.e1d475cdbe1dd57ec5bf7054d0142aea';
        $orgId = '60040824848';
        $apiDomain = 'https://www.zohoapis.in';
        $authDomain = 'https://accounts.zoho.in';
    
        // Step 1: Check token
        $accessToken = Cache::get('zoho_access_token');
    
        // Step 2: Refresh if missing
        if (!$accessToken) {
            $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
                'refresh_token' => $refreshToken,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'refresh_token',
            ]);
    
            if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
                return view('zoho.invoices')->withErrors(['error' => 'Failed to refresh Zoho access token.']);
            }
    
            $accessToken = $tokenResponse->json()['access_token'];
            Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
        }
    
        // Step 3: Get invoices
        $response = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
            'X-com-zoho-invoice-organizationid' => $orgId,
        ])->get("$apiDomain/invoice/v3/invoices");
    
        if (!$response->ok()) {
            return view('zoho.invoices')->withErrors(['error' => 'Failed to fetch invoices.']);
        }
    
        $invoices = $response->json('invoices');
    
        return view('zoho.invoices', compact('invoices', 'orgId', 'apiDomain'));
    }
    
public function downloadInvoicePdf($invoiceId)
{
    $clientId = '1000.VTWB7ECPGBCKRLS27SXHGCLYBGH57J';
    $clientSecret = '27947cbfe1b0a8a7d5b319bf986e494084d1f81488';
    $refreshToken = '1000.7b0a2ba27f9f4b622c09552558e92550.e1d475cdbe1dd57ec5bf7054d0142aea';
    $orgId = '60040824848';
    $apiDomain = 'https://www.zohoapis.in';
    $authDomain = 'https://accounts.zoho.in';

    // Step 1: Get or refresh access token
    $accessToken = Cache::get('zoho_access_token');
    if (!$accessToken) {
        $tokenResponse = Http::asForm()->post("$authDomain/oauth/v2/token", [
            'refresh_token' => $refreshToken,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'refresh_token',
        ]);

        if (!$tokenResponse->ok() || !isset($tokenResponse->json()['access_token'])) {
            \Log::error('Zoho token refresh failed', [
                'status' => $tokenResponse->status(),
                'body' => $tokenResponse->body(),
            ]);
            return response()->json(['error' => 'Failed to refresh token'], 500);
        }

        $accessToken = $tokenResponse->json()['access_token'];
        Cache::put('zoho_access_token', $accessToken, now()->addMinutes(55));
    }

    // Step 2: Log the invoice ID
    \Log::info('Requesting invoice PDF', [
        'invoice_id' => $invoiceId,
    ]);

    // Step 3: Fetch PDF from Zoho using the correct endpoint
    $pdfResponse = Http::withHeaders([
        'Authorization' => "Bearer $accessToken",
        'X-com-zoho-invoice-organizationid' => $orgId,
        'Accept' => 'application/pdf',
    ])->get("$apiDomain/invoice/v3/invoices/{$invoiceId}?print=true");

    // Log the response to check what happens
    \Log::info('Zoho PDF Response', [
        'status' => $pdfResponse->status(),
        'body' => $pdfResponse->body(),
    ]);

    if (!$pdfResponse->ok()) {
        return response()->json([
            'error' => 'Failed to fetch PDF',
            'details' => json_decode($pdfResponse->body(), true),
        ], 500);
    }

    // Step 4: Return PDF as response
    return response($pdfResponse->body(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="invoice_' . $invoiceId . '.pdf"');
}
}
