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
        return $this->markdown('emails.request.created');
    }
    
    public function preRender(OvertimeRequest $overtimeRequest)
    {
        parent::preRender($overtimeRequest);
        
        dd($overtimeRequest);
        
        $this->render();
    }
}
