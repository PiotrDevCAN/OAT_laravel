<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delegate;

class Delegates extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('UserIntranet')) {
            $predicates[] = array('user_intranet', '=', $request->input('UserIntranet'));
        };
        if ($request->filled('DelegateIntranet')) {
            $predicates[] = array('delegate_intranet', '=', $request->input('DelegateIntranet'));
        };
        if ($request->filled('DelegateNotesId')) {
            $predicates[] = array('delegate_notesid', '=', $request->input('DelegateNotesId'));
        };
        
        return $predicates;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $records = Delegate::where($predicates)
            ->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.delegate.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Delegate();
        
        $data = array();
        
        return view('components.delegates.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $user_intranet
     * @param  string  $delegate_intranet
     * @return \Illuminate\Http\Response
     */
    public function edit($user_intranet, $delegate_intranet)
    {
        $model = Delegate::where('user_intranet', $user_intranet)
            ->where('delegate_intranet', $delegate_intranet);
        
        $data = array(
            'record' => $model
        );
        
        return view('components.delegates.edit', $data);
    }
    
    public function my()
    {
        $data = array(
            
        );
        
        return view('myDelegates', $data);
    }
}
