<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OvertimeRequestResourceCollection extends ResourceCollection
{
    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'records';
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//         return parent::toArray($request);
        return [
            'draw' => 1,
            'recordsTotal' => $this->count(),
            'recordsFiltered' => $this->count(),
            'data' => $this->collection,
        ];
    }
}
