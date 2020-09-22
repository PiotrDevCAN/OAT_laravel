<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competency;

class Competencies extends Controller
{
    
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('ServiceLine')) {
            $predicates[] = array('competency', '=', $request->input('ServiceLine'));
        };
        if ($request->filled('Approver')) {
            $predicates[] = array('approver', '=', $request->input('Approver'));
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
        
        $records = Competency::where($predicates)->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Competency();
        
        $data = array();
        
        return view('components.competency.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $competency
     * @param  string  $approver
     * @return \Illuminate\Http\Response
     */
    public function edit($competency, $approver)
    {
        $model = Competency::where('competency', $competency)
            ->where('approver', $approver);
        
        $data = array(
            'record' => $model
        );
        
        return view('components.competency.edit', $data);
    }
}
