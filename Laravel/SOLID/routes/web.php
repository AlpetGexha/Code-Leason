<?php

use App\SOLID\Sales\HTML\SalesOutput;
use App\SOLID\Sales\HTML\SalesOutput2;
use App\SOLID\Sales\SalesReporter;
use App\SOLID\Sales\SalesReposibility;
use Illuminate\Support\Facades\Route;


// Route::get('SOLID', [SalesReporter::class, 'bettwen'])->name('user');

Route::get('/', function () {
    $obj = new SalesReporter(new SalesReposibility);

    // between last month
    return  $obj->between(now()->subMonth(), now(), new SalesOutput2);
});
