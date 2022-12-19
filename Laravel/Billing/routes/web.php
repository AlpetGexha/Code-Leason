<?php

use App\Http\Controllers\InvoicePaymentController;
use App\Http\Controllers\SingleCharge;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth:sanctum', 'verified', config('jetstream.auth_session')]], function () {

    // Subscriptions
    Route::group(['prefix' => 'subscribe', 'as' => 'subscribe.', 'controller' => StripeController::class], function () {
        // Subscription
        Route::post('/stripe',  'pay')->name('post')->middleware('nonPaymenetContstumers');
        Route::get('/subscribe',  'index')->name('get')->middleware('nonPaymenetContstumers');

        // give Subscription
        Route::get('/give-subscribe', 'indexGive')->name('give');
        Route::post('/give-subscribe', 'giveSubscription')->name('give.post');
    });

    // Single Charge
    Route::group(['prefix' => 'single', 'as' => 'charge.', 'controller' => SingleCharge::class], function () {
        Route::post('/charge',  'pay')->name('post');
        Route::get('/charge',  'index')->name('get');
    });

    // Invoice
    Route::group(['prefix' => 'invoice', 'as' => 'invoice.', 'controller' => InvoicePaymentController::class], function () {
        Route::post('/invoice', 'pay')->name('post');
        Route::get('/invoice', 'index')->name('get');
        Route::post('/user/invoice/{invoice}',  'download')->name('download');
        // Route::post('/user/invoice/{invoice}/refund',  'refund')->name('refund');
    });
});






Route::middleware(['auth:sanctum', 'verified', 'paymenetContstumers'])->group(function () {
    Route::get('/members', function () {
        return view('members');
    })->name('members');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
