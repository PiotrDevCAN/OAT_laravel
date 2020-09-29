<?php

namespace App\Mail\Request;

class OvertimeRequestRejected extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('request.rejectedMailable', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.rejected');
    }
}
