<?php

namespace App\View\Components\Account;

use Illuminate\View\Component;
use Illuminate\Http\Request;
use App\Models\Account;

class Filters extends Component
{
    public $accounts;
    public $approvers;
    public $verified;
    public $locations;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->accounts = Account::select('account')
            ->where('account', '<>', '')
            ->distinct()
            ->get();
        
        $this->approvers = Account::select('approver')
            ->where('approver', '<>', '')
            ->distinct()
            ->get();
        
        $this->verified = Account::select('verified')
            ->where('location', '<>', '')
            ->distinct()
            ->get();
        
        $this->locations = Account::select('location')
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
