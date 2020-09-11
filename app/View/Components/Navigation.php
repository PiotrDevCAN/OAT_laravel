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
            'Request' => 'request.create',
            'Status' => 'request.list',
            'Read Only' => 'request.approved',
            'Admin' => array(
                'Account' => 'admin.account.list',
                'Sevice Lines' => 'admin.competency.list',
                'Show delegates' => 'admin.delegate.list',
                'Log' => 'admin.log.list'
            ),
            'My Delegates' => 'admin.delegate.my',
            'My Access' => 'access.my'
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
