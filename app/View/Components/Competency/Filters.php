<?php

namespace App\View\Components\Competency;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    
    public $serviceLines;
    public $approvers;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->serviceLines = \App\Competency::select('competency as value')
            ->where('competency', '<>', '')
            ->distinct()
            ->get();
        
        $this->approvers = \App\Competency::select('approver as value')
            ->where('approver', '<>', '')
            ->distinct()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.competency.filters');
    }
}
