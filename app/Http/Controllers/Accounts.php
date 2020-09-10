<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class Accounts extends Controller
{
    
//     switch ($_REQUEST['function']) {
//         case 'edit':
//             $account->setFromArray(array('ACCOUNT'=>$_REQUEST['ACCOUNT'],'LOCATION'=>$_REQUEST['LOCATION']));
//             break;
//         case 'delete':
//             $accountApproTable->deleteData("ACCOUNT='" . trim($_REQUEST['ACCOUNT']) . "' AND LOCATION='" . trim($_REQUEST['LOCATION']) . "' ");
//             break;
//         default:
//             echo "Function " . $_REQUEST['function'] . " not recognised";
//             break;
    
    public function index(Request $request)
    {
        $records = new Account();
        
        if ($request->filled('Account')) {
            $records = $records->where('account', $request->input('Account'));
        };
        
        if ($request->filled('Approver')) {
            $records = $records->where('approver', $request->input('Approver'));
        };
        
        if ($request->filled('Verified')) {
            $records = $records->where('verified', $request->input('Verified'));
        };
        
        if ($request->filled('Location')) {
            $records = $records->where('location', $request->input('Location'));
        };
        
        $records = $records->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
}
