<?php 

namespace App\Helpers\BlueGroups;

use Adldap\AdldapInterface;

class BlueGroupsService {

    /**
     * @var Adldap
     */
    protected $ldap;
    
    function __construct(AdldapInterface $ldap)
    {
        $this->ldap = $ldap;
        
        //clear any error values
//         define('IIP_AUTH_ERRNO', 0);
//         define('IIP_LDAP_ERRNO', 0);
    }
    
    // #
    // # error handling functions for IIP and Bluegroups
    // #
    
    /*
     * Interesting LDAP errno:
     * 48 - Inappropriate authentication (password struck out)
     * 49 - Invalid credentials (bad password)
     * 81 - Can't contact LDAP server (bind / connection failure)
     */
    
    // returns the error for an iip errno. note that iip
    // errno is not standard across different platforms
    /*
    function iip_auth_err2str()
    {
        if (! defined('IIP_AUTH_ERRNO'))
            return FALSE;
            $error = array(
                0 => "Success",
                1 => "Connect to host failed",
                2 => "Not registered",
                3 => "LDAP error",
                4 => "No record found",
                5 => "Multiple records found",
                6 => "Invalid credentials",
                7 => "Group does not exist",
                8 => "User not in group"
            );
            return $error[IIP_AUTH_ERRNO];
    }
    */
    
    /*
    // returns the error for an ldap errno
    function iip_ldap_err2str()
    {
        if (! defined('IIP_LDAP_ERRNO'))
            return FALSE;
            return ldap_err2str(IIP_LDAP_ERRNO);
    }
    */
    
    /*
    // handles ldap error display page
    function do_ldap_error()
    {
        $error_doc = $GLOBALS['w3php']['error_doc'];
        if (defined('IIP_LDAP_ERRNO')) {
            $msg = "LDAP error \"" . $this->iip_ldap_err2str() . "\"";
            if (isset($_SERVER['PHP_AUTH_USER']) && trim($_SERVER['PHP_AUTH_USER']) != "") {
                $msg .= " for user id \"" . trim($_SERVER['PHP_AUTH_USER']) . "\"";
            }
            _log_auth($msg);
        }
        include_once ($error_doc . 'ldap.html');
        //include ('templates/footer.html'); // Include the footer.
        exit();
    }
    */
    
    /*
    // handles authentication error display page
    function do_auth_error()
    {
        $error_doc = $GLOBALS['w3php']['error_doc'];
        
        $user = isset($_SERVER['PHP_AUTH_USER']) ? trim($_SERVER['PHP_AUTH_USER']) : "";
        $pass = isset($_SERVER['PHP_AUTH_PW']) ? trim($_SERVER['PHP_AUTH_PW']) : "";
        $group = defined('IIP_AUTH_GROUP') ? IIP_AUTH_GROUP : "unknown";
        
        if (IIP_AUTH_ERRNO == 7 || IIP_AUTH_ERRNO == 8) {
            _log_auth("Failed authorization for \"$user\" for group \"$group\"");
            include_once ($error_doc . '403.html');
        } else {
            // log details of failed authentication
            if ($user != $pass && $user != "") {
                $msg = "Failed authentication for \"$user\"";
                if ($pass == "") {
                    _log_auth("$msg (empty password)");
                } elseif (defined('IIP_AUTH_ERRNO')) {
                    _log_auth("$msg (" . $this->iip_auth_err2str() . ")");
                } else {
                    _log_auth($msg);
                }
            }
            include_once ($error_doc . '401.html');
        }
        //include ('templates/footer.html'); // Include the footer.
        exit();
    }
    */
        
