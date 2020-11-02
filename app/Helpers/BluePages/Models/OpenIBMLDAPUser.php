<?php

namespace App\Helpers\BluePages\Models;

use Adldap\Models\User;

class OpenIBMLDAPUser extends User
{
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getObjectGuid();
    }
}