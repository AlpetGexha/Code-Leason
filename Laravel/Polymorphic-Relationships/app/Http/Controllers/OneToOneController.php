<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Staff;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public  function index()
    {
        $post = Post::all();
        $staff = Staff::all();

        return view('one-to-one.show', compact('post', 'staff'));
    }

    // public function delete(int $id)
    // {
    //     $post = Post::find($id);
    //     $post->delete();

    //     return redirect()->route('one-to-one.index');
    // }
}
