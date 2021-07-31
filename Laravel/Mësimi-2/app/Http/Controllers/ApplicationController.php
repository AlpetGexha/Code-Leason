<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function home() {

        if(request()->method() == "POST"){
            // return "Post method";
            // return request()->all(); //shfaq te gjita te dhenat
            // return request()->only("text"); //vetem "text"
            // return request()->input("text"); //vetem "text"

           // return request()->except("_token"); //te gjitha medotat por jo "token"

            $data = request()->only("basket");
            $basket = $data['basket'];

            return implode( ", " ,$basket);

        }

        return view('home');
    }

    public function about() {
        return view('about');
    }

}
