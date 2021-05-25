<?php

namespace App\Http\Controllers\Admin;

use App\Charts\UserChart;
use App\Http\Controllers\Controller;
use App\Models\Rated;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $teacher = Teacher::all();
        $rate = Rated::orderby('id', 'DESC')->get();
        $topTeacher = Rated::orderby('rate','DESC')->limit(5)->get();
        $user = User::all();
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        
        $day = $date->toDateString();     
        $total = DB::table('bills')
        ->whereDate('created_at', '=', $day)
        ->sum('amount');
        $newMember = User::where('is_admin',3)
        ->whereDate('created_at', '=', $day)
        ->count();
        $allMember = User::where('is_admin',3)->count();
        $allAdmin = User::where('is_admin',2)->count();



        return view('admin/dashboard',compact('teacher','rate','user','topTeacher','total','allMember','allAdmin','newMember'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
