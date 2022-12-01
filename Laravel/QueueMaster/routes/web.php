<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Queue;
use App\Jobs\DeployBatchJob;
use App\Jobs\DeployJob;
use App\Jobs\PaymentJob;
use App\Jobs\PullBatchJob;
use App\Jobs\PullJob;
use App\Jobs\RateLimitJob;
use App\Jobs\TestPullBatchJob;
use App\Jobs\TestPullJob;
use App\Jobs\WelcomeEmailJob;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Bus;
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
})->name('home');

Route::group(['controller' => Queue::class, 'prefix' => 'queue'], function () {
    Route::post('/job', 'job')->name('welcome');
    Route::post('/workflow', 'workflow')->name('workflow');
    Route::post('/workflow2', 'workflow2')->name('workflow2');
    Route::post('/ratelimit', 'ratelimit')->name('ratelimit');
});

Route::get('/pipe-line', function () {

    $pipeline = app(Pipeline::class);

    $pipeline->send('laravel pipeline is bad') // requesti
        ->through([ // pipelini (funksionet) neper te cilen kalon requesti
            function ($value, $next) {
                $value = str_ireplace('bad', 'super good', $value);

                return $next($value);
            },

            function ($value, $next) {
                $value = str()->title($value); // Laravel Pipeline

                return $next($value);
            }
        ])
        ->then(function ($value) {
            dump($value);
        });

    return 'Done';
})->name('pipeline');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
