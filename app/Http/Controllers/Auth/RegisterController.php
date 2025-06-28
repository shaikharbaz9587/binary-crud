<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
    public function showregistrationform()
    {
        

       return view('auth.register'); 
    }

 
    public function register(Request $request)
    {
        
 
 $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
    'password' => 'required|string|min:6|confirmed',
]);


$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password), // always hash passwords!
]);

return redirect()->route('login')->with('success', 'Registration successful!');

    }


}
