<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountApprovers extends Controller
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
    
    public function index()
    {
        $records = \App\AccountApprover::get();

        $data = array(
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
}
