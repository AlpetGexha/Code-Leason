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
    return view('first');
});

Route::get('/first', function () {
    return view('welcome');
})->name('first');

Route::get('/val', function () {
    return view('validate');
})->name('validate');

Route::get('/q', function () {
    return view('search');
})->name('search');

Route::get('/ul', function () {
    return view('ul');
})->name('ul');

Route::get('/alpinejs', function () {
    return view('alpinejs');
})->name('alpinejs');

Route::get('/todo', function () {
    return view('todo');
})->name('todo');

Route::get('/todo2', function () {
    return view('todo2');
})->name('todo2');

Route::get('/editor', function () {
    return view('ckeditor');
})->name('ckeditor');
