<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TestCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = TestResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
