<?php

namespace App\Http\Controllers;

use App\Jobs\RedisJob;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            Auth::login(User::find(1));
        }

        $vizits = Redis::incr('visits');

        return view('index', compact('vizits'));
    }

    public function hashing()
    {
        $user2Stats = [
            'Likes' => rand(10, 90),
            'WhatchLater' => rand(10, 90),
            'Favorite' => rand(10, 90),
            'Wishlist' => rand(10, 90),
        ];

        Redis::hmset('user.' . auth()->id() . '.stats', $user2Stats);

        Redis::hset('user.' . auth()->id() . '.stats', 'comments', 10);

        Redis::hincrby('user.' . auth()->id() . '.stats', 'views', 1);
        // Redis::hdescby('');

        return Redis::hgetall('user.' . auth()->id() . '.stats');
    }


    public function vs()
    {
        Benchmark::dd([
            function () {
                $article = Redis::zrevrange('article_treding', 0, 2); // [0-2] (0,1,2)
                foreach ($article as $a) {
                    $a = json_decode($a);
                    // $a = Article::find($a->id);
                    dump($a);
                }
            },

            function () {
                // Cache::remember('ez', 10, function () {
                $article = Article::orderBy('views', 'desc')->take(3)->get();
                foreach ($article as $a) {
                    dump($a);
                }
                // });
            },
            // Lazy load
            function () {
                $article = Article::orderBy('views', 'desc')->take(3)->cursor();
                foreach ($article as $a) {
                    dump($a);
                }
            }
        ]);
    }

    public function catching()
    {
        // Cache::put('foo', ['name ' => 'Alpet', 'age' => 18], 10);

        // return Cache::get('foo');


        // if (Redis::exists('article.all')) {
        //     return json_decode(Redis::get('article.all'));
        // }

        // $article = App\Models\Article::all();

        // Redis::set('article.all', $article);

        // return $article;

        return  remember('article.all', function () {
            return Article::all();
        }, 60 * 60); // 1h
    }

    public function cathingvhash()
    {
        $user = [
            'name' => 'Alpet',
            'age' => 18,
            'surname' => 'Gexha',
            'email' => 'agexha@gmail.com',
            'likes' => 100
        ];

        Benchmark::dd([
            function () use ($user) {
                Cache::put('user.1', $user, 10);
                return Cache::get('user.1');
            },
            function () use ($user) {
                Redis::hmset('user.1', $user);
                return Redis::hgetall('user.1');
            }
        ]);
    }

    public function queue()
    {
        (new RedisJob)->dispatch();

        return to_route('index');
    }
}
