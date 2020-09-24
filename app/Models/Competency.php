<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Competency extends BaseModel
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Competency_Approvers';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['competency', 'approver'];
    
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
    
    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        
        dump($value);
        
        dump($field);
        
        dd('end');
        
        return $this->where($field ?? $this->getRouteKeyName(), $value)->first();
    }
}
