<?php

namespace App\View\Components\Competency;

use Illuminate\View\Component;
use App\Models\Competency;

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
        $this->serviceLines = Competency::select('competency')
            ->where('competency', '<>', '')
            ->distinct()
            ->get();
        
        $this->approvers = Competency::select('approver')
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
