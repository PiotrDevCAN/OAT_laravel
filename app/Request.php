<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Requests';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'reference';
    
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
    protected $fillable = ['name'];
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
//     protected $connection = 'ibmi';
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    /**
     * Get all of the Comments for the request.
     */
    public function allComments()
    {
        return $this->hasOneThrough(
            'App\Comment',      // Owner
            'App\CommentLog',   // Car
            'reference', // Foreign key on cars table...
            'reference', // Foreign key on owners table...
            'reference', // Local key on mechanics table...
            'request' // Local key on cars table...
        );
        /*
        return $this->hasManyThrough(
            'App\Comment',      // Post
            'App\CommentLog',   // User
            'request', // Foreign key on users table...
            'reference', // Foreign key on posts table...
            'reference', // Local key on countries table...
            'request' // Local key on users table...
        );
        */
//         return $this->hasOneThrough('App\Comment', 'App\CommentLog');
//         return $this->hasManyThrough('App\Comment', 'App\CommentLog');
    }
    
    /**
     * Get the commentLog record associated with the request.
     */
    public function commentLogs()
    {
        return $this->hasOne('App\CommentLog', 'request', 'reference');
    }
    
}
