<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Comments';
    
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
    protected $fillable = ['reference', 'text', 'creator', 'created'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    /**
     * Get the user that owns the phone.
     */
    public function getCommentLog()
    {
        return $this->belongsTo(CommentLog::class, 'comment', 'reference');
    }
}
