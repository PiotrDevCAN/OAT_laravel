<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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
    protected $fillable = [
        'requestor',
        'requested',
        'competency',
        'approvaltype',
        'title',
        'account',
        'weekenddate',
        'nature',
        'details',
        'worker',
        'serial',
        'hours',
        'status',
        'rejection',
        'supercedes',
        'supercededby',
        'claim_acc_id',
        'approver_first_level',
        'approver_first_level_ts',
        'approver_second_level',
        'approver_second_level_ts',
        'approver_third_level',
        'approver_third_level_ts',
        'location',
        'recoverable',
        'delete_flag',
        'created_ts',
        'import',
        'approval_first_level_via',
        'approval_second_level_via',
        'approval_third_level_via',
        'approval_mode',
        'approver_squad_leader',
        'approver_tribe_leader'
    ];
    
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
    
    public static function accounts()
    {
        $data = Cache::remember('OvertimeRequest.accounts', 33660, function()
        {
            return self::where('account', '<>', '')
                ->distinct()
                ->get();
        });
    
        return $data;
    }
    
    public static function workers()
    {
        $data = Cache::remember('OvertimeRequest.workers', 33660, function()
        {
            return self::where('worker', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function approvalTypes()
    {
        $data = Cache::remember('OvertimeRequest.approvalTypes', 33660, function()
        {
            return self::where('approvaltype', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function competencies()
    {
        $data = Cache::remember('OvertimeRequest.competencies', 33660, function()
        {
            return self::where('competency', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function statuses()
    {
        $data = Cache::remember('OvertimeRequest.statuses', 33660, function()
        {
            return self::where('status', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function requestors()
    {
        $data = Cache::remember('OvertimeRequest.requestors', 33660, function()
        {
            return self::where('requestor', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function locations()
    {
        $data = Cache::remember('OvertimeRequest.locations', 33660, function()
        {
            return self::where('location', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function weekendDates()
    {
        $data = Cache::remember('OvertimeRequest.weekendDates', 33660, function()
        {
            return self::where('weekenddate', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function approversFirstLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_first_level', 33660, function()
        {
            return self::where('approver_first_level', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function approversSecondLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_second_level', 33660, function()
        {
            return self::where('approver_second_level', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function approversThirdLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_third_level', 33660, function()
        {
            return self::where('approver_third_level', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function approvalModes()
    {
        $data = Cache::remember('OvertimeRequest.approval_modes', 33660, function()
        {
            return self::where('approval_mode', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function squadLeaders()
    {
        $data = Cache::remember('OvertimeRequest.approver_squad_leaders', 33660, function()
        {
            return self::where('approver_squad_leader', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function tribeLeaders()
    {
        $data = Cache::remember('OvertimeRequest.approver_tribe_leaders', 33660, function()
        {
            return self::where('approver_tribe_leader', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
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
    
    public static function awaiting($predicates)
    {
        $data = Cache::remember('OvertimeRequest.awaiting', 33660, function() use ($predicates)
        {
            return self::where('status', 'like', 'Awaiting%')
                ->whereNull('delete_flag')
                ->where('weekenddate', '>=', '2020-10-16')
                ->where($predicates)
//                 ->limit(15)
                ->get();
        });
        
        return $data;
    }
    
    public static function approved($predicates)
    {
        $data = Cache::remember('OvertimeRequest.approved', 33660, function() use ($predicates)
        {
            return self::where('status', 'Approved')
                ->whereNull('delete_flag')
                ->where('weekenddate', '>=', '2020-10-16')
                ->where($predicates)
//                 ->limit(15)
                ->get();
        });
        
        return $data;
    }
    
    public static function other($predicates)
    {
        $data = Cache::remember('OvertimeRequest.other', 33660, function() use ($predicates)
        {
            return self::where('status',  'not like', 'Awaiting%')
                ->where('status', '<>', 'Approved')
                ->whereNull('delete_flag')
                ->where('weekenddate', '>=', '2020-10-16')
                ->where($predicates)
//                 ->limit(15)
                ->get();
        });
        
        return $data;
    }
}