<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ans\AnsCollection;
use App\Http\Resources\Ans\AnsResource;
use App\Http\Resources\Exams\checkAnsCollect;
use App\Http\Resources\Exams\checkAnsResource;
use App\Http\Resources\Exams\DoneExamsCollection;
use App\Http\Resources\Exams\NextExamsCollection;
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
use App\Models\User_Class;
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
    public function examDone()
    {
        $id = Auth::user()->id;
        
        $check = Result::Where('id_user',$id)->exists();
        if($check){
            $data = Result::Where('id_user',$id)->get();
            return $this->formatJson(DoneExamsCollection::class,$data);
        }else{
            return $this->sendMessage("chưa làm bài ktr nào");
        }
    }
    public function nextExams()
    {
        $id = Auth::user()->id;
        $userClass = User_Class::where('id_user',$id)->get();
        foreach($userClass as $value){
            $arr[] = $value['id_class'];
        }
        $tomorrow = Carbon::tomorrow();
        $exam = Exams::whereIn('id_class',$arr)->whereDate("date_begin","<=",$tomorrow)->get();
        foreach($exam as $val){
            $check = Result::Where(['id_user'=>$id,
                                    'id_class' => $val['id_class']
                                    ])->exists();
            if(!$check){
                $arrID[] = $val['id'];
            }
        }
        $data = Test::whereIn('id_exams',$arrID)->get();
        return $this->formatJson(NextExamsCollection::class,$data);
        
    }
}
