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
    
    public function index(Request $request)
    {
        $records = \App\AccountApprover::get();

        if ($request->has('account')) {
            $records = $records->where('account', $request->input('account'));
        };
        
        if ($request->has('approver')) {
            $records = $records->where('approver', $request->input('approver'));
        };
        
        if ($request->has('verified')) {
            $records = $records->where('verified', $request->input('verified'));
        };
        
        if ($request->has('location')) {
            $records = $records->where('location', $request->input('location'));
        };
        
        $data = array(
            'request' => $request,
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
}
