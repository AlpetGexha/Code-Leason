<?php

namespace App\SOLID\Sales\HTML;

use App\SOLID\Sales\Interfaces\SalesInterface;

class SalesOutput implements SalesInterface
{
    public function output($sales)
    {
        return '<h1>Sales: $' . $sales . '</h1>';
    }
}
