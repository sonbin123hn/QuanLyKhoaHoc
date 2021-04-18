<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ans\AnsCollection;
use App\Http\Resources\Ans\AnsResource;
use App\Http\Resources\Exams\QuestionCollection;
use App\Http\Resources\Test\TestCollection;
use App\Models\Answer;
use App\Models\Exams;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ExamsController extends ApiController
{
    public function getTest($id){
        $test = Test::findOrFail($id);
        $question = json_decode($test->id_question);
        foreach($question as $value){
            $array[]= $value->id; 
        }
        $anser = Answer::select('id_question')->whereIn('id',$array)->get();

        return $this->formatCollectionJson(AnsResource::class,$anser);
        
    }
}
