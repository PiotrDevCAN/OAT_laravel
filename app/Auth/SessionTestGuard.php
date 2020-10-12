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
        
//         dump('SessionGuard attempt');
//         dump($credentials);
//         dump($this->provider);
        
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
    
    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if ($this->loggedOut) {
            return;
        }
        
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        if (! is_null($this->user)) {
            return $this->user;
        }
        
        $id = $this->session->get($this->getName());
        
        // First we will try to load the user using the identifier in the session if
        // one exists. Otherwise we will check for a "remember me" cookie in this
        // request, and if one exists, attempt to retrieve the user using that.
        if (! is_null($id) && $this->user = $this->provider->retrieveById($id)) {
            $this->fireAuthenticatedEvent($this->user);
        }
        
        // If the user is null, but we decrypt a "recaller" cookie we can attempt to
        // pull the user data on that cookie which serves as a remember cookie on
        // the application. Once we have a user we can return it to the caller.
        if (is_null($this->user) && ! is_null($recaller = $this->recaller())) {
            $this->user = $this->userFromRecaller($recaller);
            
            if ($this->user) {
                $this->updateSession($this->user->getAuthIdentifier());
                
                $this->fireLoginEvent($this->user, true);
            }
        }
        
        return $this->user;
    }
    
    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        
//         dump('SessionTestGuard check');
//         dump('Saved user');
//         dump($this->user());
//         dump(is_null($this->user()));
        
        return ! is_null($this->user());
    }
}
