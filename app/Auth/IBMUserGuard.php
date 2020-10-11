<?php

namespace App\Auth;

use Illuminate\Auth\GenericUser;

class IBMUserGuard extends GenericUser
{
    public function getAuthIdentifierName()
    {
        dump('createModel');
        
        return 'cnum';
    }
}
