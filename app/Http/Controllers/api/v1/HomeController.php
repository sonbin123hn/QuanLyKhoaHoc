<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Subject\SubjectCollection;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\User_Class;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    public function home()
    {
        $class = Classes::all();
        foreach($class as $val){
            $arr[] = $val['id_subject'];
        }
        $sub = Subject::whereIn('id',$arr)->get();
        return $this->formatJson(SubjectCollection::class, $sub);
    }
    public function statistics()
    {
        $teacher = Teacher::all()->count();
        $class = Classes::all()->count();
        $cource = Course::all()->count();
        $member = User::Where("is_admin",3)->count();
        $sub = Subject::all()->count();
        return response()->json([
            'teacher' => $teacher,
            'class' => $class,
            'cource' => $cource,
            'member' => $member,
            'subject' => $sub,
        ]);
    }
}
