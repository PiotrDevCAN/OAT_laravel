<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;

class Summary extends Component
{
    public $awaiting;
    public $awaitingTotal;
    public $awaitingHours;
    
    public $approved;
    public $approvedTotal;
    public $approvedHours;
    
    public $other;
    public $otherTotal;
    public $otherHours;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($awaiting = null, $awaitingTotal = 0, $awaitingHours = 0, $approved = null, $approvedTotal = 0, $approvedHours = 0, $other = null, $otherTotal = 0, $otherHours = 0)
    {
        $this->awaiting = $awaiting;
        $this->awaitingTotal = $awaitingTotal;
        $this->awaitingHours = $awaitingHours;
        
        $this->approved = $approved;
        $this->approvedTotal = $approvedTotal;
        $this->approvedHours = $approvedHours;
        
        $this->other = $other;
        $this->otherTotal = $otherTotal;
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
