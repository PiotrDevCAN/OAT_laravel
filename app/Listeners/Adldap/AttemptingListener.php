<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Attempting;

class AttemptingListener
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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        //
        echo('Adldap Attempting <br>');
    }
}
