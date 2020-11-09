<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Failed;

class FailedListener
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        //
        echo('Adldap Failed <br>');
    }
}
