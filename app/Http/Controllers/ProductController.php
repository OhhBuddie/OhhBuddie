<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $decryptedId = Crypt::decryptString(urldecode($id));
        
        // Extract only numeric characters
        $decryptedId = preg_replace('/\D/', '', $decryptedId);    
       
        $product_details = DB::table('products')->where('id',$decryptedId)->whereNotNull('product_name')->distinct()->first();
       
        $subcat_id = $product_details->subcategory_id;
        
        $subsubcat_id = $product_details->sub_subcategory_id;

        $similar = DB::table('products')
                    ->where('category_id', $product_details->category_id)
                    ->whereNotNull('parent_id')
                    ->where('id', '!=', $decryptedId)
                    ->where('color_name', '!=', $product_details->color_name)
                    ->where('parent_id', $product_details->parent_id)
                    ->select('products.*') // Select all columns
                    ->orderByDesc('id') // Latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->unique('color_name'); // Keep only one product per color
                    })
                    ->flatten();     
       
       
    
               $same_products = DB::table('products')
                    ->where('subcategory_id', $product_details->subcategory_id)
                    ->whereNotNull('parent_id')
                    ->whereNotNull('product_name')
                    ->where('color_name', '!=', $product_details->color_name)
                    ->where('id', '!=', $decryptedId)
                    ->select('products.*') // Select all columns
                    ->orderByDesc('id') // Latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->unique('color_name'); // Keep only one product per color
                    })
                    ->flatten(); 
                    
                    
        $colorcnt = DB::table('products')
                    ->where('category_id', $product_details->category_id)
                    ->whereNotNull('parent_id')
                    ->where('id', '!=', $decryptedId)
                    ->where('color_name', '!=', $product_details->color_name)
                    ->where('parent_id', $product_details->parent_id)
                    ->count();  
       
        $product = Storage::disk('s3')->url('Product/Easy Return.mp4');
       
       
        return view('product.index', compact('product','product_details','similar','same_products','subcat_id','subsubcat_id','colorcnt'));

    }
    
    public function checkPincode(Request $request)
    {
        $pincode = $request->pincode;
        
        // Check if pincode exists in the database
        $exists = DB::table('pincodes')->where('pincode', $pincode)->exists();

        return response()->json(['valid' => $exists]);
    }
    
    public function sellerproduct()
    {

       $seller_id = DB::table('sellers')->where('user_table_id',Auth::user()->id)->latest()->first();
       
       $seller_products = DB::table('products')->where('seller_id',$seller_id->seller_id)->distinct()->latest()->get();
       
       
    //   return $seller_products;
       $product = Storage::disk('s3')->url('Product/Comp 1 (4).gif');
       return view('product.sellerproduct', compact('product','seller_products'));

    }
    
    
    public function listing()
    {
       return view('product.listing');

    }
    public function listing1()
    {
        $level1 = DB::table('categories')->select('id','category')->where('level',0)->get();
        
        $level2_men = DB::table('categories')->select('id','subcategory')->where('level',1)->where('category','Men')->get();
        $level2_women = DB::table('categories')->select('id','subcategory')->where('level',1)->where('category','Women')->get();

        
        // return $level2_men;
       return view('product.listing1',compact('level1'));

    }
    
    public function form()
    {
        $seller_id = DB::table('sellers')->where('user_table_id', Auth::user()->id)->latest()->first();
        $parentid = DB::table('products')->where('seller_id',$seller_id->seller_id)->whereNotNull('parent_id')->latest()->get();
        
        $brand_cnt = DB::table('brands')->where('seller_id',$seller_id->seller_id)->count();
        
        $attr = DB::table('attributes')->latest()->get();
        
        $cat_id = request()->query('id'); 
        $subcat_id = request()->query('sub_id'); 
        $subsubcat_id = request()->query('sub_sub_id'); 
        

        $a = DB::table('categories')->where('id', request()->query('id'))->select('category')->latest()->first();
        $b = DB::table('categories')->where('id', request()->query('sub_id'))->select('subcategory')->latest()->first();
        $c = DB::table('categories')->where('id', request()->query('sub_sub_id'))->select('sub_subcategory')->latest()->first();
        
        // return $b;
        
        if($b->subcategory == 'Lingerie & Sleepwear')
        {
            $size = DB::table('sizes')->where('id',5)->latest()->get();
        }
        else if($a->category == 'Kids')
        {
            $size = DB::table('sizes')->where('id',2)->latest()->get();
        }
        else if($b->subcategory == 'Bottom Wear')
        {
            $size = DB::table('sizes')->where('id',3)->latest()->get();
        }
        else if($b->subcategory == 'Footwear')
        {
            $size = DB::table('sizes')->where('id',4)->latest()->get();
        }
        else
        {
            $size = DB::table('sizes')->where('id',1)->latest()->get();
        }
        
        $cat = $a->category;
        $subcat = $b->subcategory;
        
        if($c == Null)
        {
            $subsubcat = 'NA';
        }
        else
        {
            $subsubcat = $c->sub_subcategory;
        }
        
        
        $colors = DB::table('colors')->where('level','1')->get(); // Fetch all colors from the database

    //   return Auth::user()->id;
       if(Auth::user()->id == 28)
       {
           return view('product.create', compact('parentid','brand_cnt','attr', 'cat', 'subcat', 'subsubcat', 'cat_id', 'subcat_id', 'subsubcat_id','colors','size'));
       }
       else
       {
           return view('product.create', compact('parentid','brand_cnt','attr', 'cat', 'subcat', 'subsubcat', 'cat_id', 'subcat_id', 'subsubcat_id','colors','size'));
       }
        
       

    }
    
    public function getSubcategories($id)
    {
        $subcategories = Category::where('parent_id', $id)->get();
        return response()->json($subcategories);
    }
    
    public function getSubSubcategories($id)
    {
        $subsubcategories = Category::where('parent_id', $id)->get();
    
        // Debugging: Check if data is returned
        if ($subsubcategories->isEmpty()) {
            return response()->json(['message' => 'No Sub-Subcategories Found']);
        }
    
        return response()->json($subsubcategories);
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

    public function store(Request $request)
    {
        


    $pids = DB::table('products')
        ->whereNotNull('parent_id')
        ->where('seller_user_id', Auth::id())
        ->pluck('parent_id')
        ->toArray();
    
    if (!in_array($request->parent_id, $pids)) {
        // Get the most recent product
        $lastProduct = DB::table('products')
            ->where('seller_user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->first();
    
        // Determine the next auto-incremented number
        $nextNumber = $lastProduct ? ((int) str_replace('OBD-' . $request->seller_id . '-' . $request->parent_id . '-', '', $lastProduct->product_id) + 1) : 1000;
    
        // Generate unique product ID
        $parent_id = 'OBD-' . $request->seller_id . '-' . $request->parent_id;
    }
    else
    {
        $parent_id = $request->parent_id;
    }
    
    // return $parent_id;
    if ($request->brand_id == null) {
        // Case 1: brand_id is null
        // Get the most recent product with the given seller_id
        $lastProduct = DB::table('products')
            ->where('seller_user_id', $request->seller_id)
            ->orderBy('id', 'desc')
            ->first();
    
        // Determine the next auto-incremented number
        $nextNumber = $lastProduct ? ((int) str_replace('OBD-' . $request->seller_id . '-', '', $lastProduct->product_id) + 1) : 1001;
    
        // Generate unique product ID
        $product_id = 'OBD-' . $request->seller_id . '-' . $nextNumber;
    } else {
        // Case 2: brand_id is not null
        // Get the most recent product with the given brand_id
        $lastProduct = DB::table('products')
            ->where('brand_id', $request->brand_id)
            ->orderBy('id', 'desc')
            ->first();
    
        // Determine the next auto-incremented number
        $nextNumber = $lastProduct ? ((int) str_replace('OBD-' . $request->brand_id . '-', '', $lastProduct->product_id) + 1) : 1001;
    
        // Generate unique product ID
        $product_id = 'OBD-' . $request->brand_id . '-' . $nextNumber;
    }



    foreach(json_decode($request->stock_quantity) as $sqty)
    {
        
        //return  $sqty->maximum_retail_price;
    $data = [
        'category_id' => $request->input('category_id'),
        'subcategory_id' => $request->input('subcategory_id'),
        'sub_subcategory_id' => $request->input('sub_subcategory_id'),
        'product_name' => $request->input('product_name'),
        'product_id' => $product_id, // Auto-generated
        'seller_user_id' => Auth::user()->id,
        'parent_id' => $parent_id,
        'brand_id' => $request->input('brand_id'),
        'description' => $request->input('description'),
        'size_name' => $sqty->size,
        'stock_quantity' => $sqty->quantity,
        // 'size_id' => $request->input('size_id'),
        // 'size_name' => $request->input('size_name'),
        'color_name' => $request->input('color_name'),
        'fabric' => $request->input('fabric'),
        'occasion' => $request->input('occasion'),
        'care_instructions' => $request->input('care_instructions'),
        // 'images' => $imagePathsJson, // Store images as JSON
        'video_url' => $request->input('video_url'),
        'seller_id' => $request->input('seller_id'),
        'shipping_time' => $request->input('shipping_time'),
        'return_policy' => $request->input('return_policy'),
        'sku' => $sqty->sku,
        'hsn' => $request->input('hsn'),
        'gst_rate' => $request->input('gst_rate'),
        'procurement_type' => $request->input('procurement_type'),
        'package_weight' => $request->input('package_weight'),
        'package_length' => $request->input('package_length'),
        'package_breadth' => $request->input('package_breadth'),
        'package_height' => $request->input('package_height'),
        'pack_of' => $request->input('pack_of'),
        'country_of_origin' => $request->input('country_of_origin'),
        'manufacturer_details' => $request->input('manufacturer_details'),
        'packer_details' => $request->input('packer_details'),
        'size_chart_id' => $request->input('size_chart_id'),
        'listing_status' => $request->input('listing_status'),
        'maximum_retail_price' => $sqty->maximum_retail_price,
        'bank_settlement_price' => $sqty->bank_settlement_price,
        'portal_updated_price' => $sqty->portal_updated_price,
        'alt_text' => $request->input('alt_text'),
        'pattern' => $request->input('pattern'),
        'fit_type' => $request->input('fit_type'),
        'added_by' => Auth::id(),
        
        'saree_length' => $request->input('saree_length'),
        'blouse_fabric' => $request->input('blouse_fabric'),
        'blouse_piece_included' => $request->input('blouse_piece_included'),
        'blouse_length' => $request->input('blouse_length'),
        'blouse_stiched' => $request->input('blouse_stitched'),
        'work_details' => $request->input('work_details'),
        'border_type' => $request->input('border_type'),
        'weave_type' => $request->input('weave_type'),
        'pattern' => $request->input('pattern'),
        
        'gown_type' => $request->input('gown_type'),
        'sleeve_length' => $request->input('sleeve_length'),
        'sleeve_pattern' => $request->input('sleeve_pattern'),
        'neck_style' => $request->input('neck_style'),
        'closure_type' => $request->input('closure_type'),
        'embellishment_details' => $request->input('embellishment_details'),
        'lining_present' => $request->input('lining_present'),
        
        'top_type' => $request->input('top_type'),
        'hemline' => $request->input('hemline'),
        'sleeve_pattern_top' => $request->input('sleeve_pattern_top'),
        'sleeve_length_top' => $request->input('sleeve_length_top'),
        'neck_style_top' => $request->input('neck_style_top'),
        'transparency_level' => $request->input('transparency_level'),
        
        'set_type' => $request->input('set_type'),
        'bottom_included' => $request->input('bottom_included'),
        'bottom_type' => $request->input('bottom_type'),
        'sleeve_pattern_bottom' => $request->input('sleeve_pattern_bottom'),
        'dupatta_fabric' => $request->input('dupatta_fabric'),
        'dupatta_length' => $request->input('dupatta_length'),
        
        'dupatta_shawl_type' => $request->input('dupatta_shawl_type'),
        'length' => $request->input('length'),
        'work_details_dupatta' => $request->input('work_details_dupatta'),
        'border_type_dupatta' => $request->input('border_type_dupatta'),
        
        'lehenga_type' => $request->input('lehenga_type'),
        'lehenga_length' => $request->input('lehenga_length'),
        'choli_included' => $request->input('choli_included'),
        'choli_length' => $request->input('choli_length'),
        'choli_sleeve_length' => $request->input('choli_sleeve_length'),
        'dupatta_included' => $request->input('dupatta_included'),
        'dupatta_length_lehenga' => $request->input('dupatta_length_lehenga'),
        'work_details_lehenga' => $request->input('work_details_lehenga'),
        'flare_type' => $request->input('flare_type'),

        'created_at' => now(),
        'updated_at' => now()
    ];
        $filepath = 'uploads/products/';

    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($filepath, $filename, 'public'); // Saves in storage/app/public/uploads/products
            $imagePaths[] = asset('storage/' . $path); // Store full URL path
        }
    }
    
    // Store full image paths in JSON format
    $data['images'] = json_encode($imagePaths);
    
    // Insert data into the database
    DB::table('products')->insert($data);
    
    }

    // Prepare the data for insertion



        
     // Handle multiple image uploads
    //   return $request->images;
       


    return redirect()->back()->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $seller_id = DB::table('sellers')->where('user_table_id', Auth::user()->id)->latest()->first();
        $parentid = DB::table('products')->where('seller_id',$seller_id->seller_id)->whereNotNull('parent_id')->latest()->get();
        
        $brand_cnt = DB::table('brands')->where('seller_id',$seller_id->seller_id)->count();
        
        $attr = DB::table('attributes')->latest()->get();
        
        $cat_id = $product->category_id; 
        $subcat_id = $product->subcategory_id; 
        $subsubcat_id = $product->sub_subcategory_id; 
         
        $a = DB::table('categories')->where('id', $product->category_id )->select('category')->latest()->first();
        $b = DB::table('categories')->where('id', $product->subcategory_id )->select('subcategory')->latest()->first();
        $c = DB::table('categories')->where('id', $product->sub_subcategory_id )->select('sub_subcategory')->latest()->first();
        
        $cat = $a->category;
        $subcat = $b->subcategory;
        $subsubcat = $c->sub_subcategory;
        
        
        if($b == 'Lingerie & Sleepwear')
        {
            $size = DB::table('sizes')->where('id',5)->latest()->get();
        }
        else if($a == 'Kids')
        {
            $size = DB::table('sizes')->where('id',2)->latest()->get();
        }
        else if($b == 'Bottom Wear')
        {
            $size = DB::table('sizes')->where('id',3)->latest()->get();
        }
        else if($b == 'Footwear')
        {
            $size = DB::table('sizes')->where('id',4)->latest()->get();
        }
        else
        {
            $size = DB::table('sizes')->where('id',1)->latest()->get();
        }
        
        $colors = DB::table('colors')->where('level','1')->get(); // Fetch all colors from the database
        
        // return $product;
        
        return view('product.edit', compact('product', 'seller_id', 'attr', 'parentid','brand_cnt', 'cat', 'subcat', 'subsubcat', 'cat_id', 'subcat_id', 'subsubcat_id','colors','size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
        $product = Product::findOrFail($id);
    
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_id' => 'required',
            'parent_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required|string',
            'stock_quantity' => 'required',
            'size_id' => 'required',
            'size_name' => 'required',
            'color_name' => 'required',
            'fabric' => 'required',
            'occasion' => 'required',
            'care_instructions' => 'required',
            'images' => 'required|json',
            'video_url' => 'required',
            'seller_id' => 'required',
            'shipping_time' => 'required',
            'return_policy' => 'required',
            'SKU' => 'required',
            'HSN' => 'required',
            'GST_Rate' => 'required',
            'Procurement_type' => 'required',
            'package_weight' => 'required',
            'package_length' => 'required',
            'package_breadth' => 'required',
            'package_height' => 'required',
            'pack_of' => 'required',
            'country_of_origin' => 'required',
            'manufacturer_details' => 'required',
            'packer_details' => 'required',
            'size_chart_id' => 'required',
            'listing_status' => 'required',
            'maximum_retail_price' => 'required|numeric',
            'bank_settlement_price' => 'required|numeric',
            'portal_updated_price' => 'required|numeric',
            'alt_text' => 'required|string|max:500',
            'pattern' => 'required',
            'fit_type' => 'required',
            'added_by' => 'nullable',
    
            // Nullable fields
            'saree_length' => 'nullable|numeric',
            'blouse_fabric' => 'nullable',
            'blouse_piece_included' => 'nullable',
            'blouse_length' => 'nullable|numeric',
            'blouse_stitched' => 'nullable',
            'work_details' => 'nullable',
            'border_type' => 'nullable',
            'weave_type' => 'nullable',
            'pattern_id' => 'nullable',
            'gown_type' => 'nullable',
            'sleeve_length' => 'nullable',
            'sleeve_pattern' => 'nullable',
            'neck_style' => 'nullable',
            'closure_type' => 'nullable',
            'embellishment_details' => 'nullable',
            'lining_present' => 'nullable',
            'top_type' => 'nullable',
            'hemline' => 'nullable',
            'sleeve_pattern_top' => 'nullable',
            'sleeve_length_top' => 'nullable',
            'neck_style_top' => 'nullable',
            'transparency_level' => 'nullable',
            'set_type' => 'nullable|json',
            'bottom_included' => 'nullable',
            'bottom_type' => 'nullable',
            'sleeve_pattern_bottom' => 'nullable',
            'dupatta_fabric' => 'nullable',
            'dupatta_length' => 'nullable|numeric',
            'dupatta_shawl_type' => 'nullable|json',
            'length' => 'nullable|numeric',
            'work_details_dupatta' => 'nullable',
            'border_type_dupatta' => 'nullable',
            'lehenga_type' => 'nullable',
            'lehenga_length' => 'nullable|numeric',
            'choli_included' => 'nullable',
            'choli_length' => 'nullable|numeric',
            'choli_sleeve_length' => 'nullable',
            'dupatta_included' => 'nullable',
            'dupatta_length_lehenga' => 'nullable|numeric',
            'work_details_lehenga' => 'nullable',
            'flare_type' => 'nullable',
        ]);
    
        $product->update($validatedData);
    
        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
