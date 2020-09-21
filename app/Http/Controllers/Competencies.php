<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competency;

class Competencies extends Controller
{
    public $conditions = array();
    
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
        if ($request->filled('ServiceLine')) {
            $this->conditions[] = array('competency', '=', $request->input('ServiceLine'));
        };
        if ($request->filled('Approver')) {
            $this->conditions[] = array('approver', '=', $request->input('Approver'));
        };
        
        $records = Competency::where($this->conditions)->get();
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
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
