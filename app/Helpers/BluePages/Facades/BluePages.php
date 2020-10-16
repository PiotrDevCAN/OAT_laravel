<?php 

namespace App\Helpers\BluePages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Bluepages\Builder to(string $url)
 */
class BluePages extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Bluepages';
    }

}
