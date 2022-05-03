<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Public routes

// Auth routes
Route::group(['controller' => AuthController::class], function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});
Route::group(['controller' => ProductController::class, 'prefix' => 'product', 'as' => 'product'], function () {
    // Protected routes
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/search/{name}', 'search')->name('search');

    // Private routes
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });
});
