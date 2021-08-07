<?php
//php artisan make:controller ChangeUserPic --invokable
// mund te kryhej vetem 1 funksion
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeUserPicController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return "change user picture";
    }
}
