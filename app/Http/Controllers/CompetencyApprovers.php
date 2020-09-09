<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetencyApprovers extends Controller
{
    public function index()
    {
        $records = \App\CompetencyApprover::get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
    }
}
