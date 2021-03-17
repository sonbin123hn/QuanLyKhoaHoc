<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\CheckMailRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Models\Infor_Temp;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends ApiController
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
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
        $data = $request->getData();
        $user = Infor_Temp::create($data);
        return $this->formatJson(AuthResource::class, $user);
    }

    public function me()
    {
        return $this->formatJson(AuthResource::class, auth('api')->user());
    }
    public function CheckEmail(CheckMailRequest $request)
    {
        $email = str_replace(' ','', $request->get('email'));
        if(is_numeric($email)){
            $user=User::where('mobile',$email)->get();
            foreach($user as $value){
                if($value['is_admin'] == 3){
                    return response()->json(['UserName' => $value['name']]);
                }
            }
        }else{
            $user=User::where('email',$email)->get();
            foreach($user as $value){
                if($value['is_admin'] == 3){
                    return response()->json(['UserName' => $value['name']]);
                }
            }
        }

        return response()->json(['result' => 'không tồn tại email'],400);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->sendMessage('Đăng xuất thành công!');
    }
}
