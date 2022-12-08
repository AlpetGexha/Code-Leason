<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedisController;
use App\Models\Article;
use Illuminate\Broadcasting\Broadcasters\RedisBroadcaster;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\LazyCollection;



Route::group(['controller' => RedisController::class], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/hashing', 'hashing')->name('hashing');
    Route::get('/catching', 'catching')->name('catching');


    Route::get('/vs', 'vs')->name('vs');
    Route::get('/cathingvhash', 'cathingvhash')->name('cathingvhash');

    Route::post('/queue', 'queue')->name('queue');
});

Route::get('/video/{id}', function ($id) {
    $download = Redis::get("video:{$id}:download");

    return view('welcome', compact('download'));
})->name('video');


Route::get('/video/{id}/download', function ($id) {
    Redis::incr("video:{$id}:download");

    return to_route('video', ['id' => $id]);
})->name('video.download');


Route::get('/article/{article}', function (Article $article) {

    // Redis::zincrby('article_treding', 1, $article->id); // Rrit article_treding:{ID} per 1
    Redis::zincrby('article_treding', 1, $article); // Rrit article_treding:{ID} per 1

    return $article;
});

Route::get('/article/treding/show', function () {
    // merr top 3 artikujt me te shikuar
    $article = Redis::zrevrange('article_treding', 0, 2); // [0-2] (0,1,2)
    foreach ($article as $a) {
        $a = json_decode($a);
        // $a = Article::find($a->id);
        dump($a);
    }
    // return $article;
})->name('acticle');


Route::get('user/{id}', function ($id) {
    $user = Redis::hgetall("user.{$id}.stats");

    Redis::hincrby("user.{$id}.stats", 'views', 1);

    return $user;
})->name('user.show');


Route::group(['controller' => BlogController::class, 'prefix' => 'blog'], function () {
    Route::get('/', 'index')->name('blog.index');
    Route::get('/{id}', 'show')->name('blog.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
