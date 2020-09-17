<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

set_time_limit(7200);

class Requests extends Controller
{
    public $conditions = array();
    
    private function prepareConditions($request){
        
        if ($request->filled('Account')) {
            $this->conditions[] = array('account', '=', $request->input('Account'));
        };
        if ($request->filled('Reason')) {
            $this->conditions[] = array('reason', '=', $request->input('Reason'));
        };
        if ($request->filled('Name')) {
            $this->conditions[] = array('name', '=', $request->input('Name'));
        };
        if ($request->filled('Type')) {
            $this->conditions[] = array('type', '=', $request->input('Type'));
        };
        
        if ($request->filled('ServiceLine')) {
            $this->conditions[] = array('competency', '=', $request->input('ServiceLine'));
        };
        if ($request->filled('Status')) {
            $this->conditions[] = array('status', '=', $request->input('Status'));
        };
        if ($request->filled('Requestor')) {
            $this->conditions[] = array('requestor', '=', $request->input('Requestor'));
        };
        if ($request->filled('Location')) {
            $this->conditions[] = array('location', '=', $request->input('Location'));
        };
        
        if ($request->filled('WeekendStart')) {
            $this->conditions[] = array('weekenddate', '>=', $request->input('WeekendStart'));
        };
        if ($request->filled('WeekendEnd')) {
            $this->conditions[] = array('weekenddate', '<=', $request->input('WeekendEnd'));
        };
        if ($request->filled('Import')) {
            $this->conditions[] = array('import', '=', $request->input('Import'));
        };
        
        if ($request->filled('FirstApprover')) {
            $this->conditions[] = array('approver_first_level', '=', $request->input('FirstApprover'));
        };
        if ($request->filled('SecondApprover')) {
            $this->conditions[] = array('approver_second_level', '=', $request->input('SecondApprover'));
        };
        if ($request->filled('ThirdApprover')) {
            $this->conditions[] = array('approver_third_level', '=', $request->input('ThirdApprover'));
        };
    }
    
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
    
    public function update($id)
    {
        $request = \App\Request::findOrFail($id);
//         dump($request);
        
        $cc = 'UK';
        
        $allAccounts = \App\Account::select('APPROVER','ACCOUNT')
            ->where('location', $cc)
            ->get();
        
        $allVerified = \App\Account::select('VERIFIED','ACCOUNT')
            ->where('location', $cc)
            ->get();
        
        $allCompetencies = \App\Competency::select('APPROVER','COMPETENCY')
            ->get();
        
        $allLocations = \App\Account::select('LOCATION')
            ->where('verified', '=', 'Yes')
            ->get();
        
        $allImports = array(
            'Yes',
            'No'
        );
        
        $allRecoverable = array(
            'Yes' => 'Y',
            'No' => 'N',
            'Delivery Centre' => 'D'
        );
        
        $allNatures = array (
            "Service Out of Hours",
            "Compliance",
            "RFS/Revenue",
            "RFS Schedule",
            "Hol/Sickness Cover",
            "T&T",
            "Delivery Centre Load Balancing",
            "Other"
        );
        
        $allWeekends = array(
            'value' => 'Yes',
            'value' => 'No'
        );
        
        $data = array(
            'allAccounts' => $allAccounts,
            'allVerified' => $allVerified,
            'allCompetencies' => $allCompetencies,
            'allLocations' => $allLocations,
            'allImports' => $allImports,
            'allRecoverable' => $allRecoverable,
            'allNatures' => $allNatures,
            'allWeekends' => $allWeekends
        );
        
        $collectionA = collect($allLocations);
        
        $collectionB = $collectionA->collect();
        
        dump($allLocations);
        
        dump($collectionA->all());
        
        dump($collectionB->all());
        
        dd('end');
        
        return view('components.request.update', $data);
    }
    
    public function index(Request $request)
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
        
        $this->prepareConditions($request);
        
        $awaitingQuery = \App\Request::where('status', 'like', 'Awaiting%')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($this->conditions);
        
        $approvedQuery = \App\Request::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($this->conditions);
        
        $otherQuery = \App\Request::where('status',  'not like', 'Awaiting%')
            ->where('status', '<>', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($this->conditions);

        $data = array(
            'awaiting' => $awaitingQuery->get(),
            'awaitingHours' => $awaitingQuery->sum('hours'),
            'approved' => $approvedQuery->get(), 
            'approvedHours' => $approvedQuery->sum('hours'),
            'other' => $otherQuery->get(),
            'otherHours' => $otherQuery->sum('hours')
        );

        return view('components.request.index', $data);
    }
    
    public function approvedList(Request $request)
    {
        $this->prepareConditions($request);
        
        $approvedQuery = \App\Request::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07');
            
        $data = array(
            'awaiting' => null,
            'awaitingHours' => 0,
            'approved' => $approvedQuery->get(),
            'approvedHours' => $approvedQuery->sum('hours'),
            'other' => null,
            'otherHours' => 0
        );
        
        return view('components.request.index', $data);
    }
}
