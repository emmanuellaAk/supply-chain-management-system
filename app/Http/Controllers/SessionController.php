<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session');
    }

    public function submitLogin()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        session()->regenerate();
        //redirect with a success flash message
        return redirect()->route('home');
    }
}
