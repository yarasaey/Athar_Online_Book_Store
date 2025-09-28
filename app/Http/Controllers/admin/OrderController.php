<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;


class OrderController extends Controller
{
   public function index(Request $request)
{
    $orders = Order::with('user')->latest();

    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $orders = $orders->whereHas('user', function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%");
        });
    }

    $orders = $orders->paginate(10);

    return view('admin.orders.list', compact('orders'));
}

    public function detail($orderId){
        $order=Order::where('id',$orderId)->first();
        $orderItems=OrderItem::where('order_id',$orderId)->get();
return view('admin.orders.detail',['order'=>$order,
'orders_items'=>$orderItems
]);}
// public function update(Request $request){   
        
//     $order = Order::find($request->order_id);
//     $order->status = $request->order_status;
//     if($request->order_status=='delivered')
//     {
//         $order->delivered_date = Carbon::now();
//     }
//     else if($request->order_status=='canceled')
//     {
//         $order->canceled_date = Carbon::now();
//     }        
//     $order->save();
//     // if($request->order_status=='delivered')
//     // {
//     //     $transaction = Transaction::where('order_id',$request->order_id)->first();
//     //     $transaction->status = "approved";
//     //     $transaction->save();
//     // }
//     if($request->order_status == 'delivered') {
//     $transaction = Transaction::where('order_id', $request->order_id)->first();

//     if ($transaction) {
//         $transaction->status = "approved";
//     } else {
//         $transaction = new Transaction();
//         $transaction->order_id = $request->order_id;
//         $transaction->status = "approved";
//          $transaction->save();
//           return back()->with("status", "Status changed successfully!");
//     }
    
// }
public function update(Request $request)
{
    $order = Order::find($request->order_id);
    $order->status = $request->order_status;

    if ($request->order_status == 'delivered') {
        $order->delivered_date = Carbon::now();
    } elseif ($request->order_status == 'canceled') {
        $order->canceled_date = Carbon::now();
    }

    $order->save();

    if ($request->order_status == 'delivered') {
        $transaction = Transaction::where('order_id', $request->order_id)->first();

        if ($transaction) {
            $transaction->status = "approved";
        } else {
            $transaction = new Transaction();
            $transaction->order_id = $request->order_id;
            $transaction->status = "approved";
        }

        $transaction->save();
    }

    return back()->with("status", "Status changed successfully!");
}

        
        
   
    
}
