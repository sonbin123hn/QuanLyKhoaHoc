<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2 && Auth::user()->status == 1){
            return $next($request);
        }else{
            Auth::logout();
            return redirect('/admin/login')->with('message', 'Bạn Ko Có quyền truy cập or tài khoản đã bị khóa');
        }
    }
}
