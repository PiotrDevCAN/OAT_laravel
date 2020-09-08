<?php

namespace App\View\Components\Delegate;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    
    public $accounts;
    public $reasons;
    public $names;
    public $types;
    
    public $serviceLines;
    public $statuses;
    public $requestors;
    public $locations;
    
    public $weekenddates;
    public $imports;
    
    public $firstApprovers;
    public $secondApprovers;
    public $thirdApprovers;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->accounts = \App\Request::select('account as value')
            ->where('account', '<>', '')
            ->distinct()
            ->get();
        
        $this->reasons = \App\Request::select('nature as value')
            ->where('nature', '<>', '')
            ->distinct()
            ->get();
        
        $this->names = \App\Request::select('worker as value')
            ->where('worker', '<>', '')
            ->distinct()
            ->get();
        
        $this->types = \App\Request::select('approvaltype as value')
            ->where('approvaltype', '<>', '')
            ->distinct()
            ->get();
        
        $this->serviceLines = \App\Request::select('competency as value')
            ->where('competency', '<>', '')
            ->distinct()
            ->get();
        
        $this->statuses = \App\Request::select('status as value')
            ->where('status', '<>', '')
            ->distinct()
            ->get();
        
        $this->requestors = \App\Request::select('requestor as value')
            ->where('requestor', '<>', '')
            ->distinct()
            ->get();
        
        $this->locations = \App\Request::select('location as value')
            ->where('location', '<>', '')
            ->distinct()
            ->get();
        
        $this->weekenddates = \App\Request::select('weekenddate as value')
            ->distinct()
            ->get();
        
        $this->imports = \App\Request::select('import as value')
            ->where('import', '<>', '')
            ->distinct()
            ->get();
        
        $this->firstApprovers = \App\Request::select('approver_first_level as value')
            ->where('approver_first_level', '<>', '')
            ->distinct()
            ->get();
        
        $this->secondApprovers = \App\Request::select('approver_second_level as value')
            ->where('approver_second_level', '<>', '')
            ->distinct()
            ->get();
        
        $this->thirdApprovers = \App\Request::select('approver_third_level as value')
            ->where('approver_third_level', '<>', '')
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
        return view('components.delegate.filters');
    }
}
