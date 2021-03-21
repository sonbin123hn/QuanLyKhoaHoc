<?php

namespace App\Http\Resources\Classes;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = ClassesResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
