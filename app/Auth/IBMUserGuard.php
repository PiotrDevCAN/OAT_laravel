<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;

class IBMUserGuard implements StatefulGuard
{
    public function viaRemember()
    {}

    public function check()
    {}

    public function login(Authenticatable $user, $remember = false)
    {}

    public function attempt(array $credentials = [], $remember = false)
    {}

    public function onceUsingId($id)
    {}

    public function loginUsingId($id, $remember = false)
    {}

    public function logout()
    {}

    public function once(array $credentials = [])
    {}

    public function guest()
    {}

    public function id()
    {}

    public function setUser(Authenticatable $user)
    {}

    public function user()
    {}

    public function validate(array $credentials = [])
    {}

}
