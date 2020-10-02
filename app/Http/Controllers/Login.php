<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        
        if (Auth::check()) {
            dump('user is logged now');
        } else {
            dump('user is NOT logged now');
        }
        
        $credentials = $request->only('email', 'password');
        
        $user = new \App\Models\User();
        $user->name = 'Piotr Tajanowicz';
        $user->email = 'Piotr.Tajanowicz@ibm.com';
        $user->password = 'ABC';
        
        Auth::login($user);
        
        if (Auth::check()) {
            dump('user is logged now');
        } else {
            dump('user is NOT logged now');
        }
        
//         if (Auth::attempt($credentials)) {
//             // Authentication passed...
//             return redirect()->intended('dashboard');
//         }

        return view('login');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        return view('logout');
    }
}