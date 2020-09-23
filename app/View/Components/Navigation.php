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
            'List (ex Status)' => 'request.list',
            'Approved (ex Read Only)' => 'request.approved',
            'Admin' => array(
                'Accounts' => array(
                    'Create' => 'admin.account.create',
                    'List' => 'admin.account.list'                    
                ),
                'Sevice Lines' => array(
                    'Create' => 'admin.competency.create',
                    'List' => 'admin.competency.list'
                ),
                'Delegates'  => array(
                    'Create' => 'admin.delegate.create',
                    'List' => 'admin.delegate.list'
                ),
                'Logs' => 'admin.log.list'
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
