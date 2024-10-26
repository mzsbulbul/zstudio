<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if(Auth::user()->role=='1'){
                return $next($request);
            }else{
                return redirect('/home')->with('message', 'Access Denied! You dont have permission!!!');
            }
        }else {
            return redirect('/login')->with('message', 'Login to access the website');
        }
    }
}
