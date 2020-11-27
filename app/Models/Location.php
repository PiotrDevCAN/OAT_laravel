<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Location extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Locations';
    
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
    protected $fillable = ['location', 'shore'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
    
    public static function getWithPredicates($predicates)
    {
        $columns = array(
            'location', 'shore'
        );
        
        $data = Cache::remember('Location.getWithPredicates'.serialize($predicates), 33660, function() use ($predicates, $columns)
        {
            return self::select($columns)
                ->where($predicates)
                ->get();
        });
        
        return $data;
    }
}
