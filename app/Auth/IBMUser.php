<?php

namespace App\Auth;

use Illuminate\Auth\GenericUser;

class IBMUser extends GenericUser
{
    public function getAuthIdentifierName()
    {
        dump('createModel');
        
        return 'cnum';
    }
}
