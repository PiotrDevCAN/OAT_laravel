<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Account_Approvers';
    
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
    
    public static function accounts()
    {
        return self::select('approver','account')
            ->distinct()
            ->where('location', $cc)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->account => $item->approver];
            });
    }
    
    public static function verified()
    {
        return self::select('verified','account')
            ->distinct()
            ->where('location', $cc)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->account => $item->verified];
            });
    }
    
    public static function locations()
    {
        return self::select('location')
            ->distinct()
            ->where('verified', 'Yes')
            ->where('location', '<>', '')
            ->limit(5)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->location => $item->location];
            });
    }
}
