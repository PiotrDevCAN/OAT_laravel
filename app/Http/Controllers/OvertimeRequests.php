<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OvertimeRequest;
use App\Competency;
use App\Account;

set_time_limit(7200);

class OvertimeRequests extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('Account')) {
            $predicates[] = array('account', '=', $request->input('Account'));
        };
        if ($request->filled('Reason')) {
            $predicates[] = array('reason', '=', $request->input('Reason'));
        };
        if ($request->filled('Name')) {
            $predicates[] = array('name', '=', $request->input('Name'));
        };
        if ($request->filled('Type')) {
            $predicates[] = array('type', '=', $request->input('Type'));
        };
        
        if ($request->filled('ServiceLine')) {
            $predicates[] = array('competency', '=', $request->input('ServiceLine'));
        };
        if ($request->filled('Status')) {
            $predicates[] = array('status', '=', $request->input('Status'));
        };
        if ($request->filled('Requestor')) {
            $predicates[] = array('requestor', '=', $request->input('Requestor'));
        };
        if ($request->filled('Location')) {
            $predicates[] = array('location', '=', $request->input('Location'));
        };
        
        if ($request->filled('WeekendStart')) {
            $predicates[] = array('weekenddate', '>=', $request->input('WeekendStart'));
        };
        if ($request->filled('WeekendEnd')) {
            $predicates[] = array('weekenddate', '<=', $request->input('WeekendEnd'));
        };
        if ($request->filled('Import')) {
            $predicates[] = array('import', '=', $request->input('Import'));
        };
        
        if ($request->filled('FirstApprover')) {
            $predicates[] = array('approver_first_level', '=', $request->input('FirstApprover'));
        };
        if ($request->filled('SecondApprover')) {
            $predicates[] = array('approver_second_level', '=', $request->input('SecondApprover'));
        };
        if ($request->filled('ThirdApprover')) {
            $predicates[] = array('approver_third_level', '=', $request->input('ThirdApprover'));
        };
        
        return $predicates;
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
            
        $predicates = $this->preparePredicates($request);
        
        $overtimeRequest = new OvertimeRequest;
        
        $data = array(
            'awaiting' => $overtimeRequest->awaiting($predicates),
            'awaitingHours' => $overtimeRequest->sumAwaitingHours($predicates),
            
            'approved' => $overtimeRequest->approved($predicates),
            'approvedHours' => $overtimeRequest->sumApprovedHours($predicates),
            
            'other' => $overtimeRequest->other($predicates),
            'otherHours' => $overtimeRequest->sumOtherHours($predicates)
        );
        
        return view('components.request.index', $data);
    }
    
    public function approvedList(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $overtimeRequest = new OvertimeRequest;
        
        $data = array(
            'approved' => $overtimeRequest->approved($predicates),
            'approvedHours' => $overtimeRequest->sumApprovedHours($predicates)
        );
        
        return view('components.request.approved', $data);
    }
    
    public function create()
    {
        $record = new OvertimeRequest;
        
        $allAccounts = Account::accounts();
        
        $allVerified = Account::verified();
        
        $allLocations = Account::locations();
        
        $allCompetencies = Competency::competencies();
        
        $allImports = OvertimeRequest::imports();
        
        $allRecoverable = OvertimeRequest::recoverables();
        
        $allNatures = OvertimeRequest::natures();
        
        $allWeekends = array(
            //
        );
        
        $data = array(
            'record' => $record,
            'allAccounts' => $allAccounts,
            'allVerified' => $allVerified,
            'allCompetencies' => $allCompetencies,
            'allLocations' => $allLocations,
            'allImports' => $allImports,
            'allRecoverable' => $allRecoverable,
            'allNatures' => $allNatures,
            'allWeekends' => $allWeekends
        );
        
        return view('components.request.create', $data);
    }
    
    public function update($ref)
    {
        $record = OvertimeRequest::findOrFail($ref);
        
        $allAccounts = Account::accounts();
        
        $allVerified = Account::verified();
        
        $allLocations = Account::locations();
        
        $allCompetencies = Competency::competencies();
        
        $allImports = OvertimeRequest::imports();
        
        $allRecoverable = OvertimeRequest::recoverables();
        
        $allNatures = OvertimeRequest::natures();
        
        $allWeekends = array(
            //
        );
        
        $data = array(
            'record' => $record,
            'allAccounts' => $allAccounts,
            'allVerified' => $allVerified,
            'allCompetencies' => $allCompetencies,
            'allLocations' => $allLocations,
            'allImports' => $allImports,
            'allRecoverable' => $allRecoverable,
            'allNatures' => $allNatures,
            'allWeekends' => $allWeekends
        );
        
        return view('components.request.update', $data);
    }
    
    public function delete($ref)
    {
        
    }
    
    public function approve(Request $request, $ref, $lvl, $status, $via)
    {
        
    }
    
    public function reject(Request $request, $ref, $lvl, $status, $via)
    {
        
    }
}
