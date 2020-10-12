<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class SessionTestGuard extends SessionGuard
{
    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array  $credentials
     * @param  bool  $remember
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false)
    {
        $this->fireAttemptEvent($credentials, $remember);
        
        dump('SessionGuard attempt');
        dump($credentials);
        dump($this->provider);
        dd('SessionTestGuard attempt ended');
        
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
        
        // If an implementation of UserInterface was returned, we'll ask the provider
        // to validate the user against the given credentials, and if they are in
        // fact valid we'll log the users into the application and return true.
        if ($this->hasValidCredentials($user, $credentials)) {
            $this->login($user, $remember);
            
            return true;
        }
        
        // If the authentication attempt fails we will fire an event so that the user
        // may be notified of any suspicious attempts to access their account from
        // an unrecognized user. A developer may listen to this event as needed.
        $this->fireFailedEvent($user, $credentials);
        
        return false;
    }
}
