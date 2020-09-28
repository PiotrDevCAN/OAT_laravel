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
    
    /**
     * The request instance.
     *
     * @var OvertimeRequest
     */
    public $request;
    
    public $requestEditUrl;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        $this->request = $overtimeRequest;
        
        $this->requestEditUrl = route('request.edit', ['overtimeRequest' => $overtimeRequest]);
    }
}
