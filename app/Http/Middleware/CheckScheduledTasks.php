<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CheckScheduledTasks
{
    public function handle($request, Closure $next)
    {
        $now = Carbon::now();
        
        // Check if current time is 17:45
        if ($now->format('H:i') === '17:45') {
            // Run your WhatsApp task
            $this->sendWhatsAppMessage();
        }
        
        return $next($request);
    }
    
    private function sendWhatsAppMessage()
    {
        // Don't send more than once
        $cacheKey = 'whatsapp_sent_' . date('Y-m-d');
        if (!Cache::has($cacheKey)) {
            try {
                $whatsappRequest = new Request([
                    'akashphone' => 7003764141,
                    'message' => "Your order has been confirmed and payment received successfully!",
                    'akashname' => 'Akash Das',
                    'id' => 5,
                ]);
                
                $whatsappController = new WhatsAppController();
                $whatsappController->sendMessage($whatsappRequest);
                
                // Mark as sent for today
                Cache::put($cacheKey, true, 60 * 60 * 24); // 24 hours
                
                // Log success
                Log::info('WhatsApp scheduled message sent successfully at ' . Carbon::now());
            } catch (\Exception $e) {
                // Log error
                Log::error('Error sending WhatsApp message: ' . $e->getMessage());
            }
        }
    }
}