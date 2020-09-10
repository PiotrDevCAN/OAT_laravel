<?php

namespace App\View\Components\Account;

use Illuminate\View\Component;
use Illuminate\Http\Request;

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
    public function __construct()
    {
        $request = request();
        
        if ($request->has('Account')) {
            $this->selectedAccount = $request->has('Account');
        };
        
        if ($request->has('Approver')) {
            $this->selectedApprover = $request->input('Approver');
        };
        
        if ($request->has('Verified')) {
            $this->selectedVerified = $request->input('Verified');
        };
        
        if ($request->has('Location')) {
            $this->selectedLocation = $request->input('Location');
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
