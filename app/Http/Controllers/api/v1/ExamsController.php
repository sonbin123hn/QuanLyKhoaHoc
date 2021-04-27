<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ans\AnsCollection;
use App\Http\Resources\Ans\AnsResource;
use App\Http\Resources\Exams\checkAnsCollect;
use App\Http\Resources\Exams\checkAnsResource;
use App\Http\Resources\Exams\QuestionCollection;
use App\Http\Resources\Test\TestCollection;
use App\Http\Resources\Test\TestResource;
use App\Models\Answer;
use App\Models\Classes;
use App\Models\Exams;
use App\Models\Question;
use App\Models\Result;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExamsController extends ApiController
{
    public function getTest($id)
    {
        $test = Test::findOrFail($id);
        $test['question'] = json_decode($test->id_question);
        return $this->formatJson(TestResource::class,$test);
    }
    public function getAns($id)
    {
        $test = Test::findOrFail($id);
        $question = json_decode($test->id_question);
        foreach($question as $value){
            $array[]= $value->id; 
        }
        $anser = Answer::whereIn('id',$array)->get();
        return $this->formatJson(AnsCollection::class,$anser);
    }
    public function checkAns(Request $request,$id)
    {
        $data = $request->all();
        $test = Test::findOrFail($id);
        $numberQuestion = count(json_decode($test->id_question));
        $dem = 0;
        foreach($data as $key=>$value){
            if(Question::where([
                'id' => $key,
                'true_ans' => $value
            ])->exists()){
                $dem = $dem + 1;
            }
        }
        $send['ans_pass'] = $dem;
        $send['ans_fail'] = $numberQuestion - $dem;
        $send['result_test '] = (10 / $numberQuestion) *  $dem;
        $exam = Exams::findOrFail($test->id_exams);
        $class = Classes::findOrFail($exam->id_class);
        $result = Result::create([
            'scores' => $send['result_test '],
            'right_ans' =>  $send['ans_pass'],
            'wrong_ans' => $send['ans_fail'],
            'id_user' => Auth::user()->id,
            'id_class' => $class->id,
        ]);
        if($result){
            return $this->sendSuccessResponse($send);
        }
        return $this->sendMessage("thực thi thất bại");
    }
    public function nextExams()
    {
        $test = Test::where('id_user', Auth::user()->id)->get();
        if(isset($test)){
            echo 'asd';
        }else{
            echo "aaa";
        }
        exit();
    }
}
