<?php

namespace App\Http\Resources\Exams;

use App\Http\Resources\Teacher\TeacherResource;
use App\Models\Exams;
use Illuminate\Http\Resources\Json\JsonResource;

class NextExamsResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'duration' => $this->duration,
            'id_exams' => new ExamsResource(Exams::findOrFail($this->id_exams)),
        ];
    }
}
