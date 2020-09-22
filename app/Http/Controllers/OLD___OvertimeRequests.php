<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OvertimeRequest;
use App\Competency;
use App\Account;

set_time_limit(7200);

class OvertimeRequests extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('Account')) {
            $predicates[] = array('account', '=', $request->input('Account'));
        };
        if ($request->filled('Reason')) {
            $predicates[] = array('reason', '=', $request->input('Reason'));
        };
        if ($request->filled('Name')) {
            $predicates[] = array('name', '=', $request->input('Name'));
        };
        if ($request->filled('Type')) {
            $predicates[] = array('type', '=', $request->input('Type'));
        };
        
        if ($request->filled('ServiceLine')) {
            $predicates[] = array('competency', '=', $request->input('ServiceLine'));
        };
        if ($request->filled('Status')) {
            $predicates[] = array('status', '=', $request->input('Status'));
        };
        if ($request->filled('Requestor')) {
            $predicates[] = array('requestor', '=', $request->input('Requestor'));
        };
        if ($request->filled('Location')) {
            $predicates[] = array('location', '=', $request->input('Location'));
        };
        
        if ($request->filled('WeekendStart')) {
            $predicates[] = array('weekenddate', '>=', $request->input('WeekendStart'));
        };
        if ($request->filled('WeekendEnd')) {
            $predicates[] = array('weekenddate', '<=', $request->input('WeekendEnd'));
        };
        if ($request->filled('Import')) {
            $predicates[] = array('import', '=', $request->input('Import'));
        };
        
        if ($request->filled('FirstApprover')) {
            $predicates[] = array('approver_first_level', '=', $request->input('FirstApprover'));
        };
        if ($request->filled('SecondApprover')) {
            $predicates[] = array('approver_second_level', '=', $request->input('SecondApprover'));
        };
        if ($request->filled('ThirdApprover')) {
            $predicates[] = array('approver_third_level', '=', $request->input('ThirdApprover'));
        };
        
        return $predicates;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $overtimeRequest = new OvertimeRequest;
        
        $data = array(
            'awaiting' => $overtimeRequest->awaiting($predicates),
            'awaitingHours' => $overtimeRequest->sumAwaitingHours($predicates),
            
            'approved' => $overtimeRequest->approved($predicates),
            'approvedHours' => $overtimeRequest->sumApprovedHours($predicates),
            
            'other' => $overtimeRequest->other($predicates),
            'otherHours' => $overtimeRequest->sumOtherHours($predicates)
        );
        
        return view('components.request.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.request.create');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\OvertimeRequest  $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(OvertimeRequest $overtimeRequest)
    {
        return view('components.request.show');
    }
    
    public function approvedList(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $overtimeRequest = new OvertimeRequest;
        
        $data = array(
            'approved' => $overtimeRequest->approved($predicates),
            'approvedHours' => $overtimeRequest->sumApprovedHours($predicates)
        );
        
        return view('components.request.approved', $data);
    }
}
