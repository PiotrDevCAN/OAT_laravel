<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OvertimeRequestResourceCollection extends ResourceCollection
{
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
            'recordsTotal' => 1000,
            'recordsFiltered' => $this->count(),
            'data' => $this->collection,
        ];
    }
}
