<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class Logs extends Controller
{
    public function index(Request $request)
    {
        $records = new Log();
        
        if ($request->filled('LogEntry')) {
            $records = $records->where('log_entry', $request->input('LogEntry'));
        };
        
        if ($request->filled('LastUpdated')) {
            $records = $records->where('last_updated', $request->input('LastUpdated'));
        };
        
        if ($request->filled('LastUpdater')) {
            $records = $records->where('last_updater', $request->input('LastUpdater'));
        };
        
        $records = $records
            ->limit(100)
            ->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.log.index', $data);
    }
}
