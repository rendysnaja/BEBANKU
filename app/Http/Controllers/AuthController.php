<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Users;

class AuthController extends Controller
{
    public function login()
    {
        return view('login/login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/asesi');
        }

        return back()->withErrors([
            'email' => 'Wrong username or password',
        ])->onlyInput('email');

         // Session::flash('status', 'fail');
        // Session::flash('message', 'addd new asesi success');
        // return view('login/login');
    }
}
