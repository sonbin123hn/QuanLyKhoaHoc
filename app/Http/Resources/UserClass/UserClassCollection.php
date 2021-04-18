<?php

namespace App\Http\Resources\UserClass;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserClassCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = UserClassResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
