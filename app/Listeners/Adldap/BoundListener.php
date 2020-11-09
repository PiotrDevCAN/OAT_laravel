<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Bound;

class BoundListener
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
     * @param  Bound  $event
     * @return void
     */
    public function handle(Bound $event)
    {
        //
        echo('Adldap Bound <br>');
    }
}
