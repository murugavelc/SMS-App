<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     */

    public function handle($request, Closure $next)
    {

        //print_r(Auth::user()->usertype); die;

        if (Auth::user()->usertype == '1') {

            return $next($request);
        }else{
            return $next($request);
            return 'U dont have permission to access on Web..!! ';
        }


    }
}
