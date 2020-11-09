<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Binding;

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
     * @param  Binding  $event
     * @return void
     */
    public static function handle(Binding $event)
    {
        //
        echo('Adldap Passed <br>');
    }
}
