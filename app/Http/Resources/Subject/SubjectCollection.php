<?php

namespace App\Http\Resources\Subject;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = SubjectResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
