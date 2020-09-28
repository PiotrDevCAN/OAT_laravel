<?php

namespace App\Mail;

class OvertimeRequestApproved extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.request.approved');
    }
}
