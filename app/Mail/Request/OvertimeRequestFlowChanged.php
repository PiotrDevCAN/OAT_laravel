<?php

namespace App\Mail\Request;

class OvertimeRequestFlowChanged extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('request.flowChangedMailable', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.flowChanged');
    }
}