    /*
     // setups ldap connection resource and keeps it active
     // until the script ends. the same connection is used
     // for both user_auth() and group_auth()
     function _ldaps_connect()
     {
         global $w3php;
         // use a previously opened connection
         if (isset($GLOBALS['ibm_ldaps_ds']) && is_resource($GLOBALS['ibm_ldaps_ds'])) {
         return $GLOBALS['ibm_ldaps_ds'];
         }
         
         // setup the ldap resource
         if (! $ds = @ldap_connect($w3php['ldaps_host'])) {
         define("IIP_LDAP_ERRNO", 0);
         define("IIP_AUTH_ERRNO", 1);
         return FALSE;
         }
         
         // use ldap protocol v3
         if (! @ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {
         define("IIP_LDAP_ERRNO", ldap_errno($ds));
         define("IIP_AUTH_ERRNO", 3);
         return FALSE;
         }
         
         $GLOBALS['ibm_ldaps_ds'] = $ds;
         return $ds;
     }
     */

    /*
    // make an OR filter from an array of values
    function _make_filter($value, $attr)
    {
        $filter = "";
        foreach ($value as $v) {
            $filter .= "($attr=$v)";
        }
        if (sizeof($value) > 1) {
            $filter = "(|$filter)";
        }
        return $filter;
    }
    */
    
    /*
    // returns an array of all uniquegroup attriubtes for all
    // groups in the $group array or returns false
    function _get_subgroups($group)
    {
        // make a filter
        if (! is_array($group))
            $group = array(
                $group
            );
            $filter = $this->_make_filter($group, 'cn');
            $filter = "(&(objectclass=groupofuniquenames)(uniquegroup=*)$filter)";
            
            // setup ldap resource
            if (! $ds = $this->_ldaps_connect()) {
                return FALSE;
            } else {
                $basedn = "ou=memberlist,ou=ibmgroups,o=ibm.com";
                
                // do the search
                if (! $sr = @ldap_search($ds, $basedn, $filter, array(
                    'uniquegroup'
                ))) {
                    return FALSE;
                }
                
                // check if sub group are present
                if (@ldap_count_entries($ds, $sr) == 0) {
                    return FALSE;
                }
                
                // build a new filter from the sub-groups found
                $subgroup = array();
                for ($entry = ldap_first_entry($ds, $sr); $entry != FALSE; $entry = ldap_next_entry($ds, $entry)) {
                    
                    $val = ldap_get_values($ds, $entry, 'uniquegroup');
                    for ($i = 0; $i < $val['count']; $i ++) {
                        list ($cn, ) = ldap_explode_dn($val[$i], 1);
                        $subgroup[] = stripslashes($cn);
                    }
                }
                return array_unique($subgroup);
            }
    }
    */
    
    /*
    // internal funciton used to connect to ED server
    function _ldap_connect($host = "ldap://bluepages.ibm.com/")
    {
        // use a previously opened connection
        if (isset($GLOBALS['ibm_ldap_ds']) && is_resource($GLOBALS['ibm_ldap_ds'])) {
            return $GLOBALS['ibm_ldap_ds'];
        }
        
        // setup the ldap resource
        if (! $ds = @ldap_connect($host)) {
            $GLOBALS['ibm_ldap_errno'] = ldap_errno($ds);
            return FALSE;
        }
        
        // use ldap protocol v3
        if (! @ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {
            $GLOBALS['ibm_ldap_errno'] = ldap_errno($ds);
            return FALSE;
        }
        $GLOBALS['ibm_ldap_ds'] = $ds;
        return $ds;
    }
    */
    
    public function getTest($email){
        
        dump($this->ldap);
        
        return $email;
    }
    
    // do bluegroups check, if needed
    function checkBluegroup($group=null){
        if ($group) {
//             define('IIP_AUTH_GROUP', trim($group));
            //  check for group cached response
            //             if (! in_array($group, $GLOBALS['ltcuser']['groups'])) {
            //  search bluegroups
            $result = $this->group_auth($GLOBALS['ltcuser']['dn'], $group);
            if (defined('IIP_AUTH_ERRNO') && IIP_AUTH_ERRNO == 3) {
                $this->do_ldap_error();
            }
            
            // check for an auth failure and bail
            if (! $result) {
                $this->do_auth_error();
            }
            
            // cache the results in session
            $GLOBALS['ltcuser']['groups'][] = $group;
            $_SESSION['ltcuser'] = $GLOBALS['ltcuser'];
            //             }
        }
    }
    
