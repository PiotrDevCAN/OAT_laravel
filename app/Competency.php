<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Competency_Approvers';
    
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
    protected $fillable = ['competency', 'approver', 'last_updater', 'last_updated'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static function competencies()
    {
        return self::select('approver','competency')
            ->distinct()
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->competency => $item->approver];
            });
    }
}
