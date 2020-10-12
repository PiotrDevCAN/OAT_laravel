<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IndexEntered;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        
        foreach(array_keys(config('auth.guards')) as $guard){
            
            if(auth()->guard($guard)->check()) dump($guard);
            
        }
        
        
        $assinged = \App\Models\Tribe::where('squad_assignment_unique_squad_name', 'UKI-ACCOUNT-AB ACQUISITIONS HOLDINGS LIMITED-CLIENT-1')
            ->orderBy('squad_assignment_unique_squad_name', 'desc')
            ->take(10)
            ->get();
        
        $assinged2 = \App\Models\SquadAssignment::where('unique_name', 'UKI-ACCOUNT-AB ACQUISITIONS HOLDINGS LIMITED-CLIENT-1')
            ->orderBy('unique_name', 'desc')
            ->take(10)
            ->get();
        
        Cache::put('key', $assinged);
        
        Cache::put('key2', $assinged2);
        
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
        // Get the currently authenticated user...
        $user = Auth::user();
        dump($user);
        
        $data = array(
            'user' => $user
        );
        
        return view('access', $data);
    }
}
