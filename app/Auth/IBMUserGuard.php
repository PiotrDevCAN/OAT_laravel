<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class IBMUserGuard implements StatefulGuard
{
    /**
     * @var null|Authenticatable|User
     */
    protected $user;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * OpenAPIGuard constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function viaRemember()
    {}

    public function check(): bool
    {
        return (bool)$this->user();
    }

    public function login(Authenticatable $user, $remember = false)
    {}

    public function attempt(array $credentials = [], $remember = false)
    {}

    public function onceUsingId($id)
    {}

    public function loginUsingId($id, $remember = false)
    {}

    public function logout(): void
    {
        if ($this->user) {
            $this->setUser(null);
        }
    }

    public function once(array $credentials = [])
    {}

    public function guest(): bool
    {
        return !$this->check();
    }

    public function id(): ?int
    {
        $user = $this->user();
        return $user->id ?? null;
    }

    public function setUser(?Authenticatable $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function user(): ? User
    {
        return $this->user ?: $this->signInWithPin();
    }

    public function validate(array $credentials = []): bool
    {
        throw new \BadMethodCallException('Unexpected method call');
    }
    
    public function authenticate(): User
    {
        $user = $this->user();
        if ($user instanceof User) {
            return $user;
        }
        throw new AuthenticationException();
    }

    protected function signInWithPin(): ? User
    {
        // Implement your logic here
        // Return User on success, or return null on failure
    }
}
