<?php

namespace App\Http\Controllers;

use App\Models\CategoryOneToMany;
use App\Models\DrejtimiOneToManyModel;
use App\Models\PostOneToManyModel;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function index()
    {
        $posts = PostOneToManyModel::all();

        $drejtimet = DrejtimiOneToManyModel::all();

        $postsWith = PostOneToManyModel::with('category')
            ->whereHas('category')
            ->limit(10)
            ->get();

        $categorysTable = CategoryOneToMany::all();

        $postCategorys = CategoryOneToMany::whereHasMorph('categoryable', [PostOneToManyModel::class])->get();

        $catgorysQuery = CategoryOneToMany::whereHasMorph(
            'categoryable',
            [PostOneToManyModel::class, DrejtimiOneToManyModel::class],
            fn ($q) => $q->where('title', 'like', '%Facere%')
        )
            ->get();

        return view('one-to-many.show', compact('posts', 'drejtimet', 'postsWith', 'categorysTable', 'catgorysQuery', 'postCategorys'));
    }


    public function store(Request $r)
    {

        $post = PostOneToManyModel::create([
            'title' => $r->title,
        ]);

        foreach ($r->category as $c) {
            $post->category()->create([
                'title' => $c,
                'categoryable_id' => $post->id,
                'categoryable_type' => PostOneToManyModel::class,
            ]);
        }

        return redirect()->route('one-to-many.index');
    }
}
