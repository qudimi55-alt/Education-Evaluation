<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin=Admin::all()->where('number','==',$request->number)
        ->where('password','==',$request->password)
        ->where('active','==',1)->
        where('role_admin','==',1)->first();

        if(Auth::check()){
            if(Auth::user()->role_admin==1 && Auth::user()->active==1){
        return $next($request);
        }else{

      return  Alert::error('  ليس لديك الصلاحيات للانتقال الى هنا ');}
    }
}
}
