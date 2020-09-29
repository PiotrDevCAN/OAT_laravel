<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IndexEntered;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Page enter logic...
        
        event(new IndexEntered());
        
        return view('main');
    }
    
    public function admin()
    {
        return view('admin');
    }
    
    public function access()
    {
        return view('access');
    }
}
