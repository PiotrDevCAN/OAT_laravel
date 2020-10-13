<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

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
            'Home' => 'home',
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
            'My Access' => 'access.my',
        );
        
        if (Auth::check()) {
            // The user is logged in...
            $this->menuList['Log off'] = 'auth.logout';
        }
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
