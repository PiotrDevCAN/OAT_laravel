<?php

namespace App\View\Components\Account;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    public $accounts;
    public $approvers;
    public $verified;
    public $locations;
    
    public $selectedAccount;
    public $selectedApprover;
    public $selectedVerified;
    public $selectedLocation;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if ($request->has('account')) {
            $this->selectedAccount = $request->has('account');
        };
        
        if ($request->has('approver')) {
            $this->selectedApprover = $request->input('approver');
        };
        
        if ($request->has('verified')) {
            $this->selectedVerified = $request->input('verified');
        };
        
        if ($request->has('location')) {
            $this->selectedLocation = $request->input('location');
        };
        
        $this->accounts = \App\AccountApprover::select('account as value')
            ->where('account', '<>', '')
            ->distinct()
            ->get();
        
        $this->approvers = \App\AccountApprover::select('approver as value')
            ->where('approver', '<>', '')
            ->distinct()
            ->get();
        
        $this->verified = \App\AccountApprover::select('verified as value')
            ->where('location', '<>', '')
            ->distinct()
            ->get();
        
        $this->locations = \App\AccountApprover::select('location as value')
            ->where('location', '<>', '')
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
        return view('components.account.filters');
    }
}
