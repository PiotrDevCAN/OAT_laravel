<?php

namespace App\Mail;

class OvertimeRequestSubmitted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->url = '';
        
        return $this->markdown('emails.request.submitted');
    }
}
