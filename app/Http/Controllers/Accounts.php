<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Account;

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
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account, $account_name, $location)
    {
        $model = $delegate->whereAccount($account_name)
            ->whereLocation($location)
            ->firstOrFail();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.account.edit', $data);
    }
}
