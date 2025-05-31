<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\WhatsAppController;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    
    public function send()
    {
        
        
        // Create a request object for the WhatsApp controller
        $whatsappRequest = new Request([
            'akashphone' => 7003764141,
            'message' => "Your order has been confirmed and payment received successfully!",
            'akashname' => 'Akash Das',
            'id' => 5,
        ]);
        
        // Call WhatsAppController's sendMessage method
        $whatsappController = new WhatsAppController();
        $whatsappController->sendMessage($whatsappRequest);

    }
    
    
    public function updateCounter()
    {
        // Assuming there's only one row in 'tests' to update
        $test = DB::table('tests')->first();

        if ($test) {
            $newValue = $test->counter + 1;

            DB::table('tests')->update(['counter' => $newValue]);

            return response()->json(['counter' => $newValue]);
        }

        // Insert a row if table is empty
        DB::table('tests')->insert(['counter' => 1]);

        return response()->json(['counter' => 1]);
    }
    
    public function showAndUpdate()
    {
        // Step 1: Update the counter
        $test = DB::table('tests')->first();
    
        if ($test) {
            $newValue = $test->counter + 1;
            DB::table('tests')->update(['counter' => $newValue]);
        } else {
            $newValue = 1;
            DB::table('tests')->insert(['counter' => $newValue]);
        }
    
        // Step 2: Call WhatsAppController to send message
        $whatsappRequest = new Request([
            'akashphone' => 7003764141,
            'message' => "Your order has been confirmed and payment received successfully!",
            'akashname' => 'Akash Das',
            'id' => 5,
        ]);
    
        $whatsappController = new WhatsAppController();
        $whatsappController->sendMessage($whatsappRequest);
    
        // Optional: Return updated value (if calling via route)
        return response()->json(['counter' => $newValue]);
    }
    
    
    public function sendAutoMessage(Request $request)
    {
        Log::info('Auto message triggered'); // Debug log
    
        $whatsappRequest = new Request([
            'akashphone' => +917003764141,
            'message' => "Your order has been confirmed and payment received successfully!",
            'akashname' => 'Akash Das',
            'id' => 5,
        ]);
        
        
    
        try {
            
            
             $whatsappController = new WhatsAppController();
             $whatsappController->sendMessage($whatsappRequest);
             
            // $this->sendAutoMessage($whatsappRequest); // Assuming this sends WhatsApp API request
            return response()->json(['status' => 'sent']);
        } catch (\Exception $e) {
            Log::error('Message failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
        
    public function abc()
    {
        $d = DB::table('carts')->latest()->get();
    }
}