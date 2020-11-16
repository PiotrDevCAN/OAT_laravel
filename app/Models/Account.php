<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Cache;

class Account extends BaseModel
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Account_Approvers';
//     protected $table = 'Account_Approvers_Test';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['account', 'location'];
    
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
    protected $fillable = ['account', 'approver', 'last_updater', 'last_updated', 'verified', 'location'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static function accounts($cc = 'UK')
    {
        $data = Cache::remember('Account.approversByAccount'.$cc, 33660, function() use($cc)
        {
            return self::select('approver','account')
                ->distinct()
                ->where('location', $cc)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->account => $item->approver];
                });
        });
        
        return $data;
    }
    
    public static function verified($cc = 'UK')
    {
        $data = Cache::remember('Account.verified'.$cc, 33660, function() use($cc)
        {
            return self::select('verified','account')
                ->distinct()
                ->where('location', $cc)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->account => $item->verified];
                });
        });
        
        return $data;
    }
    
    public static function locations()
    {
        $data = Cache::remember('Account.locations', 33660, function()
        {
            return self::select('location')
                ->distinct()
                ->where('verified', 'Yes')
                ->where('location', '<>', '')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->location => $item->location];
                });
        });
        
        return $data;        
    }
}
