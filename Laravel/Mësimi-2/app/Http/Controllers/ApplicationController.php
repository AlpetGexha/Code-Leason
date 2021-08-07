<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Rules\Gmail;

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
//        $user = [
//            'name' => "Alpet",
//            'age' => 17,
//            'email' => "Agexha@gmail.com"
//        ];
//        return response()->json($user);
//        return response()->view("home");

//        return response()->download($file, $name);


        //e html-n e faqes se thene si file
//        return \response()->streamDownload(function(){
//            echo file_get_contents("https://laravel.com/");
//        }, "file.html");
   }


    public function login(UserRequest $r) {
//        validate krijimi i rregullave
//        $r->validate([
//            'text' => ['required', 'email', new Gmail],
//            'pass' => 'required|numeric',
//        ]);
        return redirect()->back();
//        return redirect()->route('login');
    }
}
