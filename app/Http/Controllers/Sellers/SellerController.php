<?php

namespace App\Http\Controllers\Sellers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.index');
    }
    
    public function registration()
    {
        $sid= Auth::user()->id;
        
        $seller_data = DB::table('sellers')->where('user_table_id',$sid)->latest()->first();
        $city = DB::table('cities')->latest()->get();
        $state = DB::table('states')->latest()->get();
        return view('seller.registration',compact('city','state','seller_data'));
    }
    public function submitform(Request $request, $id)
    {
        //   return $request->registered_phone_number;
        
        $seller_id = Db::table('sellers')->where('user_table_id',$id)->latest()->first();
         DB::table('sellers')
                ->where('user_table_id', $id)
                ->update([
                    'company_name' => $request->company_name ?? $seller->company_name,
                    'owner_name' => $request->owner_name ?? $seller->owner_name,
                    'registered_phone_number' => $request->registered_phone_number,
                    'registered_address1' => $request->registered_address1,
                    'registered_address2' => $request->registered_address2,
                    'registered_pincode' => $request->registered_pincode,
                    'registered_city' => $request->registered_city,
                    'registered_state' => $request->registered_state,
                    'warehouse_phone_number' => $request->warehouse_phone_number,
                    'warehouse_email_id' => $request->warehouse_email_id,
                    'warehouse_address1' => $request->warehouse_address1,
                    'warehouse_address2' => $request->warehouse_address2,
                    'warehouse_pincode' => $request->warehouse_pincode,
                    'warehouse_city' => $request->warehouse_city,
                    'warehouse_state' => $request->warehouse_state,
                    'bank_account_holder' => $request->bank_account_holder,
                    'bank_account_number' => $request->bank_account_number,
                    'bank_account_ifsc' => $request->bank_account_ifsc,
                    'bank_account_type' => $request->bank_account_type,
                    'bank_name' => $request->bank_name,
                    'gst_number' => $request->gst_number,
                    'brand_name' => $request->brand_name,
                ]);
            
        $fileFields = ['gst_certificate', 'govt_id_proof', 'cancelled_cheque', 'trademark_certificate', 'brand_logo'];
    
        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/sellers/' . $seller_id->seller_id, $filename, 'public');
                $data[$fileField] = 'storage/' . $filePath;
            }
        }
    
        DB::table('sellers')->where('user_table_id', $id)->update($data);
    
        return response()->json(['message' => 'Seller details updated successfully!']);
    }
    public function login()
    {
        return view('seller.login');
    }

    public function enterOtp()
    {
        return view('seller.enter-otp');
    }

    public function enterEmail()
    {
        return view('seller.enter-email');
    }

    public function enterEmailOtp()
    {
        return view('seller.enter-email-otp');
    }

    public function submitPhone(Request $request)
    {
        return redirect()->route('seller.enter-otp');
    }

    public function submitOtp(Request $request)
    {
        return redirect()->route('seller.enter-email');
    }

    public function submitEmail(Request $request)
    {
        return redirect()->route('seller.enter-email-otp');
    }

    public function submitEmailOtp(Request $request)
    {
        return redirect()->route('seller.registration');
    }
    
    public function dashboard()
    {
        $name_count = DB::table('sellers')->where('user_table_id',Auth::user()->id)->count();
        
        if($name_count == 0)
        {
            $seller_name = 'Seller';
        }
        else
        {
            $seller_name = DB::table('sellers')->where('user_table_id',Auth::user()->id)->latest()->first();
        }
        
        
        return view('seller.dashboard',compact('seller_name'));
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
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
