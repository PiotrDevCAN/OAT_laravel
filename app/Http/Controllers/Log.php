<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Log extends Controller
{
    public function index()
    {
        $records = \App\Log::limit(100)
            ->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('log.index', $data);
    }
}
