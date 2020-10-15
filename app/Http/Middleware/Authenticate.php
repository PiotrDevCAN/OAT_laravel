<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        
        dump('CHECK 1');
        dump($request->session()->all());
        
        $this->authenticate($request, $guards);
        
        dump('CHECK 2');
        dump($request->session()->all());
        
        dump('CHECK 3');
        dump($request->session());
        
        return $next($request);
    }

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
        
        foreach ($guards as $guard) {
            
            dump('set guard '.$guard);
            dump('auth obj');
            dump($this->auth);
            dump($this->auth->guard($guard));
            dump($this->auth->guard($guard)->check());
            
            if ($this->auth->guard($guard)->check()) {
                dump('will stop and shouldUse '.$guard);
                return $this->auth->shouldUse($guard);
            }
        }
        
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
