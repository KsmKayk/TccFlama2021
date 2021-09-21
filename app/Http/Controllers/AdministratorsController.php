<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class AdministratorsController extends Controller
{
    public function index(Request $request)
    {
        $admnistrators = Administrator::all();
        return view('admin.administrators.index', compact('admnistrators'));
    }

    public function showDashboard(Request $request)
    {
        $users = User::all();
        $ordersOnThisMonth = Order::whereMonth('created_at', date('m'))->get();
        $ordersOnThisYear = Order::whereYear('created_at', date('Y'))->get();
        $moneyEarnedOnThisYear = 0;

        if ($ordersOnThisYear->count() > 0) {
            foreach ($ordersOnThisYear as $order) {
                $total = 0;
                $orderItems = $order->orderItems;
                foreach ($orderItems as $orderItem) {
                    $quantity = $orderItem->quantity;
                    $price = round($orderItem->product->price, 2);
                    $total += $quantity * $price;
                }
                $moneyEarnedOnThisYear += $total;
            }
        }

        $ordersJan = Order::whereMonth('created_at', '01')->get();
        $ordersFeb = Order::whereMonth('created_at', '02')->get();
        $ordersMar = Order::whereMonth('created_at', '03')->get();
        $ordersApr = Order::whereMonth('created_at', '04')->get();
        $ordersMay = Order::whereMonth('created_at', '05')->get();
        $ordersJun = Order::whereMonth('created_at', '06')->get();
        $ordersJul = Order::whereMonth('created_at', '07')->get();
        $ordersAgo = Order::whereMonth('created_at', '08')->get();
        $ordersSep = Order::whereMonth('created_at', '09')->get();
        $ordersOct = Order::whereMonth('created_at', '10')->get();
        $ordersNov = Order::whereMonth('created_at', '11')->get();
        $ordersDec = Order::whereMonth('created_at', '12')->get();

        $jan = 0;
        $feb = 0;
        $mar = 0;
        $apr = 0;
        $may = 0;
        $jun = 0;
        $jul = 0;
        $ago = 0;
        $sep = 0;
        $oct = 0;
        $nov = 0;
        $dec = 0;

        foreach ($ordersJan as $order) {
            $price = round($orderItem->product->price, 2);
            $jan += $price;
        };
        foreach ($ordersFeb as $order) {
            $price = round($orderItem->product->price, 2);
            $feb += $price;
        };
        foreach ($ordersMar as $order) {
            $price = round($orderItem->product->price, 2);
            $mar += $price;
        };
        foreach ($ordersApr as $order) {
            $price = round($orderItem->product->price, 2);
            $apr += $price;
        };
        foreach ($ordersMay as $order) {
            $price = round($orderItem->product->price, 2);
            $may += $price;
        };
        foreach ($ordersJun as $order) {
            $price = round($orderItem->product->price, 2);
            $jun += $price;
        };
        foreach ($ordersJul as $order) {
            $price = round($orderItem->product->price, 2);
            $jul += $price;
        };
        foreach ($ordersAgo as $order) {
            $price = round($orderItem->product->price, 2);
            $ago += $price;
        };
        foreach ($ordersSep as $order) {
            $price = round($orderItem->product->price, 2);
            $sep += $price;
        };
        foreach ($ordersOct as $order) {
            $price = round($orderItem->product->price, 2);
            $oct += $price;
        };
        foreach ($ordersNov as $order) {
            $price = round($orderItem->product->price, 2);
            $nov += $price;
        };
        foreach ($ordersDec as $order) {
            $price = round($orderItem->product->price, 2);
            $dec += $price;
        };

        $MoneyEarnedOnEachMonth = [
            $jan,
            $feb,
            $mar,
            $apr,
            $may,
            $jun,
            $jul,
            $ago,
            $sep,
            $oct,
            $nov,
            $dec,
        ];



        return view('admin/home', compact('users', 'ordersOnThisMonth', 'ordersOnThisYear', 'moneyEarnedOnThisYear', 'MoneyEarnedOnEachMonth'));
    }
}
