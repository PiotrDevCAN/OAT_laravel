<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class Logs extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('log_entry')) {
            $predicates[] = array('log_entry', '=', $request->input('log_entry'));
        };
        if ($request->filled('last_updated')) {
            $predicates[] = array('last_updated', '=', $request->input('last_updated'));
        };
        if ($request->filled('last_updater')) {
            $predicates[] = array('last_updater', '=', $request->input('last_updater'));
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
