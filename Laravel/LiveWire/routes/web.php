<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/val', function () {
    return view('validate');
});

Route::get('/q', function () {
    return view('search');
});

Route::get('/ul', function () {
    return view('ul');
});

Route::get('/alpinejs', function () {
    return view('alpinejs');
});
