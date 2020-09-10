<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competency;

class Competencies extends Controller
{
//     if(isset($_REQUEST['function'])){
//         switch($_REQUEST['function']){
//             case "delete":
//                 if(isset($_REQUEST['COMPETENCY']))	{ Competency::deleteFromDb($_REQUEST['COMPETENCY']);} else {echo "<BR> No competency specified";}
//                 break;
//             case "add":
//                 if(isset($_REQUEST['COMPETENCY']) && isset($_REQUEST['APPROVER']))	{ Competency::insertToDb($_REQUEST['COMPETENCY'],$_REQUEST['APPROVER']);} else {echo "<BR> No competency/approver specified";}
//                 break;
//             case "save":
//                 if(isset($_REQUEST['COMPETENCY']) && isset($_REQUEST['APPROVER']))	{ Competency::deleteFromDb($_REQUEST['COMPETENCY']);} else {echo "<BR> Please specifiy competency and approver.";}
//                 if(isset($_REQUEST['COMPETENCY']) && isset($_REQUEST['APPROVER']))	{ Competency::insertToDb($_REQUEST['COMPETENCY'],$_REQUEST['APPROVER']);} else {echo "<BR> No competency/approver specified";}
//                 break;
//             case "edit";
//             break;
//             default :
//                 echo "Unknown function requested : " .  $_REQUEST['function'];
//         }
//     }
    
    public function index(Request $request)
    {
        $records = new Competency();
        
        if ($request->filled('ServiceLine')) {
            $records = $records->where('competency', $request->input('ServiceLine'));
        };
        
        if ($request->filled('Approver')) {
            $records = $records->where('approver', $request->input('Approver'));
        };
        
        $records = $records->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
    }
}
