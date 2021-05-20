<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teacher\teacherRequest;
use App\Http\Requests\Admin\Teacher\teacherUpdateRequest;
use App\Models\Teacher;
use App\Services\UploadService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::paginate(10);
        return view("admin/teacher/index",compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/teacher/add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(teacherRequest $request)
    {
        $data = $request->all();
        $file = $request->image;
        $data['status'] = true;
        if(!empty($file)){
            $file_path = UploadService::uploadImage("teacher",$file);
        }
        $data['image'] = $file_path;
        if(Teacher::create($data)){
            //return redirect('/admin/teacher/add'); //by duy work with RPA
             return redirect('/admin/teacher')->with('success','Teacher successfully created');
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
        $teacher = Teacher::findOrFail($id);
        return view("admin/teacher/edit",compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(teacherUpdateRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $data = $request->all();
        $file = $request->image;
        if(!empty($file)){
            $file_path = UploadService::uploadImage("teacher",$file);
            $data['image'] = $file_path;
        }else{
            $data['image'] = $teacher->image;
        }
        if($teacher->update($data)){
            return redirect('/admin/teacher')->with('success','teacher Update is success');
        }
        return back()->with('error','teacher Update failed'); 
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
    public function lock($id)
    {
        $data = Teacher::findOrFail($id);
        if($data['status'] == 2){
            $data['status'] = 1;
            if($data->update()){
                return redirect('/admin/teacher')->with('success','unlock is success');
            }
        }
        $data['status'] = 2;
        if($data->update()){
            return redirect('/admin/teacher')->with('success','lock is success');
        };
    }
}
