<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IndexEntered;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BluePages\Facades\BluePages;
use App\Helpers\BlueGroups\Facades\BlueGroups;
use App\Helpers\BlueGroupsManage\Facades\BlueGroupsManage;

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
        
//         dump('BluePages facade test');
//         dump(BluePages::getDetailsFromIntranetId('Piotr.Tajanowicz@ibm.com'));
//         dump(BluePages::getDetailsFromNotesId('Piotr Tajanowicz/Poland/IBM'));
        
        dump('BlueGroups facade test');
        BlueGroups::getTest('Piotr.Tajanowicz@ibm.com');
//         BlueGroups::user_auth('Piotr.Tajanowicz@ibm.com', 'je324jbhj32ref32fd');
        
//         dump('BlueGroupsManage facade test');
//         BlueGroupsManage::getUID('Piotr.Tajanowicz@ibm.com');
        
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
