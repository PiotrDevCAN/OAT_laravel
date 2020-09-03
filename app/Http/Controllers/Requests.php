<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

set_time_limit(7200);

class Requests extends Controller
{
    public function create()
    {   
        return view('create');
    }
    
    public function indexNew()
    {
        
        dd($pdo = DB::connection()->getPdo());
        
        $awaiting = \App\Request::where('status', 'like', 'Awaiting%')
            ->limit(10)
            ->get();
        
        $approved = \App\Request::where('status', 'Approved')
            ->limit(10)
            ->get();
        
        $other = \App\Request::where('status',  'not like', 'Awaiting%')
            ->where('status', '<>', 'Approved')
            ->limit(10)
            ->get();
        
        $data = array(
            'awaiting' => $awaiting,
            'approved' => $approved, 
            'other' => $other
        );
        
        return view('index_new', $data);
    }
    
    public function readOnlyIndex()
    {
        $awaiting = \App\Request::where('status', 'like', 'Awaiting%')->limit(10)->get();
        
        $approved = \App\Request::where('status', 'Approved')->limit(10)->get();
        
        $other = \App\Request::where('status',  'not like', 'Awaiting%')
        ->where('status', '<>', 'Approved')
        ->limit(10)
        ->get();
        
        $data = array(
            'awaiting' => $awaiting,
            'approved' => $approved,
            'other' => $other
        );
        
        return view('index_new', $data);
    }
}
