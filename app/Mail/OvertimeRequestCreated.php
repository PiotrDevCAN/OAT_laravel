<?php

namespace App\Mail;

use App\Models\OvertimeRequest;

class OvertimeRequestCreated extends OvertimeRequestBase
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        parent::__construct($overtimeRequest);
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(OvertimeRequest $overtimeRequest)
    {
        return $this->markdown('emails.request.created');
    }
}
