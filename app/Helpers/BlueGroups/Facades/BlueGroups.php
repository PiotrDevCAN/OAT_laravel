<?php 

namespace App\Helpers\BlueGroups\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\BlueGroups\Builder to(string $url)
 */
class BlueGroups extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return App\Providers\BlueGroupsServiceProvider::class;
    }

}
