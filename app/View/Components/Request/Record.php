<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use App\Models\Account;
use App\Models\Competency;
use App\Models\OvertimeRequest;

class Record extends Component
{
    public $allAccounts;
    public $allVerified;
    public $allLocations;
    public $allCompetencies;
    public $allImports;
    public $allRecoverable;
    public $allNatures;
    public $allWeekends;
    
    /**
     * The table.
     *
     * @var array
     */
    public $list;
    
    public $expand;
    
    /**
     * Create the component instance.
     *
     * @param  Collection  $list
     * @param  boolean  $expand
     * @return void
     */
    public function __construct($list = null, $expand = false)
    {
        $this->allAccounts = Account::accountApproversByLocation();
        $this->allVerified = Account::verifiedAccountByLocation();
        $this->allLocations = Account::verifiedLocations();
        $this->allCompetencies = Competency::competenciesByAccount();
        $this->allImports = OvertimeRequest::imports();
        $this->allRecoverable = OvertimeRequest::recoverables();
        $this->allNatures = OvertimeRequest::natures();
        $this->allWeekends = OvertimeRequest::weekendDates();
        
        $this->list = $list;
        $this->expand = $expand;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.table');
    }
}
