<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    protected $allow_extension = ['jpg', 'jpeg', 'jfif', 'pjpeg', 'pjp', 'png', 'svg',];

    public function index()
    {
        return  view('upload.index');
    }
    public function upload(Request $request)
    {
        $ext = $request->fotoja->extension();
        if (in_array($ext, $this->allow_extension)) {
            #  per te uploduar ne  public
            $filename = time() . '.' . md5(uniqid()) . '.' . $ext;
            // return $request->fotoja;
            //move(foldername, filename) = Nga folderi %local%\tmp\php5BF2.tmp bene move ne public/%filename%
            $request->fotoja->move(public_path('upload'), $filename);
            return redirect()->route('uploud.form')->with(['success' => 'Fotoja u Uplodua me sukses', 'filename' => $filename]);
            /*
            #per te uploduar ne storage 
            $request->file('fotoja')->storeAs(
            'upload',  //Emri i folderit
            $filename, //Emri i fajllit
            'public' //Emri ku ruhet folderi ne storage
        );
        */
        } else
            return redirect()->back()->with('error', 'Fotoja Duhet te jete e tipit:' . implode(', ', $this->allow_extension));
    }
}
