<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navigation extends Component
{
    
    public $menuList;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuList = array(
            'Request' => route('request.create'),
            'Status' => route('request.index'),
            'Read Only' => route('request.approvedList'),
            'Admin' => array(
                'Account' => route('account.index'),
                'Sevice Lines' => route('competency.index'),
                'Show delegates' => route('delegate.index'),
                'Log' => route('log.index')
            ),
            'My Delegates' => route('myDelegates'),
            'My Access' => route('myAccess')
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
