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
    
    public function render()
    {
        dump('call OvertimeRequestBase RENDER');
//         dump($overtimeRequest->reference);
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(OvertimeRequest $overtimeRequest)
    {
        dump('call OvertimeRequestBase BUILD');
        dump($overtimeRequest->reference);
        
        $this->requestEditUrl = route('request.edit', ['overtimeRequest' => '153325']);
    }
}
