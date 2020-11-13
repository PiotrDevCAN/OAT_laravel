<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;

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
    
    public $approvalModes;
    public $approverSquadLeaders;
    public $approverTribeLeaders;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->accounts = array();
        $this->reasons = array();
        $this->names = array();
        $this->types = array();
        
        $this->serviceLines = array();
        $this->statuses = array();
        $this->reasons = array();
        $this->locations = array();
        
        $this->weekenddates = array();
        $this->imports = array();
        
        $this->firstApprovers = array();
        $this->secondApprovers = array();
        $this->thirdApprovers = array();
        
        $this->approvalModes = array();
        $this->approverSquadLeaders = array();
        $this->approverTribeLeaders = array();
        /*
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
        
        $this->approvalModes = OvertimeRequest::select('approval_mode')
            ->where('approval_mode', '<>', '')
            ->distinct()
            ->get();
            
        $this->approverSquadLeaders = OvertimeRequest::select('approver_squad_leader')
            ->where('approver_squad_leader', '<>', '')
            ->distinct()
            ->get();
            
        $this->approverTribeLeaders = OvertimeRequest::select('approver_tribe_leader')
            ->where('approver_tribe_leader', '<>', '')
            ->distinct()
            ->get();
        */
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
