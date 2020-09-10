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
}
