<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Email_Log';
    
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
    protected $fillable = ['record_id', 'to', 'cc', 'subject', 'message', 'replyto', 'result', 'enabled', 'creator', 'created'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
