<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Passed;

class PassedListener
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
     * @param  Passed  $event
     * @return void
     */
    public function handle(Passed $event)
    {
        //
        echo('Adldap Passed <br>');
    }
}
