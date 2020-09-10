<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delegate;

class Delegates extends Controller
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
        
        if ($request->filled('UserIntranet')) {
            $records = $records->where('user_intranet', $request->input('UserIntranet'));
        };
        
        if ($request->filled('DelegateIntranet')) {
            $records = $records->where('delegate_intranet', $request->input('DelegateIntranet'));
        };
        
        if ($request->filled('DelegateNotesId')) {
            $records = $records->where('delegate_notesid', $request->input('DelegateNotesId'));
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
