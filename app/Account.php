<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Account_Approvers';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
