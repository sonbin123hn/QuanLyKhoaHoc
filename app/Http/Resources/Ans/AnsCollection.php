<?php

namespace App\Http\Resources\Ans;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AnsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = AnsResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
