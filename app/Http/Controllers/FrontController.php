<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{

    public function index(Request $request)
    {
        // $search = $request->input('search');
        //  $products = Product::query()
        //     ->when($search, function ($query, $search) {
        //         $query->where('title', 'like', "%{$search}%"); // search by name
        //     })->take(1)->get();
        $products = Product::latest()->take(10)->get();

        $categories = Category::with('products')->get();
        $results = Product::select(
            'products.id',
            'products.title',
            'authors.name as author_name',
            'authors.name',
            'products.photo',
            'products.price',
            DB::raw('COUNT(orders_items.id) as total_orders')
        )
            ->join('orders_items', 'orders_items.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'orders_items.order_id')
            ->join('authors', 'authors.id', '=', 'products.author_id')
            ->where('orders.status', 'ordered')
            ->groupBy('products.id', 'products.title', 'authors.name', 'products.photo', 'products.price')
            ->orderByDesc('total_orders')
            ->take(10)
            ->get();
        $trends =  Product::withCount(['orderItems as recent_sales' => function ($q) {
            $q->where('created_at', '>=', now()->subDays(7));
        }])
            ->orderByDesc('recent_sales')
            ->take(10)
            ->get();


        // return view('front.home', compact('products', 'categories','search'));
        return view('front.home', compact('products', 'categories', 'results', 'trends'));
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
        ]
       );
     //  $validatedData = $request->validated();

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

    public function ShowProductsCategory($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return view('front.products.by-category', compact('category'));
    }
}
