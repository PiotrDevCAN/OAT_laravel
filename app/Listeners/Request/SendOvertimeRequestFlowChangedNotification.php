<?php

namespace App\Listeners\Request;

use App\Events\OvertimeRequestApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OvertimeRequestFlowChanged;

class SendOvertimeRequestFlowChangedNotification
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
     * @param  OvertimeRequestFlowChanged  $event
     * @return void
     */
    public function handle(OvertimeRequestFlowChanged $event)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new OvertimeRequestFlowChanged($event->request));
    }
}
