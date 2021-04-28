<?php

namespace App\Http\Resources\Exams;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NextExamsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = NextExamsResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
