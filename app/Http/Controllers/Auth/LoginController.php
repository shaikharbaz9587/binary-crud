<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\controllers\controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  
    public function index()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return redirect()->intended('/')->with('success', 'Login successful!');
        }

    
        return back()->withErrors([
            'email' => 'Invalid Email.',
            'password' => 'Invalid Password.',
        ])->withInput();
    }

    public function logout()
    {

       

        Auth::logout();

        

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    }
