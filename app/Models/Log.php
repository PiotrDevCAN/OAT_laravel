<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Log';
    
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
    protected $fillable = ['log_entry', 'last_updater', 'last_updated'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
    
    public static function logEntries()
    {
        $data = Cache::remember('Log.logEntries', 33660, function()
        {
            return DB::table('Log')
            ->select('log_entry')
            ->where('log_entry', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function lastUpdates()
    {
        $data = Cache::remember('Log.lastUpdates', 33660, function()
        {
            return DB::table('Log')
            ->select('last_updater')
            ->where('last_updater', '<>', '')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function lastUpdaters()
    {
        $data = Cache::remember('Log.lastUpdaters', 33660, function()
        {
            return DB::table('Log')
            ->select('last_updated')
            ->distinct()
            ->get();
        });
        
        return $data;
    }
    
    public static function getWithPredicates($predicates)
    {
        $data = Cache::remember('Log.getWithPredicates'.serialize($predicates), 33660, function() use ($predicates)
        {
            return self::where($predicates)
            ->get();
        });
        
        return $data;
    }
}
