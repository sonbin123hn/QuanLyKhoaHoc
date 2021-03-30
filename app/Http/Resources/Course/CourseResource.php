<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_course' => $this->id,
            'name' => $this->name,
            'day_start' => $this->day_start,
            'day_end' => $this->day_end,
        ];
    }
}
