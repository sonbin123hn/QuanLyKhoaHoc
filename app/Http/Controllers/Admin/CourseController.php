<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\course\CourseRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::paginate(3);
        return view("admin/course/index",compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/course/add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data = $request->all();
        $data['day_start']= Helper::formatSqlDate($request->day_start);
        $data['day_end']= Helper::formatSqlDate($request->day_end);
        if(Course::create($data)){
            return redirect('/admin/course')->with('success','Course add is success');
        }
        return back()->with('error','service add failed'); 
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
        $course = Course::findOrFail($id);
        return view("admin/course/edit",compact('course'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->all();
        $data['day_start']= Helper::formatSqlDate($request->day_start);
        $data['day_end']= Helper::formatSqlDate($request->day_end);
        if($course->update($data)){
            return redirect('/admin/course')->with('success','Course Update is success');
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
