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
        $data = array(
            'url' => 'link_some_page'
        );
        
        return $this->markdown('emails.request.submitted', $data);
    }
}
