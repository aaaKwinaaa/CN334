<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class role_Reviewer
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
        if(auth()->user()->role_id == 2){ 
            // print $request;
            return $next($request);

        }else {
            return redirect('/home')->with('error',"You can't 'PERMISSION' to access");
        }
    }
}