    // bool result = group_auth (string user_dn, mixed group, [string depth])
    // given a DN, check all $groups and return TRUE or FALSE
    // $group can be either an array of groups names or string of the group to check
    // set $depth to 0 to check only the top level group
    function group_auth($user_dn, $group, $depth = 2)
    {
        // setup ldap connection resource
        if (! is_array($group)) {
            $group = array(
                $group
            );
        }
        $basedn = "ou=memberlist,ou=ibmgroups,o=ibm.com";
//         if (! $ds = $this->_ldaps_connect()) {
//             return FALSE;
//         } else {
           
            // check this $group and all subgroups for $dn
            $result = FALSE;
            while ($depth >= 0) {
                // filter to look for $dn in $group list
                $filter = $this->_make_filter($group, 'cn');
                $filter = "(&(objectclass=groupofuniquenames)(uniquemember=$user_dn)$filter)";
                
                // connect, bind and search for $dn in $group
                if (! $sr = @ldap_search($ds, $basedn, $filter, array(
                    'cn'
                ))) {
//                     define("IIP_LDAP_ERRNO", ldap_errno($ds));
//                     define("IIP_AUTH_ERRNO", 3);
                    break;
                }
                // bail out if $dn is found in this $group list
                if (@ldap_count_entries($ds, $sr) > 0) {
                    $result = TRUE;
                    break;
                }
                // bail out if there are no sub-groups
                if (! $group = $this->_get_subgroups($group)) {
                    break;
                }
                $depth --;
            }
            if ($result == FALSE && defined('IIP_LDAP_ERRNO') == FALSE) {
//                 define("IIP_LDAP_ERRNO", 0);
//                 define("IIP_AUTH_ERRNO", 8);
            }
            return $result;
//         }
    }
    
    // array result = user_auth(userid, password)
    // Verify the userid and password given are valid in Bluepages
    // returns an array of user information on success or FALSE on
    // failure.
    function user_auth($user, $pass)
    {
//         global $w3php;
        $user = trim($user);
        $pass = trim($pass);
        // handle php magic quotes (evil!)
        if (get_magic_quotes_gpc()) {
            $pass = stripslashes($pass);
            $user = stripslashes($user);
        }
        $filter = "(&(mail=" . $user . ")(objectclass=ibmPerson))";
        
        // empty user id
        if ($user == "") {
//             define("IIP_LDAP_ERRNO", 0);
//             define("IIP_AUTH_ERRNO", 4);
            return FALSE;
        }
        
        // empty password
        if ($pass == "") {
//             define("IIP_LDAP_ERRNO", 0);
//             define("IIP_AUTH_ERRNO", 6);
            return FALSE;
        }
        
        // setup ldaps resource
        if (! $ds = $this->_ldaps_connect()) {
            return FALSE;
        } else {
            // connect, bind, and search for $user
            if (! $sr = @ldap_search($ds, $w3php['ldap_basedn'], $filter, $w3php['ldap_attr'])) {
//                 define("IIP_LDAP_ERRNO", ldap_errno($ds));
//                 define("IIP_AUTH_ERRNO", 3);
                return FALSE;
            }
            
            // retrive the first entry (if any)
            if (! $entry = @ldap_first_entry($ds, $sr)) {
//                 define("IIP_LDAP_ERRNO", 0);
//                 define("IIP_AUTH_ERRNO", 4);
                return FALSE;
            }
            
            // authenticated bind using $user_dn and $pass
            $user_dn = @ldap_get_dn($ds, $entry);
            if (! @ldap_bind($ds, $user_dn, $pass)) {
//                 define("IIP_LDAP_ERRNO", ldap_errno($ds));
//                 define("IIP_AUTH_ERRNO", 6);
                return FALSE;
            }
            
            // while we have it, return an array of info
            $user = array(
                'dn' => $user_dn
            );
            foreach ($w3php['ldap_attr'] as $a) {
                $val = @ldap_get_values($ds, $entry, $a);
                $user[$a] = ($val) ? $val[0] : null;
            }
            
            // close and return
            return $user;
        }
    }
    
