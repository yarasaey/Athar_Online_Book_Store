<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
   
    public function addToCart(Request $request)
{
    $product = Product::findOrFail($request->product_id);
    $quantity = max(1, (int)$request->quantity);
//session for storing products
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += $quantity;
    } else {
        $cart[$product->id] = [
            "title" => $product->title,
            "price" => $product->price,
            "photo" => $product->photo,
            "quantity" => $quantity,
        ];
    }

    session()->put('cart', $cart);

    if ($request->expectsJson()) {  
    return response()->json([
        'cart_count' => array_sum(array_column($cart, 'quantity')),
        'message' => 'تمت إضافة المنتج إلى السلة'
    ]);
}

    return redirect()->back()->with('success', 'Product added to cart!');
}

public function remove($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'تم حذف المنتج من السلة.');
    }

    return redirect()->back()->with('error', 'المنتج غير موجود في السلة.');
}
public function checkout(){
   
    return view('front.products.checkout');
}

public function processCheckout(Request $request)
{
    $validator = Validator::make($request->all(), [
        'first_name'    => 'required|string|max:255|min:3',
        'last_name'     => 'required|string|max:255',
        'city'          => 'required|string|max:100',
        'address'       => 'required|string|max:255',
        'mobile'        => 'required|string|max:20',
        'email'         => 'nullable|email|max:255',
        'notes'         => 'nullable|string',
        'subtotal'      => 'nullable|numeric',
        'shipping'      => 'nullable|numeric',
        'coupon_code'   => 'nullable|string|max:50',
    ], [
        // رسائل مخصصة
        'first_name.required'  => 'الاسم الأول مطلوب.',
        'first_name.min'       => 'الاسم الأول يجب أن لا يقل عن 5 أحرف.',
        'last_name.required'   => 'الاسم الأخير مطلوب.',
        'city.required'        => 'المدينة مطلوبة.',
        'address.required'     => 'العنوان مطلوب.',
        'mobile.required'      => 'رقم الهاتف مطلوب.',
        'email.email'          => 'يرجى إدخال بريد إلكتروني صحيح.',
        'subtotal.nullable'    => 'المجموع الفرعي مطلوب.',
        'subtotal.numeric'     => 'المجموع الفرعي يجب أن يكون رقم.',
        'shipping.numeric'     => 'قيمة الشحن يجب أن تكون رقم.',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }
    //save user address 
    $user = Auth::guard('website_user')->user();
    if (!$user) {
    return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً لإتمام الطلب.');
}
    CustomerAddress::updateOrCreate(
        ['user_id' => $user->id],
        [
            'user_id'     => $user->id,
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'email'       => $request->email,
            'mobile'      => $request->mobile,
            'address'     => $request->address,
            'city'        => $request->city,
        ]
    );
    //store data in order table
    $cart = session('cart', []);
    if (empty($cart)) {
    return redirect()->back()->with('error', 'سلة المشتريات فارغة.');}

  $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $subtotal = $request->subtotal ?? $total;
    $shipping = $request->shipping ?? 0;
    $discount = $request->discount ?? 0;
    $grandTotal = $subtotal + $shipping - $discount;

    $order = new Order;
    $order->user_id     = $user->id;
    $order->subtotal    = $subtotal;
    $order->shipping    = $shipping;
    $order->discount    = $discount;
    $order->coupon_code = $request->coupon_code;
    $order->grand_total = $grandTotal;
    $order->first_name  = $request->first_name;
    $order->last_name   = $request->last_name;
    $order->email       = $request->email;
    $order->mobile      = $request->mobile;
    $order->address     = $request->address;
    $order->apartment   = $request->apartment;
    $order->city        = $request->city;
    $order->state       = $request->state;
    $order->zip         = $request->zip;
    $order->notes       = $request->notes;
    $order->save();

    foreach ($cart as $productId => $item) {
        $orderItem = new OrderItem;
        $orderItem->user_id    = $user->id;
        $orderItem->order_id   = $order->id; // مهم جدًا
        $orderItem->product_id = $productId;
        $orderItem->name       = $item['title'];
        $orderItem->qty        = $item['quantity'];
        $orderItem->price      = $item['price'];
        $orderItem->total      = $item['price'] * $item['quantity'];
        $orderItem->save();
    }

    session()->forget('cart');


return redirect()->route('checkout.success', ['id' => $order->id])->with('success', 'تم تأكيد الطلب بنجاح!');

}

  
    
 public function orderRecieved($id){
    $order = Order::with('orderItems')->findOrFail($id);
    
    return view('front.products.order-recieved', compact('order'));
 }
 public function trackOrder()
{
    $user = Auth::guard('website_user')->user();
    

    if (!$user) {
        return redirect()->route('login')->with('error', 'يجب تسجيل الدخول لتتبع الطلب.');
    }

    $order = Order::with('orderItems')
                  ->where('user_id', $user->id)
                  ->latest()
                  ->first();

    if (!$order) {
        return view('front.products.track-order-empty');
    }

    return view('front.products.track-order', compact('order'));
}
}
 
