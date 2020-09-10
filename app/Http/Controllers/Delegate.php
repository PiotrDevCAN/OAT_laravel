<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delegate;

class Delegate extends Controller
{
    
//     save
    
//     if(isset($_REQUEST['mode']) and isset($_REQUEST['DELEGATE_INTRANET'])){
//         if($_REQUEST['mode']=='delete'){
//             DelegateTable::deleteDelegate($_REQUEST['DELEGATE_INTRANET'],false);
//         }
//     }elseif(isset($_REQUEST['DELEGATE_INTRANET'])){
//         DelegateTable::insertDelegate($_REQUEST['DELEGATE_INTRANET'],$_REQUEST['DELEGATE_NOTESID']);
//     }
    
    
    public function index(Request $request)
    {
        $records = new Delegate();
        
        if ($request->filled('Account')) {
            $records = $records->where('account', $request->input('Account'));
        };
        
        if ($request->filled('Approver')) {
            $records = $records->where('approver', $request->input('Approver'));
        };
        
        if ($request->filled('Verified')) {
            $records = $records->where('verified', $request->input('Verified'));
        };
        
        $records = $records->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.delegate.index', $data);
    }
    
    public function my()
    {
        $data = array(
            
        );
        
        return view('myDelegates', $data);
    }
}
