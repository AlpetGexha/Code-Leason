<?php

use App\Http\Controllers\ManyToManyController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
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
    return to_route('one-to-one.index');
});

// One to One
Route::group(['prefix' => 'one-to-one', 'controller' => OneToOneController::class], function () {
    Route::get('/', 'index')->name('one-to-one.index');
    Route::get('/delete/{id}', 'delete')->name('one-to-one.delete')->scopeBindings();
});

// One to Many
Route::group(['prefix' => 'one-to-many', 'as' => 'one-to-many.', 'controller' => OneToManyController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store')->scopeBindings();
});

// Many to Many
Route::group(['prefix' => 'many-to-many', 'as' => 'many-to-many.', 'controller' => ManyToManyController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store')->scopeBindings();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
