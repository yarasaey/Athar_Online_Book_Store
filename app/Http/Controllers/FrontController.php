<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;


class FrontController extends Controller
{
    
    public function index(Request $request){
         $products = Product::latest()->take(10)->get(); 
   
        $categories = Category::with('products')->get(); 
        
                       
                        
        return view('front.home', compact('products', 'categories'));
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
 public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|min:3|max:255',
            'phone'   => 'required|string|min:6|max:20',
            'email'   => 'required|email|max:255',
            'reason'  => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required'    => 'الاسم مطلوب.',
            'phone.required'   => 'رقم الهاتف مطلوب.',
            'email.required'   => 'البريد الإلكتروني مطلوب.',
            'reason.required'  => 'سبب التواصل مطلوب.',
            'message.required' => 'نص الرسالة مطلوب.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Contact::create([
        'name'    => $request->name,
        'phone'   => $request->phone,
        'email'   => $request->email,
        'reason'  => $request->reason,
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح. سنقوم بالتواصل معك في أقرب وقت.');
}
    
public function ShowProductsCategory(){
    $category = Category::with('products')->findOrFail($id);
    return view('front.products.by-category', compact('category'));

}


}
