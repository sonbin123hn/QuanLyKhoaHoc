<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
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
            'id_question' => new TeacherResource(Teacher::findOrFail($this->id_teacher)),
            'subject' => new SubjectResource(Subject::findOrFail($this->id_subject)),
            'course' => new CourseResource(Course::findOrFail($this->id_course)),
        ];
    }
}
