<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_status;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        return view('client.home');
    }
}
