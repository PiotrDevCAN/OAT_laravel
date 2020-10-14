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
    
    /**
     * Start the session for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Session\Session  $session
     * @return \Illuminate\Contracts\Session\Session
     */
    protected function startSession(Request $request, $session)
    {
        return tap($session, function ($session) use ($request) {
            $session->setRequestOnHandler($request);
            
            dump('START SESSION');
            
            $session->start();
            
            dump('CHECK IF SESSION STARTED');
            dump($session);
        });
    }
    
    /**
     * Handle the given request within session state.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Session\Session  $session
     * @param  \Closure  $next
     * @return mixed
     */
    protected function handleStatefulRequest(Request $request, $session, Closure $next)
    {
        // If a session driver has been configured, we will need to start the session here
        // so that the data is ready for an application. Note that the Laravel sessions
        // do not make use of PHP "native" sessions in any way since they are crappy.
        $request->setLaravelSession(
            $this->startSession($request, $session)
            );
        
        $this->collectGarbage($session);
        
        $response = $next($request);
        
        $this->storeCurrentUrl($request, $session);
        
        $this->addCookieToResponse($response, $session);
        
        // Again, if the session has been configured we will need to close out the session
        // so that the attributes may be persisted to some storage medium. We will also
        // add the session identifier cookie to the application response headers now.
        $this->saveSession($request);
        
        dump('UPDATED SESSION');
        dump($session);
        
        dump($session->isStarted());
        
        return $response;
    }
}
