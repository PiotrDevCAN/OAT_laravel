<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentLog extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Comment_Log';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'request';
    
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
    protected $fillable = ['request', 'comment'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
