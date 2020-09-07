<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Request;

class Filters extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $accounts = \App\Request::select('account')->distinct()->get();
        $reasons = \App\Request::select('nature')->distinct()->get();
        $names = \App\Request::select('worker')->distinct()->get();
        $types = \App\Request::select('approvaltype')->distinct()->get();
        
        
        $serviceLines = \App\Request::select('competency')->distinct()->get();
        $statuses = \App\Request::select('status')->distinct()->get();
        $requestors = \App\Request::select('requestor')->distinct()->get();
        $locations = \App\Request::select('location')->distinct()->get();
        
        $weekenddates = \App\Request::select('weekenddate')->distinct()->get();
        $imports = \App\Request::select('import')->distinct()->get();
        
        $firstApprovers = \App\Request::select('approver_first_level')
            ->where('approver_first_level', '<>', '')
            ->distinct()
            ->get();
        
        $secondApprovers = \App\Request::select('approver_second_level')
            ->where('approver_second_level', '<>', '')
            ->distinct()
            ->get();
        
        $thirdApprovers = \App\Request::select('approver_third_level')
            ->where('approver_third_level', '<>', '')
            ->distinct()
            ->get();
        
        $data = array(
            'accounts' => $accounts,
            'reasons' => $reasons,
            'names' => $names,
            'types' =>  $types,
            
            'serviceLines' => $serviceLines,
            'statuses' => $statuses,
            'requestors' => $requestors,
            'locations' => $locations,
            
            'weekenddates' =>$weekenddates,
            'imports' =>$imports,
            
            'firstApprovers' => $firstApprovers,
            'secondApprovers' => $secondApprovers,
            'thirdApprovers' => $thirdApprovers
        );
        
        return view('components.filters', $data);
    }
}
