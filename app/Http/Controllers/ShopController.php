<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function showProducts(Request $request)
    {
        $products = Product::latest()->take(10)->get();
      
      

        return view('front.products.products', compact('products'));
        
    }
    public function productsByCategory($id)
{
    $category = Category::with('products')->findOrFail($id);

    return view('front.products.by-category', compact('category'));
}
 
    //fetch product about the category
//     $categories=Category::orderBy('name','ASC')->get();
// public function index(Request $request, $category = null)
// {
//     $products = Product::query();

//     if ($category) {
//         $categoryModel = Category::where('slug', $category)->first();
//         if ($categoryModel) {
//             $products->where('category_id', $categoryModel->id);
//         }
//     }

//     $products = $products->latest()->paginate(12);

//     return view('shop.index', [
//         'products' => $products,
//         'activeCategory' => $category
//     ]);
// }

    public function show($id){
    $product = Product::findOrFail($id);
    return view('front.products.single', compact('product'));
//      public function addToCart(Request $request, $id)
//  {
//     $product = Product::findOrFail($id);  
//     $cartItem = [
//         'id' => $product->id,
//        'title' => $product->title,
//       'price' => $product->price,
//       'quantity' => 1, 
//      'photo' => $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg'),
//     ];

//    $cart = session()->get('cart', []);
//    if (isset($cart[$id])) {
//          $cart[$id]['quantity']++;
//   } else {
        
//        $cart[$id] = $cartItem;
//   }
//    session()->put('cart', $cart);

//     return redirect()->back()->with('success', 'تم إضافة المنتج إلى العربة');
//  }

// }

}










}
