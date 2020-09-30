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
        
        $assinged = \App\Models\Tribe::where('squad_assignment_unique_squad_name', 'UKI-ACCOUNT-AB ACQUISITIONS HOLDINGS LIMITED-CLIENT-1')
            ->orderBy('squad_assignment_unique_squad_name', 'desc')
            ->take(10)
            ->get();
        
        dump($assinged);
        
        $assinged2 = \App\Models\SquadAssignment::where('unique_name', 'UKI-ACCOUNT-AB ACQUISITIONS HOLDINGS LIMITED-CLIENT-1')
            ->orderBy('unique_name', 'desc')
            ->take(10)
            ->get();
        
        dump($assinged2);
        
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
