<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;

class Summary extends Component
{
    public $awaitingTotal;
    public $awaitingHours;
    
    public $approvedTotal;
    public $approvedHours;
    
    public $otherTotal;
    public $otherHours;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($awaitingTotal = 0, $awaitingHours = 0, $approvedTotal = 0, $approvedHours = 0, $otherTotal = 0, $otherHours = 0)
    {
        $this->awaitingTotal = $awaitingTotal;
        $this->awaitingHours = $awaitingHours;
        
        $this->approvedTotal = $approvedTotal;
        $this->approvedHours = $approvedHours;
        
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
