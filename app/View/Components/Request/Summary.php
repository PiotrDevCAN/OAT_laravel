<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\OvertimeRequest;

class Summary extends Component
{
    public $awaiting;
    public $awaitingHours;
    
    public $approved;
    public $approvedHours;
    
    public $other;
    public $otherHours;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($awaiting = null, $awaitingHours = 0, $approved = null, $approvedHours = 0, $other = null, $otherHours = 0)
    {
        $this->awaiting = $awaiting;
        $this->awaitingHours = $awaitingHours;
        
        $this->approved = $approved;
        $this->approvedHours = $approvedHours;
        
        $this->other = $other;
        $this->otherHours = $otherHours;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        
        return view('components.request.summary');
    }
}
