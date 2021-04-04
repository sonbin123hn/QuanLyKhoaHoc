<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rated\ListRatedResource;
use App\Http\Resources\Rated\RatedCollection;
use App\Models\Classes;
use App\Models\Rated;
use App\Models\User_Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatedController extends ApiController
{
    public function addRated(Request $request)
    {
        $data = $request->all();
        if(Rated::create($data)){
            return $this->sendMessage("add is success",200);
        }
        return $this->sendMessage("fail",400);
    }
    public function lissRated($id)
    {
        $list = Rated::where("id_teacher",$id)->get();
        return $this->formatJson(RatedCollection::class,$list);
    }
    public function isValidUser($id)
    {
        $user = Auth::user();
        $id_user = $user->id;
        $class = Classes::where('id_teacher',$id)->get();
        foreach($class as $val){
            $check = User_Class::where('id_user',$id_user)
            ->orWhere('id_class',$val['id'])
            ->exists();
            if($check){
                return $this->sendMessage("pass",200);
            }
        }
        return $this->sendMessage("fail",400);
    }
}
