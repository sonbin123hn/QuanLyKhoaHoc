<?php

namespace App\Http\Resources\Exams;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExamsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = ExamsResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
