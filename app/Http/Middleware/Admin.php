<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        $user = Auth::user();             // if (Auth::check())
//        if (!($user->isAdmin())){
////            return redirect('/home');
//            return redirect(404);
//        }
//        return $next($request);

////////////////   A MOZE I OVAKO   /////////////////////////////////
        if (Auth::check()){
            if (Auth::user()->isAdmin()){
                return $next($request);
            }
        }
        Session::flash('not_admin_not_active','You are NOT Authorized to see the page, You intended to!');
        return redirect('/admin');      //BACK TO ADMIN DASHBOARD
//        return redirect('/home');         //BACK TO HOME PAGE
//        return redirect(404);             //GET 4040 ERROR PAGE
    }
}
