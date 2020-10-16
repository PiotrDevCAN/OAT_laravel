<?php 

namespace App\Helpers\BlueGroupsCurl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\BlueGroups\Builder to(string $url)
 */
class BlueGroupsCurl extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BlueGroupsCurl';
    }

}
