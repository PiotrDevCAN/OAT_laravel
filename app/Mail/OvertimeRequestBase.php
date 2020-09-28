<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OvertimeRequest;

class OvertimeRequestBase extends Mailable
{
    use Queueable, SerializesModels;
    
    public $requestEditUrl;
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(OvertimeRequest $overtimeRequest)
    {
        dump($overtimeRequest);
        
        $this->requestEditUrl = route('request.edit', ['overtimeRequest' => $overtimeRequest->reference]);
    
        dump($this->requestEditUrl);
        
        dd('quit');
        
    }
}
