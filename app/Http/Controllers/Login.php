<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class Login extends Controller
{
    public $targetPageTitle;
    
    public function showLoginForm(Request $request)
    {
        $this->targetPageTitle = $request->session()->pull('url.intended');
        
        return view('login');
    }
    
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
            dd('loggged');
        } else {
            dump('not loggged');
        }
        
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::route('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            
            // create our user data for the authentication
            $credentials = array(
                'email' => $request->input('email'),
                'password' => $request->input('password')
            );
            
            // attempt to do the login
            if (Auth::attempt($credentials)) {
                
                dump('first check');
                foreach(array_keys(config('auth.guards')) as $guard){
                    if(auth()->guard($guard)->check()) {
                        dump('Logged to '.$guard);
                    } else {
                        dump('Not logged to '.$guard);
                    }
                }
                
                dump('second check');
                foreach(array_keys(config('auth.guards')) as $guard){
                    if(auth()->guard($guard)->check()) {
                        dump('Logged to '.$guard);
                    } else {
                        dump('Not logged to '.$guard);
                    }
                }
                
                $user = Auth::user();
                dump($user);
                
                // Authentication passed...
//                 return redirect()->intended(route('home'));
            
            } else {
            
                // validation not successful, send back to form
                return redirect()->route('auth.login');
            
            }            
        }
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