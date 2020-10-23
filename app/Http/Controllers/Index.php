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
use Adldap\AdldapInterface;
use Adldap\Laravel\Facades\Adldap;

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
        
//         dump(AdldapInterface::class);
        
        // Finding a user:
//         $user = Adldap::search()->users()->find('john doe');
//         dump($user);
        
        // Searching for a user:
//         $search = Adldap::search()->where('cn', '=', 'John Doe')->get();
//         dump($search);
        
        // LDAP variables
//         $ldapuri = "ldap://bluepages.ibm.com:389";  // your ldap-uri
        
        // Connecting to LDAP
//         $ldapconn = ldap_connect($ldapuri)
//         or die("That LDAP-URI was not parseable");
        
        dump('BlueGroups facade test');
        BlueGroups::getTest('Piotr.Tajanowicz@ibm.com');
        
        dump(config('ldap.connections.default.settings.hosts'));
        
//         BlueGroups::user_auth('Piotr.Tajanowicz@ibm.com', 'je324jbhj32ref32fd');
        
//         dump('BlueGroupsManage facade test');
//         BlueGroupsManage::getUID('Piotr.Tajanowicz@ibm.com');
        
//         event(new IndexEntered());
        
//         dump(app());
        
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
