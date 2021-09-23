<?php

namespace App\Services;

use App\Models\Order;


class GetMoneyEarnedOnYearService
{
    /**
     * Register services.
     *
     * @return void
     */
    public function getMoneyEarnedOnEachMonth(string $y)
    {
        $ordersJan = Order::whereYear('created_at', $y)->whereMonth('created_at', '01')->get();
        $ordersFeb = Order::whereYear('created_at', $y)->whereMonth('created_at', '02')->get();
        $ordersMar = Order::whereYear('created_at', $y)->whereMonth('created_at', '03')->get();
        $ordersApr = Order::whereYear('created_at', $y)->whereMonth('created_at', '04')->get();
        $ordersMay = Order::whereYear('created_at', $y)->whereMonth('created_at', '05')->get();
        $ordersJun = Order::whereYear('created_at', $y)->whereMonth('created_at', '06')->get();
        $ordersJul = Order::whereYear('created_at', $y)->whereMonth('created_at', '07')->get();
        $ordersAgo = Order::whereYear('created_at', $y)->whereMonth('created_at', '08')->get();
        $ordersSep = Order::whereYear('created_at', $y)->whereMonth('created_at', '09')->get();
        $ordersOct = Order::whereYear('created_at', $y)->whereMonth('created_at', '10')->get();
        $ordersNov = Order::whereYear('created_at', $y)->whereMonth('created_at', '11')->get();
        $ordersDec = Order::whereYear('created_at', $y)->whereMonth('created_at', '12')->get();

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
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $jan += $price;
            }
        };
        foreach ($ordersFeb as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $feb += $price;
            }
        };
        foreach ($ordersMar as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $mar += $price;
            }
        };
        foreach ($ordersApr as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $apr += $price;
            }
        };
        foreach ($ordersMay as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $may += $price;
            }
        };
        foreach ($ordersJun as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $jun += $price;
            }
        };
        foreach ($ordersJul as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $jul += $price;
            }
        };
        foreach ($ordersAgo as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $ago += $price;
            }
        };
        foreach ($ordersSep as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $sep += $price;
            }
        };
        foreach ($ordersOct as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $oct += $price;
            }
        };
        foreach ($ordersNov as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $nov += $price;
            }
        };
        foreach ($ordersDec as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $price = round($orderItem->product->price, 2) * round($orderItem->quantity, 2);
                $dec += $price;
            }
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

        return $MoneyEarnedOnEachMonth;
    }

    public function getMoneyEarnedOnYear(string $y)
    {
        $orders = Order::whereYear('created_at', $y)->get();
        $money = 0;

        if ($orders->count() > 0) {
            foreach ($orders as $order) {
                $total = 0;
                $orderItems = $order->orderItems;
                foreach ($orderItems as $orderItem) {
                    $quantity = $orderItem->quantity;
                    $price = round($orderItem->product->price, 2);
                    $total += $quantity * $price;
                }
                $money += $total;
            }
        }


        return $money;
    }
}
