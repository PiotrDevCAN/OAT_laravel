<?php 

namespace App\Helpers\BluePagesCurl;

class BluePagesService {

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
        // echo "<BR/>" . str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url);
        $ch = curl_init ( str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url) );
        return self::processDetails($ch);        
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
		// echo "<BR/>" . str_replace('INTRANET_ID_HERE',urlencode($intranetId),$url);
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