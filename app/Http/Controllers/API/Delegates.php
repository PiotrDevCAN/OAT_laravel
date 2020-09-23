<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delegates extends Controller
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
     * @param  string  $user_intranet
     * @param  string  $delegate_intranet
     * @return \Illuminate\Http\Response
     */
    public function show($user_intranet, $delegate_intranet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $user_intranet
     * @param  string  $delegate_intranet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_intranet, $delegate_intranet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $user_intranet
     * @param  string  $delegate_intranet
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_intranet, $delegate_intranet)
    {
        //
    }
}
