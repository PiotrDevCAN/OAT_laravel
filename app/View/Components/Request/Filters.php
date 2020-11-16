<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\DB;

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
        $this->accounts = OvertimeRequest::accounts();
        dump(DB::getQueryLog());
        
        $this->reasons = OvertimeRequest::natures();
        dump(DB::getQueryLog());
        
        $this->names = OvertimeRequest::workers();
        
        dump(DB::getQueryLog());
        $this->types = OvertimeRequest::approvalTypes();
        
        dump(DB::getQueryLog());
        $this->serviceLines = OvertimeRequest::competencies();
        
        dump(DB::getQueryLog());
        $this->statuses = OvertimeRequest::statuses();
        
        dump(DB::getQueryLog());
        $this->requestors = OvertimeRequest::requestors();
        
        dump(DB::getQueryLog());
        $this->locations = OvertimeRequest::locations();
        
        dump(DB::getQueryLog());
        $this->weekenddates = OvertimeRequest::weekendDates();
        
        dump(DB::getQueryLog());
        $this->imports = OvertimeRequest::imports();
        
        dump(DB::getQueryLog());
        $this->firstApprovers = OvertimeRequest::approversFirstLevel();
        
        dump(DB::getQueryLog());
        $this->secondApprovers = OvertimeRequest::approversSecondLevel();
        
        dump(DB::getQueryLog());
        $this->thirdApprovers = OvertimeRequest::approversThirdLevel();
        
        dump(DB::getQueryLog());
        $this->approvalModes = OvertimeRequest::approvalModes();
            
        dump(DB::getQueryLog());
        $this->approverSquadLeaders = OvertimeRequest::squadLeaders();
            
        dump(DB::getQueryLog());
        $this->approverTribeLeaders = OvertimeRequest::tribeLeaders();
        dump(DB::getQueryLog());
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
