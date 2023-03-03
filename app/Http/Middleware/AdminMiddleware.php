<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
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

        if(Auth::check()){
            // admin role ==1
            // user role == 0
            if(Auth::user()->role == '1'){
                return $next($request);

            }else{   
                Session::put('isadmin','You Dont have access !');
                return redirect()->back();


            }
        }else{
            return redirect('/register')->with('success', 'Your message has been sent.');
        } 
        return $next($request);
    }
}
