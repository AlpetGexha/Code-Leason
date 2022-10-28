<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{


    public function index()
    {

        $post = Cache::remember("posts", 20, function () {
            return Post::paginate(200);
        });

        return view('welcome', compact('post'));
    }


    public function show($id)
    {

        $post = Cache::remember("post-{$id}", 10, function () use ($id) {
            return Post::find($id);
        });

        return view('post', compact('post'));
    }

    public function lazyLoading($key, $minutes, $callback)
    {
        if (Cache::has($key)) {
            $data = Cache::get($key);
            return $data;
        } else {
            // Database Server is called outside the Cache Server.
            $data = $callback();
            Cache::set($key, $data, $minutes);
            return $data;
        }
    }
}
