<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $category = Crypt::decryptString(urldecode($id));
        
        // If it contains both digits and letters, extract digits
        if (preg_match('/[a-zA-Z]/', $category) && preg_match('/\d/', $category)) {
            $category = preg_replace('/\D/', '', $category);
        }

        //  return $category;
         
         $sort = request('sort', 'latest'); // Default sorting is 'latest'
         
         $colorFilter = request('color');
                
        if (is_numeric($category)) {

             if($category == 88 || $category == 1)
            {
              $query = DB::table('products')
                ->where('category_id', $category)
                ->whereNotNull('product_name');
            }
            elseif( $category == 89 || $category == 90 || $category == 91 || $category == 92 || $category == 93 || $category == 94 )
            {
              $query = DB::table('products')
                ->where('subcategory_id', $category)
                ->whereNotNull('product_name');
            }
            else
            {
                $query = DB::table('products')
                ->where('sub_subcategory_id', $category)
                ->whereNotNull('product_name');
            }

                if ($colorFilter && is_array($colorFilter)) {
                    $query->whereIn('color_name', $colorFilter);
                }
                    
                // Apply sorting based on the selected option
                if ($sort == 'latest') {
                    $query->orderByDesc('created_at');
                } elseif ($sort == 'price_high_low') {
                    $query->orderByDesc('portal_updated_price');
                } elseif ($sort == 'price_low_high') {
                    $query->orderBy('portal_updated_price');
                } else {
                    $query->orderByDesc('id'); // Default sorting
                }
                
                $products = $query->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten(); 
                    
        } 
        
        else {

            if($category == 'Saree')
            {
                $subcat = [40];  
            }
            elseif($category == 'Dresses')
            {
                $subcat =[50];
            }
            elseif($category == 'Jeans')
            {
                $subcat =[18,60];
            }
            elseif($category == 'Kurti')
            {
                $subcat = [42];
            }
            elseif($category == 'Housecoat')
            {
                $psubcat=[82];
            }
            elseif($category == 'Trousers')
            {
                $subcat = [19,61];
            }
            elseif($category == 'T-Shirt')
            {
                $subcat = [3,48];
            }
            elseif($category == 'Shoes')
            {
                $subcat = [25, 26,27,28,71,72,73];
            }
            elseif($category == 'Nighty')
            {
                $subcat =[84];
            }
            else
            {
                return 'hello';
                $subcat =[$category];
            }
            
            // return $subcat;
              $query = DB::table('products')
                            ->whereIn('sub_subcategory_id', $subcat)
                            ->whereNotNull('product_name');
            
                            if ($colorFilter && is_array($colorFilter)) {
                                $query->whereIn('color_name', $colorFilter);
                            }
                                
                            // Apply sorting based on the selected option
                            if ($sort == 'latest') {
                                $query->orderByDesc('created_at');
                            } elseif ($sort == 'price_high_low') {
                                $query->orderByDesc('portal_updated_price');
                            } elseif ($sort == 'price_low_high') {
                                $query->orderBy('portal_updated_price');
                            } else {
                                $query->orderByDesc('id'); // Default sorting
                            }
                            
                            $products = $query->get()
                                ->groupBy('parent_id')
                                ->map(function ($group) {
                                    return $group->groupBy('color_name')->map(function ($colorGroup) {
                                        // If all sizes are the same or different but parent_id & color_name are same, pick only one
                                        if ($colorGroup->count() > 1) {
                                            return $colorGroup->first(); 
                                        }
                                        return $colorGroup;
                                    })->values();
                                })->flatten(); 
            
        }
        
            
                    


        $product_size = DB::table('products')
            ->select('size_name')
            ->whereIn('sub_subcategory_id', [25, 26, 27, 28, 71, 72, 73])
            ->whereNotNull('product_name')
            ->distinct()
            ->orderByRaw('CAST(size_name AS UNSIGNED) ASC') // Convert to number before sorting
            ->get();


        // return $products;
        return view('category.index',compact('category','products','product_size', 'sort'));
    }


    public function index1($id)
    {
        // return $id;
        $category = Crypt::decryptString(urldecode($id));

                
                
        if (is_numeric($category)) {
            
            $products = DB::table('products')
                ->where('sub_subcategory_id', $category)
                 ->whereNotNull('product_name')
                ->orderByDesc('id') // Sorting latest first
               
                ->get()
                ->groupBy('parent_id')
                ->map(function ($group) {
                    return $group->groupBy('color_name')->map(function ($colorGroup) {
                        // If all sizes are the same or different but parent_id & color_name are same, pick only one
                        if ($colorGroup->count() > 1) {
                            return $colorGroup->first(); 
                        }
                        return $colorGroup;
                    })->values();
                })->flatten();            
        } 
        
        else {

            // return $category;
            if($category == 'Saree')
            {
                $products = DB::table('products')
                    ->where('sub_subcategory_id', 40)
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();       
            }
            if($category == 'Dresses')
            {
                $products = DB::table('products')
                    ->where('sub_subcategory_id', 50)
                     ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();   
    
            }
            if($category == 'Jeans')
            {
                $products = DB::table('products')->whereIn('sub_subcategory_id',[18,60])->whereNotNull('product_name')->latest()->get();
    
            }
            if($category == 'Kurti')
            {
                $products = DB::table('products')
                    ->where('sub_subcategory_id', 42)
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();   
    
            }
            if($category == 'Housecoat')
            {
                $products = DB::table('products')
                    ->where('sub_subcategory_id', 82)
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();   
    
            }
            if($category == 'Trousers')
            {
                $products = DB::table('products')
                    ->whereIn('sub_subcategory_id', [19,61])
                     ->whereNotNull('product_name')
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();
    
            }
            if($category == 'T-Shirt')
            {
                $products = DB::table('products')
                    ->whereIn('sub_subcategory_id', [3,48])
                     ->whereNotNull('product_name')
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();
            }
            if($category == 'Shoes')
            {
                $products = DB::table('products')
                    ->whereIn('sub_subcategory_id', [25, 26,27,28,71,72,73])
                     ->whereNotNull('product_name')
                    ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();
            }
            if($category == 'Nighty')
            {
                $products = DB::table('products')
                    ->where('sub_subcategory_id', 84)
                     ->whereNotNull('product_name')
                    ->orderByDesc('id') // Sorting latest first
                    ->get()
                    ->groupBy('parent_id')
                    ->map(function ($group) {
                        return $group->groupBy('color_name')->map(function ($colorGroup) {
                            // If all sizes are the same or different but parent_id & color_name are same, pick only one
                            if ($colorGroup->count() > 1) {
                                return $colorGroup->first(); 
                            }
                            return $colorGroup;
                        })->values();
                    })->flatten();   
    
            }
            
        }

        $product_size = DB::table('products')
            ->select('size_name')
            ->whereIn('sub_subcategory_id', [25, 26, 27, 28, 71, 72, 73])
            ->whereNotNull('product_name')
            ->distinct()
            ->orderByRaw('CAST(size_name AS UNSIGNED) ASC') // Convert to number before sorting
            ->get();

        return view('category.index',compact('category','products','product_size'));
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    
    
    
    public function showCategory($categoryId, Request $request)
    {
        $query = Product::where('category_id', $categoryId);
    
        // Sorting Logic
        if ($request->has('sort')) {
            if ($request->sort == 'price_low_high') {
                $query->orderBy('portal_updated_price', 'asc');
            } elseif ($request->sort == 'price_high_low') {
                $query->orderBy('portal_updated_price', 'desc');
            } elseif ($request->sort == 'newest') {
                $query->orderBy('created_at', 'desc');
            }
        }
    
        // Filtering Logic
        if ($request->has('size')) {
            $query->where('size', $request->size);
        }
    
        if ($request->has('color')) {
            $query->where('color', $request->color);
        }
    
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('portal_updated_price', [$request->price_min, $request->price_max]);
        }
    
        $products = $query->get();
        
        return view('category', compact('products'));
    }
}
