<?php

namespace App\SOLID\Sales\HTML;
use App\SOLID\Sales\Interfaces\SalesInterface;


class SalesOutput2 implements SalesInterface
{
    public function output($sales)
    {
        return '<h1 style="color:red;">Sales: $' . $sales . '</h1>';
    }
}
