<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Subject\SubjectCollection;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    public function home()
    {
        $sub = Subject::all();
        return $this->formatJson(SubjectCollection::class, $sub);
    }
}
