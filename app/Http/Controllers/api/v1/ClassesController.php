<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Classes\ClassesCollection;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends ApiController
{
    public function classes($id)
    {
        $classes = Classes::all()->where('id_subject',$id);
        return $this->formatJson(ClassesCollection::class,$classes);
    }
}
