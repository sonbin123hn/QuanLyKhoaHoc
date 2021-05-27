<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends ApiController
{
    public function uploadFile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_path = UploadService::uploadImage("user",$file);
            if($user->update([
                'avatar' =>  $file_path
            ])){
                return $this->sendMessage("thanh cong");
            };
        }
        return $this->sendMessage("that bai",400);

    }
}
