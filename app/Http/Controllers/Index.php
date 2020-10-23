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
        
        
        
// Create the configuration array.
        $config = [
            // Mandatory Configuration Options
            'hosts'            => ['ldap://bluepages.ibm.com'],
            'base_dn'          => 'ou=bluepages,o=ibm.com',
            'username'         => '',
            'password'         => '',
            
            // Optional Configuration Options
//             'schema'           => Adldap\Schemas\ActiveDirectory::class,
//             'account_prefix'   => 'ACME-',
//             'account_suffix'   => '@acme.org',
            'port'             => 389,
            'follow_referrals' => false,
            'use_ssl'          => false,
            'use_tls'          => false,
            'version'          => 3,
            'timeout'          => 5,
            
            // Custom LDAP Options
            'custom_options'   => [
                // See: http://php.net/ldap_set_option
                LDAP_OPT_X_TLS_REQUIRE_CERT => LDAP_OPT_X_TLS_HARD
            ]
        ];
        
        
        
        $ad = new Adldap\Adldap();
        
        $connectionName = 'my-connection';
        
        $ad->addProvider($config, $connectionName);
        
        try {
            $provider = $ad->connect($connectionName);
            
            // Great, we're connected!
        } catch (Adldap\Auth\BindException $e) {
            // Failed to connect.
        }
        
        dump('BlueGroups facade test');
        BlueGroups::getTest('Piotr.Tajanowicz@ibm.com');
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
