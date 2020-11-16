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
        $this->reasons = OvertimeRequest::natures();
        $this->names = OvertimeRequest::workers();
        $this->types = OvertimeRequest::approvalTypes();
        $this->serviceLines = OvertimeRequest::competencies();
        $this->statuses = OvertimeRequest::statuses();
        $this->requestors = OvertimeRequest::requestors();
        $this->locations = OvertimeRequest::locations();
        $this->weekenddates = OvertimeRequest::weekendDates();
        $this->imports = OvertimeRequest::imports();
        $this->firstApprovers = OvertimeRequest::approversFirstLevel();
        $this->secondApprovers = OvertimeRequest::approversSecondLevel();
        $this->thirdApprovers = OvertimeRequest::approversThirdLevel();
        $this->approvalModes = OvertimeRequest::approvalModes();
        $this->approverSquadLeaders = OvertimeRequest::squadLeaders();
        $this->approverTribeLeaders = OvertimeRequest::tribeLeaders();
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
