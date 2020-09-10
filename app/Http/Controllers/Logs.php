<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class Logs extends Controller
{
    public function index(Request $request)
    {
        $records = new Log();
        
        if ($request->filled('Account')) {
            $records = $records->where('account', $request->input('Account'));
        };
        
        if ($request->filled('Approver')) {
            $records = $records->where('approver', $request->input('Approver'));
        };
        
        if ($request->filled('Verified')) {
            $records = $records->where('verified', $request->input('Verified'));
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
