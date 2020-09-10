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
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account', 'approver', 'last_updater', 'last_updated', 'verified', 'location'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
