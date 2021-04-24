<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('question')) {
            $getSS = session()->get('question');
            $subject = Subject::all();
            $question = Question::where("id_subject",$getSS)->paginate(3);
            $ans = Answer::all();
            return view("admin/question/index")->with(compact("subject","question","ans"));
        }else{
            $subject = Subject::all();
            $question = Question::paginate(3);
            $ans = Answer::all();
            return view("admin/question/index")->with(compact("subject","question","ans"));
        }
    }
    public function ajaxShow(Request $request)
    {
        $id_sub = $request->id_subject;
        session()->put('question', $id_sub);
        echo $id_sub;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        return view("admin/question/add",compact('subject'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $data = $request->all();
        $question = Question::create([
            'true_ans' => $data['true_ans'],
            'level' => $data['level'],
            'id_subject' => $data['subject']
        ]);
        $ans = Answer::create([
            'question' => $data['question'],
            'answers_A' => $data['answers_A'],
            'answers_B' => $data['answers_B'],
            'answers_C' => $data['answers_C'],
            'answers_D' => $data['answers_D'],
            'id_question' => $question->id,
        ]);
        if($ans){
            session()->forget('question');
            return redirect('admin/question')->with('success','Question successfully created');
        }
        return back()->with('error','service Update failed'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::all();
        $question = Question::findOrFail($id);
        $ans = Answer::where('id_question',$id)->get();
        return view("admin/question/edit")->with(compact("subject","question","ans"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $data = $request->all();
        $question = Question::findOrFail($id);
        $question->update([
            'true_ans' => $data['true_ans'],
            'level' => $data['level'],
            'id_subject' => $data['subject']
        ]);
        $ans = Answer::where('id_question',$id);
        $ans->update([
            'question' => $data['question'],
            'answers_A' => $data['answers_A'],
            'answers_B' => $data['answers_B'],
            'answers_C' => $data['answers_C'],
            'answers_D' => $data['answers_D'],
        ]);
        if($ans && $question){
            return redirect('admin/question')->with('success','question Update is success');
        }
        return back()->with('error','service Update failed'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
