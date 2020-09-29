<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OvertimeRequest;
use App\Models\Competency;
use App\Models\Account;
use App\Events\OvertimeRequestApproved;
use App\Events\OvertimeRequestRejected;

class OvertimeRequests extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // single update
//         $flight = App\Flight::find(1);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        // mass update
//         App\Flight::where('active', 1)
//             ->where('destination', 'San Diego')
//             ->update(['delayed' => 1]);
        
        return view('components.request.store');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(OvertimeRequest $overtimeRequest)
    {
        
        // Retrieve a model by its primary key...
//         $flight = App\Flight::find(1);
        
//         $record = new OvertimeRequest();
        
        $allAccounts = Account::accounts();
        $allVerified = Account::verified();
        $allLocations = Account::locations();
        $allCompetencies = Competency::competencies();
        $allImports = OvertimeRequest::imports();
        $allRecoverable = OvertimeRequest::recoverables();
        $allNatures = OvertimeRequest::natures();
        $allWeekends = array(
            //
        );
        
        $data = array(
            'record' => $overtimeRequest,
            'allAccounts' => $allAccounts,
            'allVerified' => $allVerified,
            'allCompetencies' => $allCompetencies,
            'allLocations' => $allLocations,
            'allImports' => $allImports,
            'allRecoverable' => $allRecoverable,
            'allNatures' => $allNatures,
            'allWeekends' => $allWeekends
        );
        
        return view('components.request.show', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OvertimeRequest $overtimeRequest)
    {
        return view('components.request.update');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(OvertimeRequest $overtimeRequest)
    {
        
        // destroy action
//         App\Flight::destroy(1);
        
        return view('components.request.destroy');
    }
    
    public function approve(Request $request, $ref, $lvl, $status, $via)
    {
//         $user = User::withoutEvents(function () use () {
//             User::findOrFail(1)->delete();
            
//             return User::find(2);
//         });

        // Request approval logic...
        
        event(new OvertimeRequestApproved($overtimeRequest));
        
    }

    public function reject(Request $request, $ref, $lvl, $status, $via)
    {
//         $user = User::withoutEvents(function () use () {
//             User::findOrFail(1)->delete();
            
//             return User::find(2);
//         });
        
        // Request rejection logic...
        
        event(new OvertimeRequestRejected($overtimeRequest));
        
    }
}
