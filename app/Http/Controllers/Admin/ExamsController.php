<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\exams\CreateExamsRequest;
use App\Models\Answer;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Exams;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exams::paginate(10);
        $classes = Classes::all();
        return view("admin/exams/index")->with(compact("exams","classes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        return view("admin/exams/add")->with(compact("course"));
    }
    public function class($id)
    {
        $class = Classes::where("id_course",$id)->get()->toArray();
        return response()->json([
            'class' => $class
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExamsRequest $request)
    {
        $data = $request->all();
        $class = Classes::findOrFail($data['id_class']);
        $de = Question::select('id')->where('level',1)->Where("id_subject",$class['id_subject'])->inRandomOrder()->limit($data['de'])->get()->toArray();
        $tb = Question::select('id')->where('level',2)->Where("id_subject",$class['id_subject'])->inRandomOrder()->limit($data['tb'])->get()->toArray();
        $kho = Question::select('id')->where('level',3)->Where("id_subject",$class['id_subject'])->inRandomOrder()->limit($data['kho'])->get()->toArray();
        $data['date_begin'] = Helper::formatSqlDate($request->date_begin);
        $data['time_begin'] = Helper::formatTime($request->time_begin);
        $random = array_merge($de,$tb,$kho);
        $exams = Exams::create([
            "date_begin" => $data['date_begin'],
            "time_begin" => $data['time_begin'],
            "id_class" => $data['id_class']
        ]);
        if($exams){
            $test = Test::create([
                "name" => $data['name'],
                "description" => $data['description'],
                "duration" => $data['duration'],
                "id_question" => json_encode($random),
                "id_exams" => $exams->id,
            ]);
        }
        if($test){
            return redirect('/admin/exams')->with('success','Exams Add is success');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
