<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//         Route::currentRouteName();
        
        $this->menuList = array(
            'Home' => array(
                'route' => 'home'
            ),
            'Request' => array( // key
                'route' => array(
                    'Create' => array( // subKey
                        'route' => 'request.create'
                    ),
                    'List' => array(
                        'route' => 'request.list'
                    ),
                    'Approved' => array(
                        'route' => 'request.approved'
                    )
                )               
            ),
            'Admin' => array(
                'route' => array(
                    'Accounts' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.account.create'
                            ),
                            'List' => array(
                                'route' => 'admin.account.list'
                            )
                        )
                    ),
                    'Sevice Lines' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.competency.create'
                            ),
                            'List' => array(
                                'route' => 'admin.competency.list'
                            )
                        )
                    ),
                    'Delegates' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.delegate.create'
                            ),
                            'List' => array(
                                'route' => 'admin.delegate.list'
                            )
                        )
                    ),
                    'Logs' => array(
                        'route' => 'admin.log.list'
                    )
                )
            ),
            'My Delegates' => array(
                'route' => 'admin.delegate.my'
            ),
            'My Access' => array(
                'route' => 'access.my'
            ),
        );
        
        foreach ($this->menuList as $key => $value) {
            if (is_array($value['route'])) {
                foreach ($value['route'] as $subKey => $subValue) {
                    if (is_array($subValue['route'])) {
                        foreach ($subValue['route'] as $subSubKey => $subSubValue) {
                            if (is_array($subSubValue['route'])) {
                                foreach ($subSubValue['route'] as $subSubSubKey => $subSubSubValue) {
                                    if ($subSubSubValue['route'] == Route::currentRouteName()) {
                                        $this->menuList[$key]['route'][$subKey]['route'][$subSubKey]['route'][$subSubSubKey]['selected'] = true;
                                    }
                                }
                            } else {
                                if ($subSubValue['route'] == Route::currentRouteName()) {
                                    $this->menuList[$key]['route'][$subKey]['route'][$subSubKey]['selected'] = true;
                                }
                            }
                        }                        
                    } else {
                        if ($subValue['route'] == Route::currentRouteName()) {
                            $this->menuList[$key]['route'][$subKey]['selected'] = true;
                        }
                    }
                }
            } else {
                if ($value['route'] == Route::currentRouteName()) {
                    $this->menuList[$key]['selected'] = true;
                }
            }
        }
        
        /*
        if (Auth::check()) {
            // The user is logged in...
            $this->menuList['Log off'] = 'auth.logout';
        } else {
            // The user is not logged in...
            $this->menuList['Log on'] = 'auth.login';
        }
        */
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
