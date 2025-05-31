<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use DB;

use Carbon\carbon;

use Illuminate\Support\Str; // Make sure this is at the top


class InvoiceController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index(Request $request, $id)

    {
        $order_detail = DB::table('orderdetails')->where('id',$id)->latest()->first();
        $odr_data = DB::table('orders')->where('id',$order_detail->order_id)->latest()->first();
        $seller_detail = DB::table('sellers')->where('seller_id',$order_detail->seller_id)->latest()->first();
        $product_detail = DB::table('products')->where('id',$order_detail->product_id)->latest()->first();
        $address_data = DB::table('addresses')->where('id',$odr_data->shipping_address)->latest()->first();
        $transaction_data = DB::table('transactions')->where('order_id',$odr_data->order_id)->latest()->first();
        
        
        $finalAmount = $transaction_data->amount;       // Total amount including GST
        $gstRate = $product_detail->gst_rate;             // GST percentage (e.g., 18%)
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
        
        $next_year = Carbon::now()->addYear(1)->format('Y');
        
        $numericSellerId = preg_replace('/\D/', '', $seller_detail->seller_id);
        
        // Take first 3 uppercase letters of company name, removing spaces/specials if needed
        $companyPrefix = strtoupper(Str::substr(preg_replace('/\W+/', '', $seller_detail->company_name), 0, 3));
        
        $latestInvoice = DB::table('orderdetails')
            ->where('seller_id', $seller_detail->seller_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereNotNull('invoice_id')
            ->orderByDesc('invoice_id')
            ->first();
        
        $base = $numericSellerId . $companyPrefix . $next_year;
        
        if ($latestInvoice && isset($latestInvoice->inv_id)) {
            $lastInvId = $latestInvoice->inv_id;
            $lastNumber = (int) substr($lastInvId, strlen($base));
            $nextNumber = str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = str_pad(1, 7, '0', STR_PAD_LEFT);
        }
        
        $inv_id = $base . $nextNumber;
        
        
        DB::table('orderdetails')->where('id',$id)->update(['invoice_id'=>$inv_id,'updated_at'=>now()]);
        
        // return $inv_id = $numericSellerId.$next_year.0000000
        
        $pdf = Pdf::loadView('invoice_new', ['seller_detail' => $seller_detail,
                                             'product_detail' => $product_detail,
                                             'odr_data' => $odr_data,
                                             'address_data' => $address_data,
                                             'cgst'=> $cgst,
                                             'sgst'=> $sgst,
                                             'taxableAmount'=> $taxableAmount,
                                             'finalAmount' => $finalAmount,
                                             'inv_id' => $inv_id]);

      
        return $pdf->download($inv_id . '.pdf');

    }

}