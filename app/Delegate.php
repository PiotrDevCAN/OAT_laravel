<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Delegate';
    
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
    protected $fillable = ['user_intranet', 'delegate_intranet', 'delegate_notesid'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
}
