<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();
        dd($orders[0]->OrderStatus);
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder(Request $request)
    {
    }
    public function showEditOrder(Request $request)
    {
    }
    public function editOrder(Request $request)
    {
    }
}
