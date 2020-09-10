<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logs extends Controller
{
    public $conditions = array();
    
    public function index(Request $request)
    {
        if ($request->filled('LogEntry')) {
            $this->conditions[] = array('log_entry', '=', $request->input('LogEntry'));
        };
        if ($request->filled('LastUpdated')) {
            $this->conditions[] = array('last_updated', '=', $request->input('LastUpdated'));
        };
        if ($request->filled('LastUpdater')) {
            $this->conditions[] = array('last_updater', '=', $request->input('LastUpdater'));
        };
        
        $records = \App\Log::where($this->conditions)->limit(100)->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.log.index', $data);
    }
}
