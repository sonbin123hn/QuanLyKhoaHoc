<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\classes\ClassesRequest as AppClassesRequest;
use App\Http\Requests\Admin\ClassesRequest;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::paginate(3);
        $subject = Subject::all();
        $teacher = Teacher::all();
        $course = Course::all();
        return view("admin/classes/index")->with(compact('classes','subject','teacher','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::paginate(3);
        $subject = Subject::all();
        $teacher = Teacher::all();
        $course = Course::all();
        return view("admin/classes/add")->with(compact('classes','subject','teacher','course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppClassesRequest $request)
    {
        $data = $request->all();
        if(Classes::create($data)){
            return redirect('/admin/classes/add');//duy work with RPA
            //return redirect('/admin/classes')->with('success','Class successfully created');
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
        $classes = Classes::findOrFail($id);
        $subject = Subject::all();
        $teacher = Teacher::all();
        $course = Course::all();
        return view("admin/classes/edit")->with(compact('classes','subject','teacher','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppClassesRequest $request, $id)
    {
        $classes = Classes::findOrFail($id);
        $data = $request->all();
        if($classes->update($data)){
            return redirect('/admin/classes')->with('success','Class Update is success');
        }
        return back()->with('error','Class Update failed'); 
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
