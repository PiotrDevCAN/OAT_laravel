<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Competencies extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $competency
     * @param  string  $approver
     * @return \Illuminate\Http\Response
     */
    public function show($competency, $approver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $competency
     * @param  string  $approver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $competency, $approver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $competency
     * @param  string  $approver
     * @return \Illuminate\Http\Response
     */
    public function destroy($competency, $approver)
    {
        //
    }
}
