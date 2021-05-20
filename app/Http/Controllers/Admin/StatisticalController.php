<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $static = Bill::paginate(5);
        $user = User::all();
        $course = Course::all();
        return view("admin/statistical/index",compact('static','user','course'));
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
    public function topCourse()
    {
        $query= Bill::select(DB::raw('id_course as course,Sum(amount) AS tongTien'))
        ->groupBy('course')
        ->orderBy('course')
        ->limit(1)->get();
        foreach($query as $val){
            $course = Course::findOrFail($val['course']);
            echo "The highest turnover is the course : ".$course->name." with the amount of :".$val['tongTien']."VND";
        }
    }
    public function year(Request $request){
        $year = $request->year;

        if(isset($year)){
            $query = DB::table('bills')
            ->whereYear('created_at', '=', $year)
            ->sum('amount');
            echo $query." VND";
        }
    }
    public function topYear()
    {
        $query= Bill::select(DB::raw('YEAR(created_at) as year,Sum(amount) AS tongTien'))
        ->groupBy('year')
        ->orderBy('year')
        ->limit(1)->get();
        foreach($query as $val){
            echo "The highest turnover is the year : ".$val['year']." with the amount of :".$val['tongTien']."VND";
        }
    }
    public function course($check)
    {
        $tong = 0;
        $res = Bill::where('id_course',$check)->get();
        foreach($res as $val){
            $tong = $tong + $val['amount'];
        }
        return $tong;
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
