<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Teacher\TeacherCollection;
use App\Http\Resources\Teacher\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends ApiController
{
    public function teacher($id){
        $teacher = Teacher::findOrFail($id);
        return $this->formatJson(TeacherResource::class,$teacher);
    }
    public function allTeacher(){
        $teacher = Teacher::all();
        return $this->formatJson(TeacherCollection::class,$teacher);
    }
    
}
