<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            Auth::login(User::find(2));
        }

        $articles = Article::paginate(15);

        $onReadIds = Redis::zrevrange('user.1.reading', 0, 2);

        $onRead = collect($onReadIds)->map(function ($id) {
            return Article::find($id);
        });

        return view('blog.blog', compact('articles', 'onRead'));
    }

    public function show($id)
    {
        $article = remember('article', function () use ($id) {
            return Article::find($id);
        }, 60 * 60 * 60);

        Redis::zadd('user.1.reading', time(), $id);

        return view('blog.single', compact('article'));
    }
}
