<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\OvertimeRequest;

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
        
        $this->accounts = OvertimeRequest::select('account')
            ->where('account', '<>', '')
            ->distinct()
            ->get();
        
        $this->reasons = OvertimeRequest::select('nature')
            ->where('nature', '<>', '')
            ->distinct()
            ->get();
        
        $this->names = OvertimeRequest::select('worker')
            ->where('worker', '<>', '')
            ->distinct()
            ->get();
        
        $this->types = OvertimeRequest::select('approvaltype')
            ->where('approvaltype', '<>', '')
            ->distinct()
            ->get();
        
        $this->serviceLines = OvertimeRequest::select('competency')
            ->where('competency', '<>', '')
            ->distinct()
            ->get();
        
        $this->statuses = OvertimeRequest::select('status')
            ->where('status', '<>', '')
            ->distinct()
            ->get();
        
        $this->requestors = OvertimeRequest::select('requestor')
            ->where('requestor', '<>', '')
            ->distinct()
            ->get();
        
        $this->locations = OvertimeRequest::select('location')
            ->where('location', '<>', '')
            ->distinct()
            ->get();
        
        $this->weekenddates = OvertimeRequest::select('weekenddate')
            ->distinct()
            ->get();
        
        $this->imports = OvertimeRequest::select('import')
            ->where('import', '<>', '')
            ->distinct()
            ->get();
        
        $this->firstApprovers = OvertimeRequest::select('approver_first_level')
            ->where('approver_first_level', '<>', '')
            ->distinct()
            ->get();
        
        $this->secondApprovers = OvertimeRequest::select('approver_second_level')
            ->where('approver_second_level', '<>', '')
            ->distinct()
            ->get();
        
        $this->thirdApprovers = OvertimeRequest::select('approver_third_level')
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
        
        return view('components.request.filters');
    }
}
