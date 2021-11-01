<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::where(['user_id' => auth()->id()])->get();s

        // $post = auth()->user()->posts;
        $post = Post::all();

        return view('posts.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required| max:254',
            'pershkrimi' => 'required'
        ]);

        $post = [
            'title' => $request->title,
            'body' => $request->pershkrimi,
            'user_id' => auth()->id(),
        ];
        if (Post::create($post))
            return redirect()->route('post.index')->with('success', 'Postimi u Postua me sukse');
        else
            return redirect()->back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*  Gate nepermjet Controllerave
        $post = Post::find($id);
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        return view('posts.edit')->with('post', $post);
*/

        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();
        if (!is_null($post))
            return view('posts.edit')->with('post', $post);

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {




        $request->validate([
            'title' => 'required| max:254',
            'pershkrimi' => 'required'
        ]);

        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();
        /*
                $post = Post::find($id);
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        */

        $data = [
            'title' => $request->title,
            'body' => $request->pershkrimi,
        ];
        if ($post->update($data))
            return redirect()->route('post.index')->with('success', 'Postimi u Ndryshua me sukse');
        else
            return redirect()->back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where(['id' => $id, 'user_id' => auth()->id()])->first();

        /*
                $post = Post::find($id);
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        */
        
        if (!is_null($post))
            $post->delete();
        return redirect()->route('post.index')->with('success', 'Postimi u Fshia me sukse');


        // Post::destroy($id);
        // return redirect()->route('post.index')->with('success', 'Postimi u Fshia me sukse');
    }
}
