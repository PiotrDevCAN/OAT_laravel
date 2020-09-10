<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TraceControl extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Trace_Control';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
