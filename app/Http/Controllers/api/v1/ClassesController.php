<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Classes\ClassesCollection;
use App\Http\Resources\Classes\ClassesResource;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends ApiController
{
    public function classes($id)
    {
        $classes = Classes::where('id_subject',$id)->get();
        return $this->formatJson(ClassesCollection::class,$classes);
    }
    public function allClasses()
    {
        $classes = Classes::all();
        return $this->formatJson(ClassesCollection::class,$classes);
    }
    public function listTeacher($id){
        $list = Classes::where("id_teacher",$id)->get();
        return $this->formatJson(ClassesCollection::class,$list);  
    }
    public function getClassLV($id_sub,$id)
    {
        $class = Classes::where([
            'id_subject' => $id_sub,
            'level' => $id 
        ])->get();
        return $this->formatJson(ClassesCollection::class,$class);  
    }
    public function getLV($level)
    {
        $class = Classes::where('level', $level)->get();
        return $this->formatJson(ClassesCollection::class,$class);  
    }
}
