<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest('id')->paginate(10);

        if($request->get('keyword')) {
            $products = $products->where('name','like','%'.$request->keyword.'%');
        }

        return view('admin.products.list', compact('products'));
    }
//     public function index(Request $request)
// {
//     $query = Product::latest('id'); // نبدأ بالـ query

//    if ($request->filled('search')) {
//     $query->where('name', 'like', '%' . $request->search . '%');
//    }

//     $products = $query->paginate(10); // نعمل paginate بعد ما نخلص الشروط

//     return view('admin.products.list', compact('products'));
// }


    public function create()
    {
        $data = [];
        $categories = Category::orderBy('name', 'ASC')->get();
        $authors = Authors::orderBy('name', 'ASC')->get();
        
        $data['categories'] = $categories;
        $data['authors'] = $authors;
        
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        // 1) قواعد التحقق
        $rules = [
            'title'       => 'required',
            'price'       => 'required|numeric',
            'sku'         => 'required',
            'track_qty'   => 'required|in:Yes,No',
            'category'    => 'required|numeric',
            'author_id'   => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($request->track_qty === 'Yes') {
            $rules['qty'] = 'required|numeric';
        }

        // 2) الرسائل المخصصة للأخطاء
        $messages = [
            'title.required' => 'The product title is required.',
            'price.required' => 'Please enter the product price.',
            'price.numeric'  => 'Price must be a valid number.',
            'sku.required'   => 'SKU is required.',
            'track_qty.required' => 'Please specify if you want to track quantity.',
            'track_qty.in'   => 'Track quantity must be either Yes or No.',
            'qty.required'   => 'Please enter the quantity.',
            'qty.numeric'    => 'Quantity must be a number.',
            'category.required' => 'Please select a category.',
            'category.numeric'  => 'Category must be valid.',
            'author_id.required' => 'Please select an author.',
            'author_id.numeric'  => 'Author must be valid.',
            'is_featured.required' => 'Please specify if this is a featured product.',
            'is_featured.in' => 'Featured must be either Yes or No.',
            'photo.image' => 'Photo must be an image file (jpeg, png, jpg, gif).',
            'photo.max' => 'Photo size must not exceed 2MB.',
        ];

        // 3) التحقق من المدخلات
        $validator = Validator::make($request->all(), $rules, $messages);

        // 4) إذا فشل الـ validation نرجع بأخطاء
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 5) إنشاء المنتج
        $product = new Product();
        $product->title         = $request->title;
        $product->slug          = Str::slug($request->title);
        $product->description   = $request->description;
        $product->price         = $request->price;
        $product->compare_price = $request->compare_price;
        $product->sku           = $request->sku;
        $product->barcode       = $request->barcode;
        $product->track_qty     = $request->track_qty;
        $product->qty           = $request->qty ?? 0;
        $product->status        = $request->status;
        $product->category_id   = $request->category;
        $product->author_id     = $request->author_id;
        $product->is_featured   = $request->is_featured;

        // 6) رفع الصورة إذا موجودة
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('products', 'public');
            $product->photo = $imagePath;
        }

        // 7) حفظ المنتج في قاعدة البيانات
        $product->save();

        // 8) إعادة التوجيه مع رسالة نجاح
        return redirect()
            ->route('product.index')
            ->with('success', 'Product created successfully');
    }
    public function uploadPhoto(Request $request)
{
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('products/temp', $filename, 'public');

        return response()->json(['path' => $path, 'filename' => $filename]);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::orderBy('name', 'ASC')->get();
    $authors = Authors::orderBy('name', 'ASC')->get();

    return view('admin.products.edit', compact('product', 'categories', 'authors'));
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validation rules
    $rules = [
        'title'       => 'required',
        'price'       => 'required|numeric',
        'sku'         => 'required',
        'track_qty'   => 'required|in:Yes,No',
        'category'    => 'required|numeric',
        'author_id'   => 'required|numeric',
        'is_featured' => 'required|in:Yes,No',
        'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'uploaded_photo' => 'nullable|string'
    ];

    if ($request->track_qty === 'Yes') {
        $rules['qty'] = 'required|numeric';
    }

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Update product fields
    $product->title         = $request->title;
    $product->slug          = Str::slug($request->title);
    $product->description   = $request->description;
    $product->price         = $request->price;
    $product->compare_price = $request->compare_price;
    $product->sku           = $request->sku;
    $product->barcode       = $request->barcode;
    $product->track_qty     = $request->track_qty;
    $product->qty           = $request->qty ?? 0;
    $product->status        = $request->status;
    $product->category_id   = $request->category;
    $product->author_id     = $request->author_id;
    $product->is_featured   = $request->is_featured;

    // Handle file upload if done directly from input
    if ($request->hasFile('photo')) {
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        $imagePath = $request->file('photo')->store('products/main', 'public');
        $product->photo = $imagePath;
    }

    // Handle pre-uploaded temp photo
    elseif ($request->filled('uploaded_photo')) {
        $oldPath = $request->input('uploaded_photo'); // e.g. products/temp/123_image.jpg
        $filename = basename($oldPath);
        $newPath = 'products/main/' . $filename;

        if (Storage::disk('public')->exists($oldPath)) {
            // Delete previous photo if exists
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }

            Storage::disk('public')->move($oldPath, $newPath);
            $product->photo = $newPath;
        }
    }

    $product->save();

    return redirect()
        ->route('product.index')
        ->with('success', 'Product updated successfully.');
}
public function destroy($id)
{
    $product = Product::findOrFail($id);

    
    if ($product->photo && Storage::disk('public')->exists($product->photo)) {
        Storage::disk('public')->delete($product->photo);
    }

    
    $product->delete();

    
    return redirect()->route('product.index')
        ->with('success', 'Product deleted successfully.');
}


}

    
       // return redirect()->back()->withErrors($validator)->withInput();
    
    


   

