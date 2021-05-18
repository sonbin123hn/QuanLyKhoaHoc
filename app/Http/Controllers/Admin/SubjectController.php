<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\subject\SubjectRequest;
use App\Http\Requests\Admin\subject\SubjecUpdatetRequest;
use App\Models\Subject;
use App\Services\UploadService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::paginate(10);
        return view("admin/subject/index",compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/subject/add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $data = $request->all();
        $data['status'] = true;
        $file = $request->avatar;
        if(!empty($file)){
            $file_path = UploadService::uploadImage("subject",$file);
        }
        $data['avatar'] = $file_path;
        if(Subject::create($data)){
            //return redirect('/admin/subject/add'); //duy work with RPA
            return redirect('/admin/subject')->with('success','Subject successfully created');
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
        $subject = Subject::findOrFail($id);
        return view("admin/subject/edit",compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjecUpdatetRequest $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $data = $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $file_path = UploadService::uploadImage("subject",$file);
        }
        $data['avatar'] = $file_path;
        if($subject->update($data)){
            return redirect('/admin/subject')->with('success','Subject Update is success');
        }
        return back()->with('error','Subject Update failed'); 
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
        $data = Subject::findOrFail($id);
        if($data['status']){
            $data['status'] = false;
            $data->update();
            return redirect('/admin/subject')->with('success','lock is success');
        }
        $data['status'] = true;
        $data->update();
        return redirect('/admin/subject')->with('success','unlock is success');
    }
}
