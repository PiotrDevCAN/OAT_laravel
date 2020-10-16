<?php 

namespace App\Helpers\BluePagesCurl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\BluePages\Builder to(string $url)
 */
class BluePagesCurl extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BluePagesCurl';
    }

}
