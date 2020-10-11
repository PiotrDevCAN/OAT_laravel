<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class IBMUser implements UserContract
{
    /**
     * All of the user's attributes.
     *
     * @var array
     */
    protected $attributes;
    
    public function getAuthIdentifier()
    {
        return $this->attributes[$this->getAuthIdentifierName()];
    }

    public function getRememberToken()
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    public function getAuthIdentifierName()
    {
        return 'cnum';
    }
}

