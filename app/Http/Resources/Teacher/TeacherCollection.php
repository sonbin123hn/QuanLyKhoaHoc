<?php

namespace App\Http\Resources\Teacher;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = TeacherResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
