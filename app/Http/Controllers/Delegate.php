<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Delegate extends Controller
{
    public function index()
    {
        $records = \App\Delegate::get();
        
        $data = array(
            'records' => $records
        );
        
        return view('delegate.index', $data);
    }
    
    public function delegate()
    {
        $data = array(
            
        );
        
        return view('myDelegates', $data);
    }
}
