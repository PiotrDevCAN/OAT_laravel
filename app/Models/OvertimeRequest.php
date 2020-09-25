<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OvertimeRequest extends Model
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
    
    public static function imports()
    {
        return collect(array(
            'Yes',
            'No'
        ));
    }
    
    public static function recoverables()
    {
        return collect(array(
            'Y' => 'Yes',
            'N' => 'No',
            'D' => 'Delivery Centre'
        ));
    }
    
    public static function natures()
    {
        return collect(array (
            "Service Out of Hours",
            "Compliance",
            "RFS/Revenue",
            "RFS Schedule",
            "Hol/Sickness Cover",
            "T&T",
            "Delivery Centre Load Balancing",
            "Other"
        ));
    }
    
    /**
     * Get the commentLog record associated with the request.
     */
    public function commentLog()
    {
        return $this->hasOne('App\CommentLog', 'request');
    }
    
    /**
     * Get the commentLog record associated with the request.
     */
    public function commentLogs()
    {
        return $this->hasMany('App\CommentLog', 'request', 'reference');
    }
    
    /**
     * Get the Comment for the request.
     */
    public function comment()
    {
        return $this->hasOneThrough(
            'App\Models\Comment',
            'App\Models\CommentLog',
            'request', // Foreign key on cars table...
            'reference', // Foreign key on owners table...
            'reference', // Local key on mechanics table...
            'comment' // Local key on cars table...
        );
    }
    
    /**
     * Get all of the Comments for the request.
     */
    public function comments()
    {
        return $this->hasManyThrough(
            'App\Models\Comment',
            'App\Models\CommentLog',
            'request', // Foreign key on cars table...
            'reference', // Foreign key on owners table...
            'reference', // Local key on mechanics table...
            'comment' // Local key on cars table...
            );
    }
    
    public function awaiting($predicates)
    {
        return $this::where('status', 'like', 'Awaiting%')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->get();
    }
    
    public function sumAwaitingHours($predicates)
    {
        return $this::where('status', 'like', 'Awaiting%')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->sum('hours');
    }
    
    public function approved($predicates)
    {
        return $this::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->get();
    }
    
    public function sumApprovedHours($predicates)
    {
        return $this::where('status', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->sum('hours');
    }
    
    public function other($predicates)
    {
        return $this::where('status',  'not like', 'Awaiting%')
            ->where('status', '<>', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->get();
    }
    
    public function sumOtherHours($predicates)
    {
        return $this::where('status',  'not like', 'Awaiting%')
            ->where('status', '<>', 'Approved')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-08-07')
            ->where($predicates)
            ->sum('hours');
    }
}