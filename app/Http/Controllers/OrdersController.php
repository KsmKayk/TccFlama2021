<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder(Request $request)
    {
        $order = Order::find($request->id);
        return view('admin.orders.show', compact('order'));
    }
    public function showEditOrder(Request $request)
    {
        $order = Order::find($request->id);
        $statuses = Order_status::all();
        return view('admin.orders.edit', compact('order', 'statuses'));
    }
    public function editOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->status_id = $request->status_id;
        $order->save();
        return redirect('admin/orders');
    }
}
