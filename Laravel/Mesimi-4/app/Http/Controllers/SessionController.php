<?php

namespace App\Http\Controllers;

class SessionController extends Controller

{
    public function set($key, $value)
    {
        /*
        session()->put('Username', 'AlpetG');
        if (session()->has('Username'))
            return "Sessioni 'Username' u krijua me suksess";
        else
            return "Something want wrong";
            */
        session()->put($key, $value);

        if (!session()->has($key))
            return "Something want wrong!";

        return "Session '" . $key . "' was set successfully.";
    }

    public function get($key)
    {
        /*
                if (session()->has('Username'))
            return "US: " . session()->get('Username');
        else
            return "Session email dosen't exist!";
        */
        if (!session()->has($key))
            return "Session '" . $key . "' doesn't exist!";

        return view('session', [
            'key' => $key
        ]);
    }

    public function delete($key)
    {
        /*
                if (!session()->has('Username'))
            return "Session email dosen't exist!";

        session()->forget('Username');
        return "Sessionu Username u Fshie me sukses";
        */
        if (!session()->has($key))
            return "Session '" . $key . "' doesn't exist!";

        session()->forget($key);
        return "Session '" . $key . "' was deleted successfully";
    }
}
