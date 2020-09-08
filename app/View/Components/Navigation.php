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
            'Request' => 'p_request.php',
            'Status' => 'p_manage.php',
            'Read Only' => 'p_readerOnly.php',
            'Admin' => array(
                'Account' => 'p_account.php',
                'Sevice Lines' => 'p_competency.php',
                'Show delegates' => 'p_showDelegates.php',
                'Log' => 'p_log.php'
            ),
            'My Delegates' => 'p_delegate.php',
            'My Access' => 'p_myOatAccess.php'
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
