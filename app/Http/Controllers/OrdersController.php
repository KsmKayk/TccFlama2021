<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.orders.index');
    }
}