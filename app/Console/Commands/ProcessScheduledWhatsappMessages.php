<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ScheduledWhatsappMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\DB;


class ProcessScheduledWhatsappMessages extends Command
{
    protected $signature = 'whatsapp:process-scheduled';
    protected $description = 'Send WhatsApp messages that are scheduled after a delay';

    public function handle()
    {
        // Messages NOT having dynamic_id = 6
        $regularMessages = ScheduledWhatsappMessage::where('is_sent', false)
            ->where('send_after', '<=', now())
            ->where('dynamic_id', '!=', 6)
            ->get();
    
        foreach ($regularMessages as $msg) {
            
            $phone = preg_replace('/[^0-9]/', '', $msg->phone);
                    
            // If phone number doesn't start with country code, add it
            if (strlen($phone) == 10) {
                $phone = '91' . $phone;
            }
    
            
            $this->sendWhatsApp($msg, [
                'phone' => $phone,
                'message' => $msg->message,
                'name' => $msg->name,
                'id' => $msg->dynamic_id,
                'orderid' => $msg->orderid,
                'price' => $msg->price,
            ]);
        }
    
        // Messages with dynamic_id = 6
        $specialMessages = ScheduledWhatsappMessage::where('is_sent', false)
            ->where('send_after', '<=', now())
            ->where('dynamic_id', 6)
            ->whereNotNull('orderid')
            ->whereIn('orderid', function ($query) {
                $query->select('user_id')
                    ->from('carts')
                    ->where('checkout_initiative', 0);
            })
            ->get();
            
            
            
            
    
        foreach ($specialMessages as $msg) {
            
            $phone = preg_replace('/[^0-9]/', '', $msg->phone);
                    
            // If phone number doesn't start with country code, add it
            if (strlen($phone) == 10) {
                $phone = '91' . $phone;
            }
            
            $this->sendWhatsApp($msg, [
                'viewphone' => $phone,
                'message' => $msg->message,
                'viewname' => $msg->name,
                'id' => $msg->dynamic_id,
            ]);
        }
    }
    
    private function sendWhatsApp($msg, array $requestData)
    {
        try {
            $request = new Request($requestData);
            $controller = new WhatsAppController();
            $controller->sendMessage($request);
    
            $msg->is_sent = true;
            $msg->save();
    
            $this->info("WhatsApp sent to {$msg->phone}");
        } catch (\Exception $e) {
            $this->error("Failed to send message to {$msg->phone}: {$e->getMessage()}");
        }
    }

}
