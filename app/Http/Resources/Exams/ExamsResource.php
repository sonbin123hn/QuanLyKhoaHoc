<?php

namespace App\Http\Resources\Exams;

use App\Http\Resources\Classes\ClassesResource;
use App\Models\Classes;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamsResource extends JsonResource
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
            'id' => $this->id,
            'date_begin' => $this->date_begin,
            'time_begin' => $this->time_begin,
            'class' => new ClassesResource(Classes::findOrFail($this->id_class)),
        ];
    }
}
