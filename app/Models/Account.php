<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Account extends BaseModel
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
//     protected $table = 'Account_Approvers';
    protected $table = 'Account_Approvers_Test';
    
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
    
    public static function accounts()
    {
        $cc = 'UK';
        
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
        $cc = 'UK';
        
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
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->location => $item->location];
            });
    }
}
