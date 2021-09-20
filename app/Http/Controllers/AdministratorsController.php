<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Providers\GetMoneyEarnedInThisYearService;

class AdministratorsController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.administrators.index');
    }

    public function showDashboard(Request $request, GetMoneyEarnedInThisYearService $getMoneyEarnedInThisYearService)
    {
        $users = User::all();
        $ordersOnThisMonth = Order::whereMonth('created_at', date('m'))->get();
        $ordersOnThisYear = Order::whereYear('created_at', date('Y'))->get();

        //$moneyEarnedOnThisYear = $getMoneyEarnedInThisYearService->getMoneyEarned($ordersOnThisYear);
        //compact('users', 'orders', 'ordersOnThisMonth')

        return view('admin/home');
    }
}
