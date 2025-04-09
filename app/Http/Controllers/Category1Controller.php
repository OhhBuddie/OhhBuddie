<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Category1Controller extends Controller
{
    public function index($id)
    {
       $category = Crypt::decryptString(urldecode($id));
       $sort = request()->get('sort');
      
    
                  
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

            if($category == 'Saree')
            {
                $subcat = [40];  
            }
            if($category == 'Dresses')
            {
                $subcat =[50];
            }
            if($category == 'Jeans')
            {
                $subcat =[18,60];
            }
            if($category == 'Kurti')
            {
                $subcat = [42];
            }
            if($category == 'Housecoat')
            {
                $psubcat=[82];
            }
            if($category == 'Trousers')
            {
                $subcat = [19,61];
            }
            if($category == 'T-Shirt')
            {
                $subcat = [3,48];
            }
            if($category == 'Shoes')
            {
                $subcat = [25, 26,27,28,71,72,73];
            }
            if($category == 'Nighty')
            {
                $subcat =[84];
    
            }
            
        }
        
        
        if(is_null($sort))
        {
            $products = DB::table('products')
            ->whereIn('sub_subcategory_id', $subcat)
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
        elseif($sort == 'price_low_high')
        {
            $products = DB::table('products')
            ->whereIn('sub_subcategory_id', $subcat)
             ->whereNotNull('product_name')
            ->whereNotNull('product_name')
            ->orderBy('portal_updated_price', 'asc') // Sorting latest first
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
        elseif($sort == 'latest')
        {
            $products = DB::table('products')
            ->whereIn('sub_subcategory_id', $subcat)
             ->whereNotNull('product_name')
            ->whereNotNull('product_name')
            ->orderBy('created_at', 'desc') // Sorting latest first
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
        else
        {
            $products = DB::table('products')
            ->whereIn('sub_subcategory_id', $subcat)
             ->whereNotNull('product_name')
            ->whereNotNull('product_name')
            ->orderBy('portal_updated_price', 'desc') // Sorting latest first
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
        
        // return $products;

   

        $product_size = DB::table('products')
            ->select('size_name')
            ->whereIn('sub_subcategory_id', [25, 26, 27, 28, 71, 72, 73])
            ->whereNotNull('product_name')
            ->distinct()
            ->orderByRaw('CAST(size_name AS UNSIGNED) ASC')
            ->get();
            

        return view('category.index1', compact('category', 'products', 'product_size', 'sort'));
    }

    public function index1($id)
    {
        $category = Crypt::decryptString(urldecode($id));

        $groupProducts = function ($query) {
            return $query->whereNotNull('product_name')
                ->orderByDesc('id')
                ->get()
                ->groupBy('parent_id')
                ->map(function ($group) {
                    return $group->groupBy('color_name')->map(function ($colorGroup) {
                        return $colorGroup->first();
                    })->values();
                })->flatten();
        };

        if (is_numeric($category)) {
            $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', $category));
        } else {
            switch ($category) {
                case 'Saree':
                    $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', 40));
                    break;
                case 'Dresses':
                    $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', 50));
                    break;
                case 'Jeans':
                    $products = DB::table('products')->whereIn('sub_subcategory_id', [18, 60])
                        ->whereNotNull('product_name')
                        ->latest()
                        ->get();
                    break;
                case 'Kurti':
                    $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', 42));
                    break;
                case 'Housecoat':
                    $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', 82));
                    break;
                case 'Trousers':
                    $products = $groupProducts(DB::table('products')->whereIn('sub_subcategory_id', [19, 61]));
                    break;
                case 'T-Shirt':
                    $products = $groupProducts(DB::table('products')->whereIn('sub_subcategory_id', [3, 48]));
                    break;
                case 'Shoes':
                    $products = $groupProducts(DB::table('products')->whereIn('sub_subcategory_id', [25, 26, 27, 28, 71, 72, 73]));
                    break;
                case 'Nighty':
                    $products = $groupProducts(DB::table('products')->where('sub_subcategory_id', 84));
                    break;
                default:
                    $products = collect();
            }
        }

        $product_size = DB::table('products')
            ->select('size_name')
            ->whereIn('sub_subcategory_id', [25, 26, 27, 28, 71, 72, 73])
            ->whereNotNull('product_name')
            ->distinct()
            ->orderByRaw('CAST(size_name AS UNSIGNED) ASC')
            ->get();

        return view('category.index', compact('category', 'products', 'product_size'));
    }

    // Other CRUD methods remain unchanged below:

    public function create() {}
    public function store(Request $request) {}
    public function show(Category $category) {}
    public function edit(Category $category) {}
    public function update(Request $request, Category $category) {}
    public function destroy(Category $category) {}

    public function showCategory($id, Request $request)
    {
        $query = DB::table('products')->where('category_id', $id);

        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'priceHighToLow':
                    $query->orderBy('portal_updated_price', 'desc');
                    break;
                case 'priceLowToHigh':
                    $query->orderBy('portal_updated_price', 'asc');
                    break;
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $products = $query->get();
        // return view('your_view_name', compact('products'));
    }
}