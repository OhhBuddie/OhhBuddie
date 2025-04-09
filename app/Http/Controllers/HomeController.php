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
        
        
        $saree_icon = Storage::disk('s3')->url('Home/Category Icons/sareebg(brown).gif');
        $dress_icon = Storage::disk('s3')->url('Home/Category Icons/dress1.gif');
        $jeans_icon = Storage::disk('s3')->url('Home/Category Icons/jeans.gif');
        $kurti_icon = Storage::disk('s3')->url('Home/Category Icons/kurti.gif');
        $housecoat_icon = Storage::disk('s3')->url('Home/Category Icons/housecoat(bgblue).gif');
        $traouser_icon = Storage::disk('s3')->url('Home/Category Icons/traouser.gif');
        $tshirt_icon = Storage::disk('s3')->url('Home/Category Icons/tshirt.gif');
        $shoe_icon = Storage::disk('s3')->url('Home/Category Icons/shoe.gif');
        $nighty_icon = Storage::disk('s3')->url('Home/Category Icons/night dress.gif');
        
        
        $slider1 = Storage::disk('s3')->url('Home/Sliders/static slider western.jpg');
        $slider2 = Storage::disk('s3')->url('Home/Sliders/jeans static slider.jpg');
        $slider3 = Storage::disk('s3')->url('Home/Sliders/static slider kids.jpg');
        $slider4 = Storage::disk('s3')->url('Home/Sliders/static slider saree.jpg');
        $slider5 = Storage::disk('s3')->url('Home/Sliders/try out.jpg');
        
                
        $coupon1 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 1.png');
        $coupon2 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 2.png');
        $coupon3 = Storage::disk('s3')->url('Home/Coupon/coupon for mobile 3.png');
        
        // Weekly Trands 
        
        $product1 = Storage::disk('s3')->url('Home/Trending Cards/dress.mp4');
        $product2 = Storage::disk('s3')->url('Home/Trending Cards/jeans.mp4');
        $product3 = Storage::disk('s3')->url('Home/Trending Cards/saree.mp4');
        $product4 = Storage::disk('s3')->url('Home/Trending Cards/shoe.mp4');
        $product5 = Storage::disk('s3')->url('Home/Trending Cards/t shir.mp4');
        
        // Our USP
        
        $usp = Storage::disk('s3')->url('Home/USP Banner/usp banner 17.02.25.gif');
        
        // Category Banner
        
        $category1 = Storage::disk('s3')->url('Home/Category Banners/saree mobile banner.mp4');
        $category2 = Storage::disk('s3')->url('Home/Category Banners/co-ordsetmobile banner.mp4');
        $category3 = Storage::disk('s3')->url('Home/Category Banners/salwar mobile banner.mp4');
        $category4 = Storage::disk('s3')->url('Home/Category Banners/t shirt mobile banner.mp4');
        $category5 = Storage::disk('s3')->url('Home/Category Banners/kids mobile banner (1).mp4');
        
        // Tranding's 
        
        $tranding1 = Storage::disk('s3')->url('Home/Cards 2/4 (1).jpg');
        $tranding2 = Storage::disk('s3')->url('Home/Cards 2/ek sutta - Copy.jpg');
        $tranding3 = Storage::disk('s3')->url('Home/Cards 2/For the Track(1).jpg');
        $tranding4 = Storage::disk('s3')->url('Home/Cards 2/good sleep (5).jpg');
    
        // // Code for jeans category
        // $jeans = DB::table('products')
        //     // ->whereIn('sub_subcategory_id', [18,60])
        //     ->whereNotNull('seller_id')
        //     ->inRandomOrder() // Fetch records in random order
        //     // ->take(10)       
        //     ->get();  
            
            
            
            
        $jeans = DB::table('products')
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
            
        $shoes = DB::table('products')
            ->whereIn('subcategory_id', [23,67])
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
            
        $saree = DB::table('products')
            ->where('sub_subcategory_id', 40)
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
            
            
        $western = DB::table('products')
            ->where('sub_subcategory_id', 50)
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
        
        // return $jeans;
                    
        $kurti = DB::table('products')
            ->whereIn('sub_subcategory_id', [42,43])
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();        
            
        $tshirt = DB::table('products')
            ->where('sub_subcategory_id', 3)
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
            
        $kids = DB::table('products')
            ->where('parent_id', 88)
            ->whereNotNull('seller_id') // Ensure only products with a seller_id
            ->orderByDesc('id') // Sorting latest first
            ->inRandomOrder() // Shuffle the results randomly
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->groupBy('color_name')->map(function ($colorGroup) {
                    // If multiple sizes exist with the same parent_id & color_name, pick only one
                    return $colorGroup->first(); 
                })->values();
            })->flatten();
            
        // return $jeans;
        return view('home',
        compact('jeans','logindata', 'logincount',
        'saree_icon', 'dress_icon', 'nighty_icon', 'housecoat_icon', 'jeans_icon', 'kurti_icon', 'shoe_icon', 'traouser_icon', 'tshirt_icon', 
        'slider1', 'slider2', 'slider3', 'slider4', 'slider5', 'product1', 'product2', 'product3', 'product4', 'product5','coupon1','coupon2','coupon3',
        'usp', 'category1', 'category2', 'category3', 'category4', 'category5', 'tranding1', 'tranding2', 'tranding3', 'tranding4','shoes','saree','western','kurti','tshirt','kids'
        ));
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
