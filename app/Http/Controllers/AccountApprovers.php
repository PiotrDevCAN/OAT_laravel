<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountApprovers extends Controller
{
    public function index()
    {
        $records = \App\AccountApprover::get();

        $data = array(
            'records' => $records
        );
        
        return view('account.index', $data);
    }
}
