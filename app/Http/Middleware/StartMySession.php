<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Session\Middleware\StartSession;

class StartMySession extends StartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dump('StartMySession handle');
        
        if (! $this->sessionConfigured()) {
            
            dump('StartMySession sessionConfigured NOT');
            
            return $next($request);
        }
        
        $session = $this->getSession($request);
        
        dump($session);
        
        if ($this->manager->shouldBlock() ||
            ($request->route() instanceof Route && $request->route()->locksFor())) {
                return $this->handleRequestWhileBlocking($request, $session, $next);
            } else {
                return $this->handleStatefulRequest($request, $session, $next);
            }
    }
}
