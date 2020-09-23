<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Locations';
    
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
    protected $fillable = ['location', 'shore'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
