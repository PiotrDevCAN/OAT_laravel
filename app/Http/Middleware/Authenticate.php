<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }
        
        dump('addigned guards');
        dump($guards);
        
        foreach(array_keys(config('auth.guards')) as $guard){
            if($this->auth->guard($guard)->check()) {
                dump('Logged to '.$guard);
            } else {
                dump('Not logged to '.$guard);
            }
        }
        
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                
                dump('=> LOGGED IN TO '.$guard);
                
                return $this->auth->shouldUse($guard);
            }
        }
        
        if (Auth::check()) {
            dump('loggged');
        } else {
            dump('not loggged');
        }
        
        $user = Auth::user();
        dump($user);
        
//         $this->unauthenticated($request, $guards);
    }
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('auth.login');
        }
    }
}
