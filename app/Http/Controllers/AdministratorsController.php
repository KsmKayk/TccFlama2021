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

    public function showEditAdm(Request $request)
    {
        $adm = Administrator::findOrFail($request->id);
        $users = User::all();
        return view('admin.administrators.edit', compact('adm', 'users'));
    }

    public function editAdm(Request $request)
    {
        $adm = Administrator::find($request->id);
        $adm->user_id = $request->user_id;
        $adm->save();

        return redirect('admin/administrators');
    }

    public function showNewAdm(Request $request)
    {
        $users = User::all();
        return view('admin.administrators.add', compact('users'));
    }
    public function addNewAdm(Request $request)
    {
        $adm = Administrator::find($request->user_id);
        if (!$adm) {
            Administrator::create([
                'user_id' => $request->user_id
            ]);
        }

        return redirect('admin/administrators');
    }

    public function delAdm(Request $request)
    {
        $adm = Administrator::findOrFail($request->id);
        $adm->delete();
        return redirect('admin/administrators');
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
