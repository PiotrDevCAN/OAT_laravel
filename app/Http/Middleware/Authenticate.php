<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        dump($guards);
        
        $this->authenticate($request, $guards);
        
        return $next($request);
    }
    
    protected function authenticate($request, array $guards)
    {
        
        dump(config('auth.defaults.guard'));
        
        dump($guards);
        
        if (empty($guards)) {
            $guards = [null];
        }
        
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
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
            return route('login');
        }
    }
}
