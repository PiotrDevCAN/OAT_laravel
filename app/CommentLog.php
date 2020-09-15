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
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
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
    
    /**
     * Get the commentLog record associated with the commentLog.
     */
    public function comments()
    {
        return $this->hasOne('App\Comment', 'reference', 'comment');
    }
    
    /**
     * Get the request that owns the commentLog.
     */
    public function request()
    {
        return $this->belongsTo('App\Request', 'comment', 'request');
    }
}
