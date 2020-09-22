<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OvertimeRequest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//         $record = new OvertimeRequest;

//         $allAccounts = Account::accounts();

//         $allVerified = Account::verified();

//         $allLocations = Account::locations();

//         $allCompetencies = Competency::competencies();

//         $allImports = OvertimeRequest::imports();

//         $allRecoverable = OvertimeRequest::recoverables();

//         $allNatures = OvertimeRequest::natures();

//         $allWeekends = array(
//             //
//         );

//         $data = array(
//             'record' => $record,
//             'allAccounts' => $allAccounts,
//             'allVerified' => $allVerified,
//             'allCompetencies' => $allCompetencies,
//             'allLocations' => $allLocations,
//             'allImports' => $allImports,
//             'allRecoverable' => $allRecoverable,
//             'allNatures' => $allNatures,
//             'allWeekends' => $allWeekends
//         );

//         return view('components.request.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        

//         $record = OvertimeRequest::findOrFail($ref);

//         $allAccounts = Account::accounts();

//         $allVerified = Account::verified();

//         $allLocations = Account::locations();

//         $allCompetencies = Competency::competencies();

//         $allImports = OvertimeRequest::imports();

//         $allRecoverable = OvertimeRequest::recoverables();

//         $allNatures = OvertimeRequest::natures();

//         $allWeekends = array(
//             //
//         );

//         $data = array(
//             'record' => $record,
//             'allAccounts' => $allAccounts,
//             'allVerified' => $allVerified,
//             'allCompetencies' => $allCompetencies,
//             'allLocations' => $allLocations,
//             'allImports' => $allImports,
//             'allRecoverable' => $allRecoverable,
//             'allNatures' => $allNatures,
//             'allWeekends' => $allWeekends
//         );

//         return view('components.request.update', $data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//     public function approve(Request $request, $ref, $lvl, $status, $via)
//     {

//     }

//     public function reject(Request $request, $ref, $lvl, $status, $via)
//     {

//     }
}
