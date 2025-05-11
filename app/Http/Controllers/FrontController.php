<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontController extends Controller
{
    
    public function index(Request $request){
        $products = Product::latest()->take(10)->get(); 
        
        $categories = Category::with('products')->get(); 
     
                       
                        
        return view('front.home',compact('products','categories'));
    }
    public function website(Request $request)
{
    $query = Product::query();

    if ($request->filled('category') && $request->category !== 'الكل') {
        $category = Category::where('slug', $request->category)->first();

        if ($category) {
            $query->where('category_id', $category->id);
        }
        
    }

    $products = $query->paginate(12);
    return view('front.products.index', compact('products'));
}
    public function about()
    {
        return view('front.about');
    }
    public function contact()
{
    return view('front.contact');
}
public function ShowProductsCategory(){
    $category = Category::with('products')->findOrFail($id);
    return view('front.products.by-category', compact('category'));

}


}
