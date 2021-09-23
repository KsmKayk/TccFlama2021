<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Services\GetMoneyEarnedOnYearService;

class AdministratorsController extends Controller
{
    public function index(Request $request)
    {
        $administrators = Administrator::all();
        return view('admin.administrators.index', compact('administrators'));
    }

    public function showDashboard(Request $request, GetMoneyEarnedOnYearService $getMoneyEarnedOnYearService)
    {
        $users = User::all();
        $ordersOnThisMonth = Order::whereMonth('created_at', date('m'))->get();
        $MoneyEarnedOnEachMonth = $getMoneyEarnedOnYearService->getMoneyEarnedOnEachMonth(date('Y'));
        $moneyEarnedOnThisYear = $getMoneyEarnedOnYearService->getMoneyEarnedOnYear(date('Y'));


        return view('admin/home', compact('users', 'ordersOnThisMonth', 'moneyEarnedOnThisYear', 'MoneyEarnedOnEachMonth'));
    }
}
