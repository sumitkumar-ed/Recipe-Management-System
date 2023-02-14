<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

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
                return redirect()->back()->with('success','Access Denied as you are not Admin');


            }
        }else{
            return redirect('/login')->withSuccess('Login to Acccess the website ');
        }
        return $next($request);
    }
}
