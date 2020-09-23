<?php

namespace App\Models;

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
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trace_control_type', 'trace_control_value'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
