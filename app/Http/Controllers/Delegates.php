<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Delegates extends Controller
{
    public $conditions = array();
    
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
        if ($request->filled('UserIntranet')) {
            $this->conditions[] = array('user_intranet', '=', $request->input('UserIntranet'));
        };
        if ($request->filled('DelegateIntranet')) {
            $this->conditions[] = array('delegate_intranet', '=', $request->input('DelegateIntranet'));
        };
        if ($request->filled('DelegateNotesId')) {
            $this->conditions[] = array('delegate_notesid', '=', $request->input('DelegateNotesId'));
        };
        
        $records = \App\Delegate::where($this->conditions)->get();
        
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
    
    public function update($ref)
    {
        //
    }
    
    public function delete($ref)
    {
        //
    }
}
