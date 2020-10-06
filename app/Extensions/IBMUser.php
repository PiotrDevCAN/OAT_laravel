<?php

namespace App\Extensions;
 
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class IBMUser implements UserContract
{
    /**
     * All of the user's attributes.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create a new generic IBMUser object.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes)
    {
        dump(this);
        
        $this->attributes = $attributes;
    }
    
    public function getAuthIdentifierName()
    {
        dump('createModel');
        
        return '';
    }
    
    public function getAuthIdentifier()
    {
        dump('createModel');
        
        return 'ABC';
    }
    
    public function getAuthPassword()
    {
        dump('createModel');
        
        return 'ABC';
    }
    
    public function getRememberToken()
    {
        dump('createModel');
        
        return 'ABC';
    }
    
    public function setRememberToken($value)
    {
        dump('createModel');
        
        return 'ABC';
    }
    
    public function getRememberTokenName()
    {
        dump('createModel');
        
        return 'ABC';
    }
}
