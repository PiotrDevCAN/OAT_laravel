<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetencyApprovers extends Controller
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
    
    public function index()
    {
        $records = \App\CompetencyApprover::get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
    }
}
