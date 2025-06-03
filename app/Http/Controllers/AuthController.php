<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('layouts.login');
    }

    public function login(Request $request){
       $credentials =$request->validate(
        [
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
             return redirect('/')->with('succes', 'Login Successfully, Welcome' .
             Auth::user()->name);
         }

         return back()->withErrors(
            ['email' => 'Email not found!']
         )->onlyInput('email');
    }
}
