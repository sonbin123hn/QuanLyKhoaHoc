<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\CheckMailRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\NewRegisterRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\UpdateUserRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\Auth\UserResource;
use App\Http\Resources\Classes\ClassesCollection;
use App\Http\Resources\UserClass\UserClassCollection;
use App\Http\Resources\UserClass\UserClassResource;
use App\Models\Classes;
use App\Models\Infor_Temp;
use App\Models\User;
use App\Models\User_Class;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth as TymonJWTAuth;
use JWTAuth;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = TymonJWTAuth::attempt($credentials)) {
                return $this->sendError400('Bad Request', 'Email hoặc mật khẩu không đúng.');
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Không thể tạo token, vui lòng thử lại sau.'], 500);
        }
        $user = Auth::user();
        if($user->is_admin == 1){
            return $this->sendError400('Bad Request', 'Email hoặc mật khẩu không đúng.');
        }
        $user = $user->setAttribute('token', $token);
        return $this->formatJson(AuthResource::class, $user);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $class = Classes::findOrFail($request->id_class);
        if($class['curent_user'] < $class['limit']){
            $class['curent_user'] = $class['curent_user'] + 1;
            $class->update();
            $user = Infor_Temp::create($data);
            $details = [
                "name" =>  $user->name,
                "nameclass" => $class->name,
                "phone" => $user->phone,
                "price"=> $class->price
            ];
            \Mail::to($user->email)->send(new \App\Mail\MyMail($details));
            return $this->formatJson(AuthResource::class, $user);
        }
        return $this->sendMessage("lớp đã full", 400);
    }

    public function me()
    {
        return $this->formatJson(UserResource::class, auth('api')->user());
    }
    public function userFromClass(){
        $user = Auth::user();
        $class = User_Class::select('id_class')->where("id_user",$user->id)->get();
        return $this->formatJson(UserClassCollection::class,$class);
    }
    public function CheckEmail(CheckMailRequest $request)
    {
        $email = str_replace(' ','', $request->get('email'));
        $user=User::where('email',$email)->get();
        foreach($user as $value){
            if($value['is_admin'] == 3){
                return response()->json(['name' => $value['name']]);
            }
        }

        return response()->json(['result' => 'không tồn tại email'],400);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->sendMessage('Đăng xuất thành công!');
    }
    public function newRegister(NewRegisterRequest $request){
        $user = Auth::user();
        $class = Classes::findOrFail($request->id_class);
        $check = User_Class::where([
            'id_user' => $user->id,
            'id_class' => $request->id_class
        ])->exists();
        if($check){
            return $this->sendMessage("Đã đăng kí lớp này", 422);
        }
        if($class['curent_user'] < $class['limit']){
            $class['curent_user'] = $class['curent_user'] + 1;
            $class->update();
            $new = Infor_Temp::create([
                "name" => $user->name,
                "email" => $user->email,
                "id_class" => $request->id_class,
                "phone" => $user->phone, 
                "price"=> $request->price
            ]);
            if($new){
                $details = [
                    "name" =>  $user->name,
                    "nameclass" => $class->name,
                    "phone" => $user->phone,
                    "price"=> $class->price
                ];
                \Mail::to($user->email)->send(new \App\Mail\MyMail($details));
                return $this->formatJson(AuthResource::class, $user);
            }
        }
        return $this->sendMessage("lớp đã full", 400);
    }
    public function updateUser(UpdateUserRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        if(!empty($request->password)){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $user->password;
        }
        $infor = User::findOrFail($user->id);
        if($infor->update($data)){
            return $this->sendMessage("update is success",200);
        }
        return $this->sendMessage("update is fail", 400);
    }
    public function checkPass(Request $request)
    {
        $getOldPass = $request->password;
        $passwordOld = auth('api')->user()->password;
        if (!Hash::check($getOldPass, $passwordOld)){
            return $this->sendMessage("sai mat khau", 400);
        }
        return $this->sendMessage("pass", 200);
    }
}
