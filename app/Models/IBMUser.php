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
    
    /**
     * Create a new generic User object.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAuthIdentifierName()
    {
        return 'cnum';
    }

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

    /**
     * Dynamically access the user's attributes.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->attributes[$key];
    }
    
    /**
     * Dynamically set an attribute on the user.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
    
    /**
     * Dynamically check if a value is set on the user.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }
    
    /**
     * Dynamically unset a value on the user.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }
}

