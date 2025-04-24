<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cartQuery = DB::table('carts');
        // Check if user is logged in
        if (Auth::check()) {
            $userId = Auth::id();
            $tempUserId = null; // No need to track temp ID if logged in

            $address = DB::table('addresses')->where('user_id', $userId)->get();
            $ad_cnt = DB::table('addresses')->where('user_id', $userId)->count();

            $cart_data = $cartQuery->where('user_id', $userId)->latest()->get();
        } else {
            // If user is not logged in, get temp_user_id from session or request
            $userId = 0;
            $tempUserId = session('temp_user_id') ?? $request->cookie('temp_user_id');
            $address = 'NA';
            $ad_cnt = 0;

            $cart_data = $cartQuery->where('temp_user_id', $tempUserId)->latest()->get();
        }



        // Fetch cart data for either user_id or temp_user_id


        // Apply user condition
        if ($userId > 0) {
            $cartQuery->where('user_id', $userId);
        } elseif ($tempUserId) {
            $cartQuery->where('temp_user_id', $tempUserId);
        }

        // Exclude carts that are already in completed orderdetails
        $cartQuery->whereNotIn('id', function ($query) {
            $query->select('cart_id')
                ->from('orderdetails')
                ->where('payment_status', 'completed');
        });

        // Get the result


        // Initialize cart details
        $cart_details = [];
        $total_price = 0;
        $total_qty = 0;
        $total_mrp = 0;
        $total_discount = 0;
        $total_tax = 0;
        $total_shipping = 0;


        foreach ($cart_data as $cdats) {

            $product = DB::table('products')->where('id', $cdats->product_id)->latest()->first();

            if (!$product) {
                continue; // Skip this item if product does not exist
            }

            $images = json_decode($product->images, true);

            $cart_details[] = [
                'image' => (!empty($images) && is_array($images)) ? $images[0] : 'default.jpg',
                'mrp' => $cdats->mrp,
                'price' => $cdats->price,
                'tax' => $cdats->tax,
                'discount' => $cdats->discount,
                'size' => $cdats->size_name,
                'color' => $cdats->color_name,
                'shipping' => $cdats->shipping_cost,
                'product_name' => $product->product_name,
                'quantity' => $cdats->quantity,
                'cart_value' => $cdats->cart_value,
                'id' => $cdats->id,
                'pid' => $product->id,
                'brand_id' => $product->brand_id,
                'idp' => $product->product_id,
                'cart_value' => $cdats->cart_value,
                'user_id' => $cdats->user_id,
                'temp_user_id' => $cdats->temp_user_id,
            ];

            // Calculate totals
            $total_price += $cdats->cart_value;

            if ($total_price >= 200 && $total_price <= 499) {
                $total_shippingg = 49;
            } elseif ($total_price >= 499 && $total_price <= 799) {
                $total_shippingg = 29;
            } else {
                $total_shippingg = 'Free';
            }

            $total_mrp += $cdats->updated_mrp;
            $total_qty += $cdats->quantity;
            $total_discount += $cdats->discount * $cdats->quantity;
            $total_tax += $cdats->tax;
            $total_shipping = $cdats->shipping_cost;
            $total_shipping = $total_shippingg;
        }



        $subSubCatIds = [];

        foreach ($cart_data as $cdat) {
            $cat_id = DB::table('products')
                ->select('sub_subcategory_id', 'subcategory_id')
                ->where('id', $cdat->product_id)
                ->first();

            if ($cat_id) {
                $subSubCatIds[] = $cat_id->sub_subcategory_id ?: $cat_id->subcategory_id;
            }
        }

        // Remove duplicates
        $uniqueSubSubCatIds = array_unique($subSubCatIds);


        // Fetch all related products in a single query, excluding those already in the cart
        $cartProductIds = collect($cart_data)->pluck('product_id')->toArray();

        $may_like = DB::table('products')
            ->whereNotNull('parent_id')
            ->whereNotIn('id', $cartProductIds)
            ->whereNotNull('images')
            ->where(function ($query) use ($uniqueSubSubCatIds) {
                $query->whereIn('sub_subcategory_id', $uniqueSubSubCatIds)
                    ->orWhereIn('subcategory_id', $uniqueSubSubCatIds);
            })
            ->select('products.*')
            ->orderByDesc('id')
            ->get()
            ->groupBy('parent_id')
            ->map(function ($group) {
                return $group->unique('color_name');
            })
            ->flatten();





        $wish_list = [];
        foreach ($may_like as $wish) {
            $product = DB::table('products')->where('id', $wish->id)->latest()->first();
            $pp['wid'] = $wish->id;
            $pp['id'] = $product->id;
            $pp['pid'] = $product->product_id;
            $pp['sid'] = $product->sub_subcategory_id;
            $pp['images'] = $product->images;
            $pp['name'] = $product->product_name;
            $pp['mrp'] = $product->maximum_retail_price;
            $pp['price'] = $product->portal_updated_price;
            $pp['pid'] = $product->product_id;
            $pp['brand_id'] = $product->brand_id;
            $wish_list[] = $pp;
        }

        // return $may_like;
        return view('cart.index', compact(
            'address',
            'ad_cnt',
            'cart_data',
            'cart_details',
            'total_price',
            'total_qty',
            'total_mrp',
            'total_discount',
            'total_shipping',
            'total_tax',
            'may_like',
            'wish_list'
        ));
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
        // Retrieve temp_user_id from request or generate a new one
        $tempUserId = $request->temp_user_id ?? uniqid('temp_', true);
        // return $tempUserId;

        session(['temp_user_id' => $tempUserId]);

        // If user is logged in, update cart with user_id
        if (Auth::check()) {
            DB::table('carts')->where('temp_user_id', $tempUserId)
                ->update(['temp_user_id' => null, 'user_id' => Auth::id()]);

            $wishcnt = DB::table('wishlists')->where('user_id', Auth::user()->id)->count();
        } else {
            $wishcnt = DB::table('wishlists')->where('temp_user_id', $tempUserId)->count();
        }

        if ($wishcnt > 0) {
            DB::table('wishlists')
                ->where(function ($query) use ($tempUserId) {
                    if (Auth::check()) {
                        $query->Where('user_id', Auth::id());
                        ;
                    } else {
                        $query->where('temp_user_id', $tempUserId);
                    }


                })
                ->where('product_uid', $request->product_id)
                // ->where('size_name', $request->size_name)
                ->delete();


        }

        // Set shipping cost (Fixed to 0 for now)
        $shipping = 0;


        $pdetail = DB::table('products')->where('product_id', $request->product_id)->where('size_name', $request->size_name)->latest()->first();

        $p1 = ($pdetail->portal_updated_price / (100 + $request->gst_rate)) * 100;
        $tax = $pdetail->portal_updated_price - $p1;

        // Get color name from the database
        $color = DB::table('colors')->where('hex_code', $request->color_name)->first();
        $color_name = $color ? $color->color_name : null;



        $cart_value = $pdetail->portal_updated_price + $shipping;

        $discount = $pdetail->maximum_retail_price - $pdetail->portal_updated_price;

        // Store Cart Data
        Cart::create([
            'user_id' => Auth::check() ? Auth::id() : null, // Use Auth if user is logged in
            'temp_user_id' => $tempUserId,
            'color_name' => $color_name,
            'size_name' => $request->size_name,
            'product_id' => $pdetail->id,
            'product_uid' => $pdetail->product_id,
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

            'updated_mrp' => $pdetail->maximum_retail_price,
            'updated_discount' => $discount,
            'updated_price' => $pdetail->portal_updated_price,

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

        if ($request->page == 'wishlist') {
            return response()->json(['success' => true, 'redirect' => url('/addtocart')]);
        } else {
            return response()->json([
                'message' => 'Product added to cart successfully!',
                'temp_user_id' => $tempUserId
            ]);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {

        $cdata = DB::table('carts')->where('id', $cart->id)->first();


        // Get product details
        $pdetail = DB::table('products')->where('id', $cdata->product_id)->first();

        if ($pdetail) {
            // Calculate quantity difference
            $quantityDifference = $request->quantity - $cart->quantity;

            // Adjust stock based on the difference
            $update_stock = $pdetail->stock_quantity - $quantityDifference;

            // Ensure stock does not go negative
            $update_stock = max(0, $update_stock);

            // Update stock quantity
            DB::table('products')->where('id', $cdata->product_id)->update(['stock_quantity' => $update_stock]);
        }

        $cart->delete();

        return back()->with('success', 'Product deleted successfully');
    }

    public function updateSize(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($cart) {
            $cart->size_name = $request->size_name;
            $cart->save();

            return response()->json(['message' => 'Size updated successfully!']);
        }

        return response()->json(['message' => 'Cart item not found.'], 404);
    }

    public function updateQuantity(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if (!$cart) {
            return response()->json(['message' => 'Cart item not found.'], 404);
        }

        // Get cart item data
        $cdata = DB::table('carts')->where('id', $request->cart_id)->first();

        // Get product details
        $pdetail = DB::table('products')->where('id', $cdata->product_id)->first();

        if ($pdetail) {
            // Calculate quantity difference
            $quantityDifference = $request->quantity - $cart->quantity;

            // Adjust stock based on the difference
            $update_stock = $pdetail->stock_quantity - $quantityDifference;

            // Ensure stock does not go negative
            $update_stock = max(0, $update_stock);

            // Update stock quantity
            DB::table('products')->where('id', $cdata->product_id)->update(['stock_quantity' => $update_stock]);
        }

        // Update cart quantity and price
        $cart->quantity = $request->quantity;
        $cart->cart_value = $cart->price * $request->quantity;
        $cart->updated_mrp = $cart->quantity * $pdetail->maximum_retail_price;
        $cart->updated_discount = $cart->quantity * ($pdetail->maximum_retail_price - $pdetail->portal_updated_price);
        $cart->save();

        // Recalculate totals only for the current user/session
        $total_price = Cart::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('temp_user_id', session('temp_user_id'));
        })->sum('cart_value');

        $total_mrp = Cart::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('temp_user_id', session('temp_user_id'));
        })->sum('updated_mrp');

        $total_discount = Cart::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('temp_user_id', session('temp_user_id'));
        })->sum('updated_discount');

        $total_tax = Cart::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('temp_user_id', session('temp_user_id'));
        })->sum('tax');

        // Shipping calculation
        if ($total_price <= 499) {
            $total_shipping = 49;
        } elseif ($total_price >= 500 && $total_price <= 749) {
            $total_shipping = 29;
        } else {
            $total_shipping = 0;
        }

        // Final price calculation
        $final_price = $total_price + $total_shipping;

        return response()->json([
            'message' => 'Quantity updated successfully!',
            'updated_price' => $cart->cart_value,
            'total_price' => $total_price,
            'total_mrp' => $total_mrp,
            'total_discount' => $total_discount,
            'total_tax' => $total_tax,
            'total_shipping' => $total_shipping,
            'final_price' => $final_price
        ]);
    }

}
