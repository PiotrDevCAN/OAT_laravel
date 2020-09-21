<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Account;

class Accounts extends Controller
{
    public $conditions = array();
    
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
        if ($request->filled('Account')) {
            $this->conditions[] = array('account', '=', $request->input('Account'));
        };
        if ($request->filled('Approver')) {
            $this->conditions[] = array('approver', '=', $request->input('Approver'));
        };
        if ($request->filled('Verified')) {
            $this->conditions[] = array('verified', '=', $request->input('Verified'));
        };
        if ($request->filled('Location')) {
            $this->conditions[] = array('location', '=', $request->input('Location'));
        };
        
        $records = Account::where($this->conditions)->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
    
    public function update($ref)
    {
        //
    }
    
    public function delete($ref)
    {
        //
    }
}
