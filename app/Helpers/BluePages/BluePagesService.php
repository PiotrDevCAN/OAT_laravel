<?php 

namespace App\Helpers\BluePages;

class BluePagesService {

    /**
     * @param $url string   The URL to which the request is to be sent
     * @return \Ixudra\Curl\Builder
     */
//     public function to($url)
//     {
//         $builder = new Builder();

//         return $builder->to($url);
//     }
    
    public function cleanupNotesid($notesid){
        $stepOne =  str_ireplace('CN=','',str_replace('OU=','',str_replace('O=','',$notesid)));
        $location = strpos($stepOne,'@IBM');
        $cleanId = substr($stepOne,0,$location);
        return $cleanId;
    }
    
    public function getDetailsFromIntranetId($intranetId){
        if(empty($intranetId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?byInternetAddr=INTRANET_ID_HERE";
        //echo "<BR/>" . str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url);
        $ch = curl_init ( str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n]/";
            $matches = preg_split ( $pattern, $results [0] );
            foreach($matches as $field){
                $subFields = explode(":", $field,2);
                if(isset($subFields[1])){
                    $details[$subFields[0]] = $subFields[1];
                }
            }
        } else {
            $found = FALSE;
        }
        
        if($found){
            return $details;
        } else {
            return FALSE;
        }        
    }
    
    public function getDetailsFromNotesId($notesId) {
        if(empty($notesId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?allByNotesIDLite=NOTES_ID_HERE%25";
        
        $sp = strpos($notesId,'/O=IBM');
        
        if($sp != FALSE){
            $amendIbm2 = urlencode(trim($notesId));
        } else {
            $amendIbm = str_replace("/IBM","xxxxx",$notesId);
            $amendCC  = str_replace("/","/OU=",$amendIbm);
            $amendIbm2 = str_replace("xxxxx","/O=IBM",$amendCC);
            $amendIbm2 = "CN%3D" . urlencode($amendIbm2);
        }
        $ch = curl_init ( str_replace('NOTES_ID_HERE',$amendIbm2,$url) );
        return self::processDetails($ch);
    }
    
    public function getNotesidFromIntranetId($intranetId){
        if(empty($intranetId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?byInternetAddr=INTRANET_ID_HERE";
        //		echo "<BR/>" . str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url);
        $ch = curl_init ( str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n:]/";
            $matches = preg_split ( $pattern, $results [0] );
            for($cellOffset = 0; $cellOffset < count ( $matches ); $cellOffset ++) {
                $next = $cellOffset+1;
                switch ($matches [$cellOffset]) {
                    
                    case 'CNUM' :
                    case 'INTERNET' :
                    case 'WORKLOC' :
                    case 'NAME' :
                    case 'HRACTIVE':
                    case 'HREMPLOYEETYPE':
                    case 'EMPTYPE':
                    case 'DEPT':
                    case 'HRFAMILYNAME':
                    case 'JOBRESPONSIB' :
                    case 'EMPNUM':
                    case 'EMPCC' :
                    case 'MGRNUM':
                    case 'MGRCC':
                        break;
                    case 'NOTESID':
                        $notesId = trim ( $matches [$cellOffset+1]);
                    default :
                        ;
                        break;
                }
            }
            
        } else {
            $found = FALSE;
        }
        
        if($found){
            return self::cleanupNotesid($notesId);
        } else {
            return FALSE;
        }
    }
    
    public function validateNotesId($notesId) {
        if(empty($notesId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?allByNotesIDLite=NOTES_ID_HERE%25";
        
        $sp = strpos($notesId,'/O=IBM');
        
        if($sp != FALSE){
            $amendIbm2 = urlencode(trim($notesId));
        } else {
            $amendIbm = str_replace("/IBM","xxxxx",$notesId);
            $amendCC  = str_replace("/","/OU=",$amendIbm);
            $amendIbm2 = str_replace("xxxxx","/O=IBM",$amendCC);
            $amendIbm2 = "CN%3D" . urlencode($amendIbm2);
        }
        // echo "<BR/>URL:" . str_replace('NOTES_ID_HERE',$amendIbm2,$url);
        $ch = curl_init ( str_replace('NOTES_ID_HERE',$amendIbm2,$url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n:]/";
            $matches = preg_split ( $pattern, $results [0] );
            for($cellOffset = 0; $cellOffset < count ( $matches ); $cellOffset ++) {
                switch ($matches [$cellOffset]) {
                    case 'CNUM' :
                    case 'INTERNET' :
                    case 'WORKLOC' :
                    case 'NAME' :
                    case 'HRACTIVE':
                    case 'HREMPLOYEETYPE':
                    case 'EMPTYPE':
                    case 'DEPT':
                    case 'HRFAMILYNAME':
                    case 'JOBRESPONSIB' :
                    case 'EMPNUM':
                    case 'EMPCC' :
                    case 'MGRNUM':
                    case 'MGRCC':
                    case 'NOTESID':
                    default :
                        ;
                        break;
                }
            }
            
        } else {
            $found = FALSE;
        }
        return $found;
    }
    
    public function getIntranetIdFromNotesId($notesId) {
        $notesId = strtoupper(trim($notesId));
        if(empty($notesId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?allByNotesIDLite=NOTES_ID_HERE%25";
        
        $sp = strpos($notesId,'/O=IBM');
        
        if($sp != FALSE){
            $amendIbm2 = urlencode(trim($notesId));
        } else {
            $amendIbm = str_replace("/IBM","xxxxx",$notesId);
            $amendCC  = str_replace("/","/OU=",$amendIbm);
            $amendIbm2 = str_replace("xxxxx","/O=IBM",$amendCC);
            $amendIbm2 = "CN%3D" . urlencode($amendIbm2);
        }
        echo "<BR/>URL:" . str_replace('NOTES_ID_HERE',$amendIbm2,$url);
        $ch = curl_init ( str_replace('NOTES_ID_HERE',$amendIbm2,$url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n:]/";
            $matches = preg_split ( $pattern, $results [0] );
            for($cellOffset = 0; $cellOffset < count ( $matches ); $cellOffset ++) {
                switch ($matches [$cellOffset]) {
                    case 'CNUM' :
                    case 'WORKLOC' :
                    case 'NAME' :
                    case 'HRACTIVE':
                    case 'HREMPLOYEETYPE':
                    case 'EMPTYPE':
                    case 'DEPT':
                    case 'HRFAMILYNAME':
                    case 'JOBRESPONSIB' :
                    case 'EMPNUM':
                    case 'EMPCC' :
                    case 'MGRNUM':
                    case 'MGRCC':
                    case 'NOTESID':
                        break;
                    case 'INTERNET' :
                        //						echo "<BR/>" . __METHOD__ . __LINE__ . $cellOffset;
                        //						print_r($matches);
                        $internetId = trim ( $matches [$cellOffset+1]);
                    default :
                        ;
                        break;
                }
            }
            
        } else {
            $found = FALSE;
        }
        if($found){
            return $internetId;
        } else {
            return FALSE;
        }
    }
    
    public function validateIntranetId($intranetId) {
        if(empty($intranetId)){
            return FALSE;
        }
        set_time_limit(120);
        $url = "http://bluepages.ibm.com/BpHttpApisv3/wsapi?byInternetAddr=INTRANET_ID_HERE";
        //echo "<BR/>" . str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url);
        $ch = curl_init ( str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n:]/";
            $matches = preg_split ( $pattern, $results [0] );
            for($cellOffset = 0; $cellOffset < count ( $matches ); $cellOffset ++) {
                switch ($matches [$cellOffset]) {
                    case 'CNUM' :
                    case 'INTERNET' :
                    case 'WORKLOC' :
                    case 'NAME' :
                    case 'HRACTIVE':
                    case 'HREMPLOYEETYPE':
                    case 'EMPTYPE':
                    case 'DEPT':
                    case 'HRFAMILYNAME':
                    case 'JOBRESPONSIB' :
                    case 'EMPNUM':
                    case 'EMPCC' :
                    case 'MGRNUM':
                    case 'MGRCC':
                    case 'NOTESID':
                    default :
                        ;
                        break;
                }
            }
            
        } else {
            $found = FALSE;
        }
        return $found;
    }
    
    public function lookup($cnum) {
        $this->CNUM = $cnum;
        $dept = null;
        
        $ch = curl_init ( str_replace('CNUM_HERE',$this->CNUM,$this->url) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        $this->size = $resultValues [3];
        $this->found = false;
        if ($resultValues [3] > 0) {
            //		echo "<H4>Has Direct Reports - so show them</H4>";
            $this->found = true;
            $pattern = "/[\n:]/";
            $matches = preg_split ( $pattern, $results [0] );
            for($cellOffset = 0; $cellOffset < count ( $matches ); $cellOffset ++) {
                switch ($matches [$cellOffset]) {
                    case 'CNUM' :
                        if($this->mgr){
                            $newPerson = new BPRecord ( trim ( $matches [$cellOffset + 1] ),$this->online, $this->table, $this->mgr );
                            $newPerson->lookup (trim ( $matches [$cellOffset + 1] ));
                            set_time_limit ( 60 );
                            $newPerson->saveToDb ( );
                        }
                    case 'INTERNET' :
                    case 'WORKLOC' :
                    case 'NAME' :
                    case 'HRACTIVE':
                    case 'HREMPLOYEETYPE':
                    case 'EMPTYPE':
                    case 'DEPT':
                    case 'HRFAMILYNAME':
                    case 'JOBRESPONSIB' :
                    case 'EMPNUM':
                    case 'EMPCC' :
                    case 'MGRNUM':
                    case 'MGRCC':
                        if($this->mgr){
                            $this->dept [trim ( $matches [$cellOffset] )] [] = trim ( $matches [$cellOffset + 1] );
                        } else {
                            $this->person [trim ( $matches [$cellOffset] )] = trim ( $matches [$cellOffset + 1] );
                        }
                        break;
                    case 'NOTESID':
                        // Comes like this : CN=Rob Daniel/OU=UK/O=IBM@IBMGB
                        $stripCN = str_replace('CN=','',trim($matches [$cellOffset + 1]));  // Remove the leading CN=
                        $stripOU = str_replace('OU=','',$stripCN);							// Remove the OU=
                        $stripO  = str_replace('O=','',$stripOU);							// Remove the O=
                        $stripAt = substr($stripO,0,strlen($stripO)-6);						// Remove the @IBMGB
                        if($this->mgr){
                            $this->dept [trim ( $matches [$cellOffset] )] [] = $stripAt ;
                        } else {
                            $this->person [trim ( $matches [$cellOffset] )] = $stripAt ;
                        }
                    default :
                        ;
                        break;
                }
            }
        }
    }
    
    public function saveToDb(){
        if($this->mgr){
            $this->saveDeptToDb();
        } else {
            if($this->found){
                $this->savePersonToDb();
            }
        }
    }
    
    public function saveDeptToDb() {
        if (isset ( $this->dept )) {
            //	$sql = " INSERT INTO " . $_SESSION ['prefix'] . "." . $this->table . " ( NAME, SERIAL, COUNTRY_CODE, LOCATION, MGR_SERIAL, MGR_CTRY_CODE, REG_OR_SUBCO, INTERNET, EMPTYPE, HRACTIVE, HREMPLOYEETYPE, DEPT, HRFAMILYNAME, NOTESID, JOBRESPONSIB) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)  ";
            
            //	$preparedInsert = db2_prepare ( $_SESSION ['conn'], $sql );
            $actual = 0;
            foreach ( $this->dept ['NAME'] as $key => $value ) {
                $data [0] = substr ( $value, 0, 50 ); // Name from BP
                $data [1] = substr ( $this->dept ['CNUM'] [$key], 0, 6 ); // 6 Digit Serial
                $data [2] = substr ( $this->dept ['CNUM'] [$key], 6, 3 ); // 3 Digit Country Code
                $data [3] = $this->dept ['WORKLOC'] [$key]; // 3 Digit Work Location
                $data [4] = substr ( $this->CNUM, 0, 6 ); // Mgrs Serial
                $data [5] = substr ( $this->CNUM, 6, 3 ); // Mgrs Country Code
                if (stripos ( $data [0], '*CON' ) === false) {
                    $data [6] = 'R'; // They are a Regular
                } else {
                    $data [6] = 'C'; // They are a Contractor
                }
                $data[7]  = $this->dept['INTERNET'][$key];
                $data[8]  = $this->dept['EMPTYPE'][$key];
                $data[9]  = $this->dept['HRACTIVE'][$key];
                $data[10] = $this->dept['HREMPLOYEETYPE'][$key];
                $data[11] = $this->dept['DEPT'][$key];
                $data[12] = $this->dept['HRFAMILYNAME'][$key];
                $data[13] = $this->dept['NOTESID'][$key];
                $data[14] = $this->dept['JOBRESPONSIB'][$key];
                if ((stripos ( $data [0], '*FUN' ) === false)) { // Don't record the Functional Ids.
                    $rs = db2_execute ( $this->preparedInsert, $data );
                    if (! $rs) {
                        echo "<BR>" . db2_stmt_error ();
                        echo "<BR>" . db2_stmt_errormsg () . "<BR>";
                        echo "<BR> Data :";
                        print_r ( $data );
                        exit ( "Unable to Execute $sql" );
                    }
                    if($this->online){
                        echo "<BR>" . $data [0];
                    }
                    $actual++ ;
                }
                $data = null;
            }
            if($this->online){
                echo "<H2>Saved Department of $this->size ($actual) People for : " . $this->CNUM . "</H2>";
            }
            $rs = DB2_EXEC ( $_SESSION ['conn'], " COMMIT" );
            if (! $rs) {
                print_r ( $_SESSION );
                echo "<BR>" . db2_stmt_error ();
                echo "<BR>" . db2_stmt_errormsg () . "<BR>";
                exit ( "Error in: " . __METHOD__ . " running: COMMIT " );
            }
        }
    }
    
    public function savePersonToDb() {
        $actual = 0;
        $data [0] = substr ( $this->person  ['NAME'], 0, 50 );	 	// Name from BP
        $data [1] = substr ( $this->person  ['EMPNUM'], 0, 6 );		// 6 Digit Serial
        $data [2] = substr ( $this->person  ['EMPCC'], 0, 3 ); 		// 3 Digit Country Code
        $data [3] = $this->person ['WORKLOC'] ; 					// 3 Digit Work Location
        $data [4] = substr ( $this->person  ['MGRNUM'], 0, 6 );  	// Mgrs Serial
        $data [5] = substr ( $this->person  ['MGRCC'], 0, 3 ); 		// Mgrs Country Code
        if (stripos ( $data [0], '*CON' ) === false) {
            $data [6] = 'R'; // They are a Regular
        } else {
            $data [6] = 'C'; // They are a Contractor
        }
        $data[7]  = $this->person['INTERNET'];
        $data[8]  = $this->person['EMPTYPE'];
        $data[9]  = $this->person['HRACTIVE'];
        $data[10] = $this->person['HREMPLOYEETYPE'];
        $data[11] = $this->person['DEPT'];
        $data[12] = $this->person['HRFAMILYNAME'];
        $data[13] = $this->person['NOTESID'];
        $data[14] = $this->person['JOBRESPONSIB'];
        if ((stripos ( $data [0], '*FUN' ) === false)) { // Don't record the Functional Ids.
            $rs = db2_execute ( $this->preparedInsert, $data );
            if (! $rs) {
                echo "<BR>" . db2_stmt_error ();
                echo "<BR>" . db2_stmt_errormsg () . "<BR>";
                echo "<BR> Data :";
                print_r ( $data );
                exit ( "Unable to Execute $sql" );
            }
            $actual++ ;
        }
        $data = null;
        if($this->online){
            echo "<H2>Saved Details for : " . $this->CNUM . " " . $this->person  ['NAME'] . "</H2>";
        }
        //			$rs = DB2_EXEC ( $_SESSION ['conn'], " COMMIT" );
        //			if (! $rs) {
        //				print_r ( $_SESSION );
        //				echo "<BR>" . db2_stmt_error ();
        //				echo "<BR>" . db2_stmt_errormsg () . "<BR>";
        //				exit ( "Error in: " . __METHOD__ . " running: COMMIT " );
        //			}
    }
    
    public function processDetails($ch){
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $m = curl_exec ( $ch );
        
        $pattern = "/# rc/";
        $results = preg_split ( $pattern, $m );
        $pattern = "/[=,]/";
        $resultValues = preg_split ( $pattern, $results [1] );
        
        $size = $resultValues [3];
        $found = false;
        if ($resultValues [3] > 0) {
            $found = true;
            $pattern = "/[\n]/";
            $matches = preg_split ( $pattern, $results [0] );
            foreach($matches as $field){
                $subFields = explode(":", $field,2);
                if(isset($subFields[1])){
                    $details[$subFields[0]] = $subFields[1];
                }
            }
        } else {
            $found = FALSE;
        }
        
        if($found){
            return $details;
        } else {
            return FALSE;
        }
    }
}