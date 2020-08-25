<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('main');
    }
    
    public function access()
    {
        $data = array(
            
        );
        
        var_dump(\PDO::getAvailableDrivers());
        
        return view('access', $data);
    }
}
