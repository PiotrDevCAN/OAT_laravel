<?php

namespace App\Extensions;

use Illuminate\Auth\GenericUser;

class IBMUser extends GenericUser
{
    public function getAuthIdentifierName()
    {
        dump('createModel');
        
        return 'cnum';
    }
    
//     public function getAuthIdentifier()
//     {
//         dump('createModel');
        
//         return 'IBM';
//     }
    
//     public function getAuthPassword()
//     {
//         dump('createModel');
        
//         return 'ABC';
//     }
    
//     public function getRememberToken()
//     {
//         dump('createModel');
        
//         return 'ABC';
//     }
    
//     public function setRememberToken($value)
//     {
//         dump('createModel');
        
//         return 'ABC';
//     }
    
//     public function getRememberTokenName()
//     {
//         dump('createModel');
        
//         return 'ABC';
//     }
}
