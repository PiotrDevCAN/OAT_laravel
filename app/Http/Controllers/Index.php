<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IndexEntered;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BluePagesCurl\Facades\BluePages;
use App\Helpers\BlueGroupsCurl\Facades\BlueGroups;
use App\Helpers\BlueGroupsCurl\Facades\BlueGroupsCurl;
use App\Helpers\BluePagesCurl\Facades\BluePagesCurl;

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
//         dump(config('session.driver'));
        
        // Page enter logic...
        
        dump('BluePagesCurl facade test');
        dump(BluePagesCurl::getDetailsFromIntranetId('Piotr.Tajanowicz@ibm.com'));
        dump(BluePagesCurl::getDetailsFromNotesId('Piotr Tajanowicz/Poland/IBM'));
        
        dump('BlueGroupsCurl facade test');
        BlueGroupsCurl::getDetailsFromNotesId('abc');
        
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
        
        $data = array(
            'user' => $user
        );
        
        return view('access', $data);
    }
}
