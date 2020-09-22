<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Account;

class Accounts extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('Account')) {
            $predicates[] = array('account', '=', $request->input('Account'));
        };
        if ($request->filled('Approver')) {
            $predicates[] = array('approver', '=', $request->input('Approver'));
        };
        if ($request->filled('Verified')) {
            $predicates[] = array('verified', '=', $request->input('Verified'));
        };
        if ($request->filled('Location')) {
            $predicates[] = array('location', '=', $request->input('Location'));
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
        
        $records = Account::where($predicates)
            ->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Account();
        
        $data = array();
        
        return view('components.account.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $account
     * @param  string  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($account, $location)
    {
        $model = Account::where('account', $account)
            ->where('location', $location);
        
        $data = array();
        
        return view('components.account.edit', $data);
    }
}
