<?php

namespace App\View\Components\Competency;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    
    public $accounts;
    public $reasons;
    
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
