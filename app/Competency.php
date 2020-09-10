<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Competency_Approvers';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
