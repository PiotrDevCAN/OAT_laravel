<?php

namespace App\Mail;

use App\Models\OvertimeRequest;

class OvertimeRequestCreated extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(OvertimeRequest $overtimeRequest)
    {
        dump('call OvertimeRequestCreated START');
        
        parent::build($overtimeRequest);
        
        dump('call OvertimeRequestCreated END');
        
        return $this->markdown('emails.request.created');
    }
}
