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
    public function build()
    {
        return $this->markdown('emails.request.created');
    }
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        parent::__construct($overtimeRequest);
    }
}
