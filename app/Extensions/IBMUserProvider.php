<?php

namespace App\Extensions;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class IBMUserProvider implements UserProvider
{
    /**
     * The hasher implementation.
     *
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    protected $hasher;
    
    /**
     * The Eloquent user model.
     *
     * @var string
     */
    protected $model;
    
    /**
     * Create a new ibm user provider.
     *
     * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
     * @param  string  $model
     * @return void
     */
    public function __construct(HasherContract $hasher, $model)
    {
        $this->model = $model;
        $this->hasher = $hasher;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        dump('retrieveById');
        
        $model = $this->createModel();
        
//         return $this->newModelQuery($model)
//                     ->where($model->getAuthIdentifierName(), $identifier)
//                     ->first();
        
        $model->name = 'Piotr Tajanowicz';
        $model->email = 'Piotr.Tajanowicz@ibm.com';
        $model->password = 'ABC';
        
        return $model;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        dump('retrieveByToken');
        
        $model = $this->createModel();
        
//         $retrievedModel = $this->newModelQuery($model)->where(
//                 $model->getAuthIdentifierName(), $identifier
//             )->first();
        
        $model->name = 'Piotr Tajanowicz';
        $model->email = 'Piotr.Tajanowicz@ibm.com';
        $model->password = 'ABC';
        
        $retrievedModel = $model;
            if (! $retrievedModel) {
                return;
            }
            
            $rememberToken = $retrievedModel->getRememberToken();
            
            return $rememberToken && hash_equals($rememberToken, $token)
                            ? $retrievedModel : null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Database\Eloquent\Model  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(UserContract $user, $token)
    {
        dump('updateRememberToken');
        
        $user->setRememberToken($token);
        
        $timestamps = $user->timestamps;
        
        $user->timestamps = false;
        
//         $user->save();
        
        $user->timestamps = $timestamps;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        dump('retrieveByCredentials');
        
        if (empty($credentials) ||
            (count($credentials) === 1 &&
                Str::contains($this->firstCredentialKey($credentials), 'password'))) {
                    return;
                }
                
                // First we will add each credential element to the query as a where clause.
                // Then we can execute the query and, if we found a user, return it in a
                // Eloquent User "model" that will be utilized by the Guard instances.
//                 $query = $this->newModelQuery();
                
                foreach ($credentials as $key => $value) {
                    if (Str::contains($key, 'password')) {
                        continue;
                    }
                    
                    if (is_array($value) || $value instanceof Arrayable) {
//                         $query->whereIn($key, $value);
                    } else {
//                         $query->where($key, $value);
                    }
                }
                
//                 return $query->first();
                
                $model = $this->createModel();
                
                $model->name = 'Piotr Tajanowicz';
                $model->email = 'Piotr.Tajanowicz@ibm.com';
                $model->password = 'ABC';
                
                return $model;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        dump('validateCredentials');
        
        $plain = $credentials['password'];
        
        return $this->hasher->check($plain, $user->getAuthPassword());
    }

    /**
     * Get a new query builder for the model instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model|null  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
//     protected function newModelQuery($model = null)
//     {
//         return is_null($model)
//                 ? $this->createModel()->newQuery()
//                 : $model->newQuery();
//     }

    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createModel()
    {
        dump('createModel');
        
        $class = '\\'.ltrim($this->model, '\\');
        
        return new $class;
    }
    
}