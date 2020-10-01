<?php

namespace App\Listeners;

use App\Events\Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Saml2LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Saml2LoginEvent  $event
     * @return void
     */
    public function handle(Saml2LoginEvent $event)
    {
        $messageId = $event->getSaml2Auth()->getLastMessageId();
        // your own code preventing reuse of a $messageId to stop replay attacks
        $user = $event->getSaml2User();
        $userData = [
            'id' => $user->getUserId(),
            'attributes' => $user->getAttributes(),
            'assertion' => $user->getRawSamlAssertion()
        ];
        $laravelUser = User::adminUsers()->where('email', $userData['id'])->first();//find user by ID or attribute
        //if it does not exist create it and go on  or show an error message
        if($laravelUser) {
            Auth::login($laravelUser);
            AdminLoginHistory::create([
                'user_id' => Auth::id()
            ]);
        }
        else {
            session(['saml2_error_single' => 'You do not have access, please visit the system’s Teamdot page to obtain instructions']);
        }
    }
}
