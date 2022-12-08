<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
    public function __invoke()
    {
        $user = User::find(1);
        $html = view('invoice', compact('user'))->render();
        // dd($html);

        Browsershot::html($html)
        ->save('file.pdf');

        return 'done';
    }
}
