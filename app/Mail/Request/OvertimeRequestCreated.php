<?php

namespace App\Mail\Request;

class OvertimeRequestCreated extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.created', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.created');
    }
}
