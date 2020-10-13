<?php

namespace App\Listeners;

use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogKeyWritten
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
     * @param  KeyWritten  $event
     * @return void
     */
    public function handle(KeyWritten $event)
    {
        //
        dump('Info Cache Key Written');
    }
}
