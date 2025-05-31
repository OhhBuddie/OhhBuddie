<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        
        
    

        $token = 'EAAS6NxQsZCfkBOxJBjShCSZBH6h6Oxy72mW1ssiefQxuIKI62iijYi1rZBBRliL4Xr6RgrqsMS4afNKQ9flpaGMDeh6X7zF0UagqFRjjJ3VazfLwqncMWPL42TjpCChKdgPoeYsbis6VNMp1jnSIWTjji6A3hyulMjKFzNlq8YANi98b2EnhUhDqA1mNqIRxQZDZD';
        $phone_number_id = '648701208316154';

        $to = $request->phone;
        $message = $request->message;
        $customerName = $request->name;
        $id = $request->id; 
        $orderid = $request->orderid; 
        $price = $request->price;
        $delivaryaddress = $request->delivaryaddress;
        
        $sellerData = $request->sellerData;
        $adminData = $request->adminData;
       
       
       $userphone = $request->userphone;
       $username = $request->username;
       $oid = $request->oid;
       
       
       $viewphone = $request->viewphone;
       $viewname = $request->viewname;
       
       // For Testing 
       
       $akashphone = $request->akashphone;
       $akashname = $request->akashname;
        
    
        // Log the request details
        Log::info('WhatsApp API Request', [
            'to' => $to,
            'message' => $message,
            'phone_number_id' => $phone_number_id
        ]);

        $url = "https://graph.facebook.com/v19.0/$phone_number_id/messages";

    
    
    if($id === 1){
        
       
        foreach ($sellerData as $seller) {
            // Extract data for this specific seller
            $sellername = $seller['sellername'];
            $productname = $seller['productname'];
            $totalorderamount = $seller['totalorderamount'];
            $sellernumber = $seller['sellernumber'];
            
            // Send WhatsApp message to this seller
            $response = Http::withToken($token)->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $sellernumber,
                'type' => 'template',
                'template' => [
                    'name' => 'slr_order_received',
                    'language' => ['code' => 'en'],
                    'components' => [
                        [   // This opening bracket was missing
                            'type' => 'body',
                            'parameters' => [
                                ['type' => 'text', 'text' => $sellername],
                                ['type' => 'text', 'text' => $productname],
                                ['type' => 'text', 'text' => $customerName],
                                ['type' => 'text', 'text' => $delivaryaddress],
                                ['type' => 'text', 'text' => $totalorderamount]
                            ]
                        ]   // This closing bracket was missing
                    ]
                ]
            ]);
        
        }
        
        
        foreach ($adminData as $admin) {
            // Extract data for this specific seller
            $adminrname = $admin['adminname'];
            $adminnumber = $admin['adminnumber'];
            
            
            // Send WhatsApp message to this seller
            $response = Http::withToken($token)->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $adminnumber,
                'type' => 'template',
                'template' => [
                    'name' => 'adm_order_received',
                    'language' => ['code' => 'en'],
                    'components' => [
                        [   // This opening bracket was missing
                            'type' => 'body',
                            'parameters' => [
                                ['type' => 'text', 'text' => $adminrname],
                                ['type' => 'text', 'text' => $customerName],
                                ['type' => 'text', 'text' => $orderid],
                                ['type' => 'text', 'text' => $request->noofproduct ],
                                ['type' => 'text', 'text' => $delivaryaddress ],
                                ['type' => 'text', 'text' => $totalorderamount]
                            ]
                        ]   // This closing bracket was missing
                    ]
                ]
            ]);
        
        }
        
        
        
        
        
        
        $response1 = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => 'order_confirmed', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1639830590191084'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $customerName  // This will replace {{1}} in your template
                            ],
                            [
                                'type' => 'text',
                                'text' => $orderid  // This will replace {{1}} in your template
                            ],
                            [
                                'type' => 'text',
                                'text' => $price  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        
        
        
    }
    elseif($id === 2)
    {
        $response = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => 'new_user', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1689555878312113'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $customerName  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        
    }
    elseif($id === 3)
    {
        $response = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => 'incomplete__checkout', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1405863220414249'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $customerName  // This will replace {{1}} in your template
                            ],
                            [
                                'type' => 'text',
                                'text' => $orderid  // This will replace {{1}} in your template
                            ],
                            [
                                'type' => 'text',
                                'text' => $price  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
    
    elseif($id === 4)
    {
        $response = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $userphone,
            'type' => 'template',
            'template' => [
                'name' => 'product_return', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1220508096144677'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $username  // This will replace {{1}} in your template
                            ],
                            [
                                'type' => 'text',
                                'text' => $oid  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
    
    elseif($id === 5)
    {
        $response = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $akashphone,
            'type' => 'template',
            'template' => [
                'name' => 'new_user', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1689555878312113'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $akashname  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        
    }
    elseif($id === 6)
    {
        $response = Http::withToken($token)->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $viewphone,
            'type' => 'template',
            'template' => [
                'name' => 'view_cart', // Use your actual template name as shown in WhatsApp Business
                'language' => ['code' => 'en'],
                'components' => [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'image',
                                'image' => [
                                    'id' => '1332167114556642'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $viewname  // This will replace {{1}} in your template
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        
    }
    
    
    
    



        // $response = Http::withToken($token)->post($url, [
        //     'messaging_product' => 'whatsapp',
        //     'to' => $to,
        //     'type' => 'template',
        //     'template' => [
        //         'name' => 'opening_sale_2025',
        //         'language' => ['code' => 'en'],
        //         'components' => [
        //             [
        //                 'type' => 'header',
        //                 'parameters' => [
        //                     [
        //                         'type' => 'image',
        //                         'image' => [
        //                             'link' => 'https://fileinfo.com/img/ss/xl/jpg_44-2.jpg' // <-- your image URL
        //                         ]
        //                     ]
        //                 ]
        //             ]
        //         ]
        //     ]
        // ]);
        
        
        // Log the full response
        Log::info('WhatsApp API Response', [
            'status' => $response->status(),
            'body' => $response->body(),
            'json' => $response->json()
        ]);

        if ($response->successful()) {
            return response()->json([
                'status' => 'Message sent successfully!', 
                'response' => $response->json() // Include the actual API response
            ]);
        } else {
            return response()->json([
                'status' => 'Failed to send message',
                'error' => $response->json()
            ], 500);
        }
        
        
    }

    public function verifyWebhook(Request $request)
    {
        $verify_token = 'ohh!buddie-website-042025'; // EXACT match
    
        $mode = $request->query('hub_mode');
        $token = $request->query('hub_verify_token');
        $challenge = $request->query('hub_challenge');
    
        if ($mode === 'subscribe' && $token === $verify_token) {
            return response($challenge, 200);
        } else {
            return response('Forbidden', 403);
        }
    }
    
    public function handleWebhook(Request $request)
    {
        Log::info('Incoming webhook:', $request->all());
    
        // You can customize this to react to messages/events
        return response()->json(['status' => 'received'], 200);
    }

    public function handle(Request $request)
    {
    // WhatsApp verification step
    if ($request->get('hub_mode') === 'subscribe' && 
        $request->get('hub_verify_token') === 'Local-Machine-Token-ohhbuddie2025') {
        
        return response($request->get('hub_challenge'), 200);
    }

    // Log actual messages/events after webhook is verified
    Log::info('Webhook event:', $request->all());

    return response('OK', 200);
    }

}