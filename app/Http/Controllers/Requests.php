<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

set_time_limit(7200);

class Requests extends Controller
{
    public function create()
    {   
        $approved = \App\Request::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->get();
        
        $recoverable = array(
            'value' => 'Y',
            'value' => 'N',
            'value' => 'D'
        );
        
        $allNatures = array (
            "value" => "Service Out of Hours",
            "value" => "Compliance",
            "value" => "RFS/Revenue",
            "value" => "RFS Schedule",
            "value" => "Hol/Sickness Cover",
            "value" => "T&T",
            "value" => "Delivery Centre Load Balancing",
            "value" => "Other"
        );
        
        $data = array(
            'recoverable' => $recoverable,
            'allNatures' => $allNatures,
            'logEntries' => $approved
        );
        
        return view('components.request.create', $data);
    }
    
    public function index()
    {
        /*
        parent::getVals ();
        
        $sql = " SELECT REFERENCE, ACCOUNT, COMPETENCY, NATURE, TITLE, DETAILs, WEEKENDDATE, WORKER, LEFT(SERIAL,6) as SERIAL, RIGHT(SERIAL,3) as COUNTRY, HOURS, STATUS, APPROVER_FIRST_LEVEL, APPROVER_FIRST_LEVEL_TS, APPROVER_SECOND_LEVEL, APPROVER_SECOND_LEVEL_TS,APPROVER_THIRD_LEVEL, APPROVER_THIRD_LEVEL_TS, REQUESTOR, SUPERCEDES, SUPERCEDEDBY, LOCATION, CLAIM_ACC_ID, CREATED_TS  ";
        $sql .= " from " . $_SESSION ['prefix'] . ".REQUESTS_VIEW ";
        
        // echo "<br/>Admin :" . $this->administrator . "Comp:" .  $this->competency;
        
        if ($predicateParm != null) {
            $predicate = " WHERE DELETE_FLAG is null " . trim ( $predicateParm );
            $predicate = str_replace ( 'WHERE AND', 'WHERE ', $predicate );
            if (! $this->administrator and (! $this->competency)) {
                $predicate .= " AND (UPPER(REQUESTOR)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_FIRST_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_SECOND_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_THIRD_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(WORKER)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "')) ";
            }
            $sql .= $predicate;
            
        } elseif ((! $this->administrator) and (! $this->competency)) {
            $sql .= " WHERE UPPER(REQUESTOR)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_FIRST_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_SECOND_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') OR UPPER(APPROVER_THIRD_LEVEL)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "')  OR UPPER(WORKER)=UPPER('" . $GLOBALS ['ltcuser'] ['mail'] . "') ";
        }
        
        $sql .= " ORDER BY $this->col $this->ord ";
        
        // 		echo "<BR/>SQL is: $sql";
        
        
        $rs = db2_exec ( $_SESSION ['conn'], $sql );
        
        if (! $rs) {
            exit ( db2_stmt_error () . db2_stmt_errormsg () . "<BR/>Error in  " . __METHOD__ . ": $rs : $sql" );
        }
        
        return $rs;
        */
        
//         $cacheKey = md5($_SESSION['prefix'].'awaiting');
//         $awaiting = Cache::get($cacheKey);
        
//         $cacheKey = md5($_SESSION['prefix'].'approved');
//         $approved = Cache::get($cacheKey);
        
//         $cacheKey = md5($_SESSION['prefix'].'other');
//         $other = Cache::get($cacheKey);
        
//         $selectCheck = $this->memcache->get($cacheKey);
//         if($selectCheck === false){
//             $counter = 0;
//             $sql = "SELECT COUNT(DISTINCT MASTER_COOKBOOK.REF) AS COUNTER FROM " . AllTables::$MASTER_COOKBOOK . " MASTER_COOKBOOK";
            
//             $sql .= $this->addPredicate($userPredicate, $active);
            
//             $stmt = db2_prepare($_SESSION['conn'], $sql);
//             $result = db2_execute ( $stmt );
//             if ($result) {
//                 while (db2_fetch_row($stmt)) {
//                     $counter = db2_result($stmt, 'COUNTER');
//                 }
//             }
            
//             $this->memcache->set($cacheKey, $counter, MEMCACHE_COMPRESSED, 3600);
//         } else {
//             $counter = $this->memcache->get($cacheKey);
//         }
        
        
        
        $awaiting = \App\Request::where('status', 'like', 'Awaiting%')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->get();
        
        $approved = \App\Request::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->get();
        
        $other = \App\Request::where('status',  'not like', 'Awaiting%')
            ->where('status', '<>', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->get();
        
        $data = array(
            'awaiting' => $awaiting,
            'approved' => $approved, 
            'other' => $other
        );
        
        return view('index', $data);
    }
    
    public function readOnlyIndex()
    {
        $approved = \App\Request::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->get();
        
        $data = array(
            'approved' => $approved
        );
        
        return view('index', $data);
    }
}
