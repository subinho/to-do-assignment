<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth/login');
    }

    public function store()
    {
        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(! Auth::attempt($validated, true)){
            throw ValidationException::withMessages([
                'email' => 'Those credentials do not match!'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
