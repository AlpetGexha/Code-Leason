<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;

class TextPipelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $name = $request->name ?? 'Alpet Gexha  @#@ 213 321 Gjakove 218190 @#!$!#@$#';
        $pipeline = Pipeline::send($name)
            ->through([
                // remove numbers
                fn ($text, $next) => $next(preg_replace('/[0-9]/', '', $text)),

                // makit title
                fn ($text, $next) => $next(str($text)->title()),

                // trim
                function ($text, $next) {
                    // trim if is login
                    if (auth()->check()) {
                        return $next(str($text)->trim());
                    }

                    return $next($text);
                },

                // remove white space
                fn ($text, $next) => $next(str($text)->replace('  ', ' ')),
            ])
            ->thenReturn();

        return response()->json([
            'pipeline' => $pipeline,
        ]);
    }
}
