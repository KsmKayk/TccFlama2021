<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetMoneyEarnedInThisYearService extends ServiceProvider
{
    public function getMoneyEarned(array $orders)
    {
        if (count($orders) == 0) {
            return 0;
        }

        $moneyEarned = 0;

        foreach ($orders as $order) {
        }

        return 0;
    }
}
