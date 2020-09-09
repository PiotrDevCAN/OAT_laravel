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
            'Status' => route('request.list'),
            'Read Only' => route('request.approved'),
            'Admin' => array(
                'Account' => route('account.list'),
                'Sevice Lines' => route('competency.list'),
                'Show delegates' => route('delegate.list'),
                'Log' => route('log.list')
            ),
            'My Delegates' => route('delegate.my'),
            'My Access' => route('access.my')
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
