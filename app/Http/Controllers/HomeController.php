<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(config('app.timezone'), now());

        if(Auth::check())
        {
            $ncnt = DB::table('users')->whereNull('name')->where('id',Auth::user()->id)->count();
        }
        else
        {
            $ncnt = 0;
        }
        
        
        // return $ncnt;
        if($ncnt >= 1 && Auth::check())
        {
            $logincount = 0; 
        }
        else
        {
            $logincount = 1; 
        }
        
        if (!Auth::check()) {
            $logindata = 0;
        }
        else
        {
            $logindata = 1;
        }
        


                
        $coupon1 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 1.png');
        $coupon2 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 2.png');
        $coupon3 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 3.png');


    

            
        $groupUniqueByColor = function ($collection) {
            return $collection
                ->groupBy('parent_id')
                ->map(function ($group) {
                    return $group->groupBy('color_name')->map(function ($colorGroup) {
                        return $colorGroup->first();
                    })->values();
                })
                ->flatten();
        };
        
        // Jeans
        $jeans = $groupUniqueByColor(
            DB::table('products')
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->inRandomOrder()
                ->get()
        );
        
        // Shoes
        $shoes = $groupUniqueByColor(
            DB::table('products')
                ->whereIn('subcategory_id', [23, 67])
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle()->take(8);
        
        // Saree
        $saree = $groupUniqueByColor(
            DB::table('products')
                ->where('sub_subcategory_id', 40)
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle()->take(8);
        
        // Western
        $western = $groupUniqueByColor(
            DB::table('products')
                ->where('sub_subcategory_id', 50)
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle();
        
        // Kurti
        $kurti = $groupUniqueByColor(
            DB::table('products')
                ->whereIn('sub_subcategory_id', [42, 43])
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle();
        
        // T-Shirt
        $tshirt = $groupUniqueByColor(
            DB::table('products')
                ->where('sub_subcategory_id', 3)
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle();
        
        // Kids
        $kids = $groupUniqueByColor(
            DB::table('products')
                ->where('category_id', 88)
                ->whereNotNull('seller_id')
                ->orderByDesc('id')
                ->get()
        )->shuffle();

            
        // return $jeans;
        return view('home',compact('jeans','logindata', 'logincount','coupon1','coupon2','coupon3','shoes','saree','western','kurti','tshirt','kids'));
    }
    
    public function account()
    {
        return view('user.account');
    }
        

    public function nameupdate(Request $request)
    {
        // Ensure user is authenticated
        if (Auth::check()) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name' => $request->name]); // Correct update syntax
        }
    
        return back()->with('success', 'Name updated successfully.');
    }
    

    public function showColors()
    {
        $product1 = Storage::disk('s3')->url('test/pixelcut-export (14).png');
        $product2 = Storage::disk('s3')->url('Home/Trending Cards/jeans.mp4');
        $product3 = Storage::disk('s3')->url('Home/Trending Cards/saree.mp4');
        $product4 = Storage::disk('s3')->url('Home/Trending Cards/shoe.mp4');
        $product5 = Storage::disk('s3')->url('Home/Trending Cards/t shir.mp4');
        
        
        $colors = DB::table('colors')->where('level','1')->get(); // Fetch all colors from the database
        $categories = DB::table('sizes')->get();
        
        // return $colors = DB::table('colors')->count();
        return view('colorselection', compact('colors','categories'));
    }
    
    public function getSizes($categoryId)
    {
        $category = DB::table('sizes')->where('id', $categoryId)->first();
        
        if ($category) {
            $sizes = json_decode($category->details, true); // Convert JSON to array
            return response()->json($sizes);
        }

        return response()->json([]);
    }
    public function contact()
    {
        return view('contact.index');
    }
    public function privacy()
    {
        return view('privacy.index');
    }
    public function orderconfirm()
    {
        return view('Order.orderconfirm');
    }
    public function terms()
    {
        return view('privacy.terms');
    }
    public function refund()
    {
        return view('privacy.refund');
    }
    public function about()
    {
        return view('privacy.about');
    }
    public function shipping()
    {
        return view('privacy.shipping');
    }
    
    
    
    
    
    
    
}
