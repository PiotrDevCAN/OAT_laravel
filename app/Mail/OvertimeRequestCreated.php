<?php

namespace App\Mail;

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
}
