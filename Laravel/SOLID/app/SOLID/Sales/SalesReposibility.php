<?php

namespace App\SOLID\Sales;

use Illuminate\Support\Facades\DB;

class SalesReposibility
{
    public function between($startDate, $endDate)
    {
        return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('change') / 100;
    }

}
