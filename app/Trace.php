<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Trace';
    
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
    protected $fillable = ['log_entry', 'lastupdater', 'lastupdated', 'class', 'method', 'page', 'elapsed'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