    # return an array of groups $employee is in.  $employee can be a DN or
    # an email address.
    
    function employee_bluegroups($employee) {
        if (strpos($employee, "@") == TRUE) {
            # lookup the DN from an email address
            if (! $record = $this->bluepages_search("(mail=$employee)") ) { return FALSE; }
            $user_dn = key($record);
        } elseif (strpos($employee, "=") == TRUE) {
            # use the DN given
            $user_dn = $employee;
        } else {
            # passed something we don't know how to handle
            return FALSE;
        }
        
        # setup ldap connection
        if ( ! $ds = _ldap_connect() ) return FALSE;
        $filter = "(uniquemember=" . $user_dn . ")";
        $basedn = "ou=ibmgroups,o=ibm.com";
        
        # connect, bind, and search
        if (!$sr = @ldap_search($ds, $basedn, $filter, array('cn'))) {
            return FALSE;
        }
        
        # bail out if there aren't any groups (unlikely)
        if (@ldap_count_entries($ds, $sr) == 0) return FALSE;
        
        # build an array of groups found
        $groups = array();
        for ($entry = ldap_first_entry($ds, $sr); $entry != FALSE;
        $entry = ldap_next_entry($ds, $entry)) {
            
            $val = ldap_get_values($ds, $entry, 'cn');
            array_push($groups, $val[0]);
        }
        return $groups;
    }
    
    # search bluepages using an ldap filter
    # array bluepages_search ( mixed filter, array attr)
    # $filter can be a string or an array of strings to search on
    # $attr is an array of ldap attributes to return for each record
    # returns FALSE or an array of results keyed by DN
    # WARNING: only the first value of an attribute is returned
    
    function bluepages_search($filter, $attr = null, $key_attr = 'dn') {
        # setup filter array, attr list, and base dn
        if ( ! is_array($filter) ) $filter = array($filter);
        $basedn = "ou=bluepages,o=ibm.com";
        $attr = ($attr) ? $attr : array('cn', 'mail', 'uid');
        //fb($attr);
        # make sure $key is in attr array or we cannot use it
        if ( $key_attr != 'dn' && ! in_array($key_attr, $attr) ) $attr[] = $key_attr;
        
        # setup ldap connection
        //fb('before connect');
        if ( ! $ds = _ldap_connect() ) return FALSE;
        //fb('after connect');
        # connect, bind and do a parallel search
        $conn = array_fill(0, sizeof($filter), $ds);
        $search_result = ldap_search($conn, $basedn, $filter, $attr);
        
        # process each of the search results
        $result = array();
        foreach ($search_result as $sr) {
            
            # check to see if we have hits for this result
            if (@ldap_count_entries($ds, $sr) == 0) continue;
            
            # get the values of each entry found
            for ($entry = @ldap_first_entry($ds, $sr); $entry != FALSE;
            $entry = @ldap_next_entry($ds, $entry)) {
                
                # get the dn of this entry, always
                $dn = @ldap_get_dn($ds, $entry);
                
                # get the hash key
                if ($key_attr && $key_attr != 'dn') {
                    $key_val = @ldap_get_values($ds, $entry, $key_attr);
                    $key_val = ($key_val) ? $key_val[0] : $dn;
                } else {
                    $key_val = $dn;
                    
                }
                
                # put the dn into the result hash
                $result[$key_val]['dn'] = $dn;
                
                # get each attr, missing attrs are stored as null values
                foreach ($attr as $a) {
                    $val = @ldap_get_values($ds, $entry, $a);
                    $result[$key_val][$a] = ($val) ? $val[0] : null;
                }
            }
        }
        return $result;
    }
}