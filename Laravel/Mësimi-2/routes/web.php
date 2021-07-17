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
    return view('welcome',
        [
            'username'=>'Alpet Gexha',
            'age'=> 16,
            'subject' => ["TIK","SO","Praktik","Matematik"]
        ]
    );
});
Route::get('/php', function () {
    return view('welcome-php');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/home', function () {
    return view('home');
})->name('home');



