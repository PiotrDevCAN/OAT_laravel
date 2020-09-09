<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
    
    public function index()
    {
        $records = \App\Delegate::get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.delegate.index', $data);
    }
    
    public function delegate()
    {
        $data = array(
            
        );
        
        return view('myDelegates', $data);
    }
}
