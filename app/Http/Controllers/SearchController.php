<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query)) {
            return response()->json([
                'categories' => [],
                'products' => []
            ]);
        }
        
        // Search in categories table columns
        $categories = [];
        
        // Search in category column
        $categoryResults = DB::table('categories')
            ->where('category', 'like', '%' . $query . '%')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('id', 'category as name')
            ->get();
            
        foreach ($categoryResults as $category) {
            $categories[] = [
                'id' => Crypt::encrypt($category->id), // Encrypt category ID
                'name' => $category->name
            ];
        }
        
        // Search in subcategory column
        $subcategoryResults = DB::table('categories')
            ->where('subcategory', 'like', '%' . $query . '%')
            ->whereNotNull('subcategory')
            ->where('subcategory', '!=', '')
            ->select('id', 'subcategory as name')
            ->get();
            
        foreach ($subcategoryResults as $subcategory) {
            $categories[] = [
                'id' => Crypt::encrypt($subcategory->id), // Encrypt category ID
                'name' => $subcategory->name
            ];
        }
        
        // Search in sub_subcategory column
        $subSubcategoryResults = DB::table('categories')
            ->where('sub_subcategory', 'like', '%' . $query . '%')
            ->whereNotNull('sub_subcategory')
            ->where('sub_subcategory', '!=', '')
            ->select('id', 'sub_subcategory as name')
            ->get();
            
        foreach ($subSubcategoryResults as $subSubcategory) {
            $categories[] = [
                'id' => Crypt::encrypt($subSubcategory->id), // Encrypt category ID
                'name' => $subSubcategory->name
            ];
        }
        
        // Remove duplicates from categories array
        $categories = collect($categories)->unique('name')->values()->all();
        
        // Search in products table - limit to 5 results
        $productResults = DB::table('products')
            ->where('product_name', 'like', '%' . $query . '%')
            ->select('id', 'product_name')
            ->inRandomOrder() 
            ->limit(5)
            ->get();
            
        $products = [];
        foreach ($productResults as $product) {
            $products[] = [
                'id' => Crypt::encrypt($product->id), // Encrypt product ID
                'product_name' => $product->product_name
            ];
        }
        
        return response()->json([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}