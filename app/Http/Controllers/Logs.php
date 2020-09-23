<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class Logs extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('LogEntry')) {
            $predicates[] = array('log_entry', '=', $request->input('LogEntry'));
        };
        if ($request->filled('LastUpdated')) {
            $predicates[] = array('last_updated', '=', $request->input('LastUpdated'));
        };
        if ($request->filled('LastUpdater')) {
            $predicates[] = array('last_updater', '=', $request->input('LastUpdater'));
        };
        
        return $predicates;
    }
    
    public function index(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $records = Log::where($predicates)
            ->limit(100)
            ->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.log.index', $data);
    }
}
