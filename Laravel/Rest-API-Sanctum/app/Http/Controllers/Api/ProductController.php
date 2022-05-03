<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ]);
        return Product::create($r->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, int $id)
    {
        $r->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($r->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product deleted', 'id' => $id]);
    }

    // search
    public function search(String $name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
