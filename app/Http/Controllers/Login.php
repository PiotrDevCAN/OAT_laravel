<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
        
//         if ($request->session()->has('user')) {
//             // retrieve user from session
//             $user = $request->session()->get('user');
//         } else {
//             $credentials = $request->only('email', 'password');
            
//             $user = new \App\Models\User();
//             $user->name = 'Piotr Tajanowicz';
//             $user->email = 'Piotr.Tajanowicz@ibm.com';
//             $user->password = 'ABC';
            
//             // store user in session
//             $request->session()->put('user', $user);
//         }
        
        
//         $user = $request->session()->get('user');
        
//         $request->session()->put('user', $user);
        
//         dump(Auth::user());
        
//         Auth::login($user);
        
//         dump(Auth::user());
        
//         if (Auth::check()) {
//             dump('user is logged now');
//         } else {
//             dump('user is NOT logged now');
//         }
        
        
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            
            // create our user data for the authentication
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('password')
            );
            
            // attempt to do the login
            if (Auth::attempt($userdata)) {
                
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                echo 'SUCCESS!';
                
            } else {
                
                // validation not successful, send back to form
                return Redirect::to('login');
                
            }            
        }
    }
    
    public function login(Request $request)
    {
        return view('login');
    }
    
    public function cancel(Request $request)
    {
        return view('loginCancel');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        return view('logout');
    }
}