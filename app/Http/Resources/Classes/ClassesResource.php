<?php

namespace App\Http\Resources\Classes;

use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Subject\SubjectResource;
use App\Http\Resources\Teacher\TeacherResource;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassesResource extends JsonResource
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
            'price' => $this->price,
            'level' => $this->level,
            'limit' => $this->limit,
            'curent_user' => $this->curent_user,
            'teacher' => new TeacherResource(Teacher::findOrFail($this->id_teacher)),
            'subject' => new SubjectResource(Subject::findOrFail($this->id_subject)),
            'course' => new CourseResource(Course::findOrFail($this->id_course)),
        ];
    }
}
