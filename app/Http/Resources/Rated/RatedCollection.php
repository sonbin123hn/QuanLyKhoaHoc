<?php

namespace App\Http\Resources\Rated;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RatedCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = ListRatedResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
