<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('wishlists')->latest();
    
        // Check if user is logged in
        if (Auth::check()) {
            $query->where('user_id', Auth::user()->id);
        } else {
            $tempUserId = session()->get('temp_user_id');
            if ($tempUserId) {
                $query->where('temp_user_id', $tempUserId);
            }
        }
    
        $wishlist = $query->get();
        

        $wish_list = [];
        foreach($wishlist as $wish)
        {
            $product = DB::table('products')->where('id',$wish->product_id)->latest()->first();
            $pp['wid'] = $wish->id;
            $pp['id'] = $product->id;
            $pp['pid'] = $product->product_id;
            $pp['sid'] = $product->sub_subcategory_id;
            $pp['images'] = $product->images;
            $pp['name'] = $product->product_name;
            $pp['mrp'] = $product->maximum_retail_price;
            $pp['price'] = $product->portal_updated_price;
            $pp['pid'] = $product->product_id;
            $wish_list[] = $pp;
        }
        
        // return $wish_list;
        return view('wishlist.index', compact('wishlist','wish_list'));
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
    // public function store(Request $request)
    // {
    //     $pdata = DB::table('products')->where('id',$request->product_id)->latest()->first();
    //     $wishlist = new Wishlist();
    //     $wishlist->temp_user_id = $request->temp_user_id;
    //     $wishlist->user_id = $request->user_id;
    //     $wishlist->product_id = $request->product_id;
    //     $wishlist->product_uid = $pdata->product_id;
    //     $wishlist->size_name = $pdata->size_name;

    //     $wishlist->save();
    
    //     DB::table('carts')->where('id', $request->ppid)->delete();
    
    //     return redirect()->url('/addtocart')->with(['toast_message' => 'Product Added to cart Successfully.']);

        
    // }
    
    public function store(Request $request)
{

    // Check if product already exists in wishlist
    $existing = DB::table('wishlists')
        ->where('product_id', $request->product_id)
        ->where(function ($query) use ($request) {
            if ($request->user_id) {
                $query->where('user_id', $request->user_id);
            } else {
                $query->where('temp_user_id', $request->temp_user_id);
            }
        })
        ->first();

    if ($existing) {
        return response()->json([
            'success' => false,
            'message' => 'Product is already in your wishlist.'
        ]);
    }

    // Fetch product data
    $pdata = DB::table('products')->where('id', $request->product_id)->first();

    // Create new wishlist entry
    $wishlist = new Wishlist();
    $wishlist->temp_user_id = $request->temp_user_id;
    $wishlist->user_id = $request->user_id;
    $wishlist->product_id = $request->product_id;
    $wishlist->product_uid = $pdata->product_id;
    $wishlist->size_name = $pdata->size_name;
    $wishlist->save();

    // Remove from cart
    DB::table('carts')->where('id', $request->ppid)->delete();

    return response()->json([
        'success' => true,
        'message' => 'Product added to your wishlist!',
        'redirect' => url()->previous() // or any other page you want
    ]);
}

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
public function destroy(Request $request, Wishlist $wishlist)
{
   $wishlist->delete();
   return back()->with('success','Product deleted successfully');
}
    public function cart(Request $request)
    {
        // Retrieve temp_user_id from request or generate a new one
        $tempUserId = $request->temp_user_id ?? uniqid('temp_', true);
    
        // Store temp_user_id in session (for guest users)
        session(['temp_user_id' => $tempUserId]);
    
        // If user is logged in, update cart with user_id
        if (Auth::check()) {
            DB::table('carts')->where('temp_user_id', $tempUserId)
                ->update(['temp_user_id' => null, 'user_id' => Auth::id()]);
        }
    
    
        $wishcnt = DB::table('wishlists')->where('temp_user_id',$tempUserId)->orwhere('user_id',Auth::user()->id)->count();
        
        if($wishcnt > 0)
        {
             DB::table('wishlists')->where('temp_user_id',$tempUserId)->orwhere('user_id',Auth::user()->id)->where('product_id', $request->product_id)->delete();
        }
        
        // Set shipping cost (Fixed to 0 for now)
        $shipping = 0;
    
        // Tax Calculation
        $p1 = ($request->price / (100 + $request->gst_rate)) * 100;
        $tax = $request->price - $p1;
    
        // Get color name from the database
        $color = DB::table('colors')->where('hex_code', $request->color_name)->first();
        $color_name = $color ? $color->color_name : null;
    
        // Discount Calculation
        $discount = $request->mrp - $request->price;
    
        // Cart total value
        $cart_value = $request->price + $shipping;
    
        // Store Cart Data
        Cart::create([
            'user_id' => Auth::check() ? Auth::id() : null, // Use Auth if user is logged in
            'temp_user_id' => $tempUserId,
            'color_name' => $color_name,
            'size_name' => $request->size_name,
            'product_id' => $request->product_id,
            'variation' => "NA",
            'price' => $request->price,
            'cart_value' => $cart_value,
            'tax' => $tax,
            'discount' => $discount,
            'shipping_cost' => $shipping,
            'shipping_type' => "NA",
            'pickup_point' => 1,
            'carrier_id' => 1,
            'product_referral_code' => "NA",
            'coupon_code' => "NA",
            'coupon_applied' => 1,
            'quantity' => 1,
            'segment' => "Buy",
            'mrp' => $request->mrp,
        ]);
    
        // Fetch the product details
        $pdetail = DB::table('products')->where('id', $request->product_id)->first();
        // return $pdetail;
        if ($pdetail) {
            $update_stock = $pdetail->stock_quantity - 1;
    
            // Ensure stock does not go negative
            if ($update_stock < 0) {
                $update_stock = 0;
            }
    
            // Update stock quantity
            DB::table('products')->where('id', $request->product_id)->update(['stock_quantity' => $update_stock]);
        }
    
        return response()->json(['success' => true, 'redirect' => url('/addtocart')]);

    }
}
