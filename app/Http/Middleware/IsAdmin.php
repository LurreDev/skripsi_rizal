<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_level == 1){
            return $next($request);
        }

        // if (Auth::user() &&  Auth::user()->is_level == 1) {
        //      return $next($request);
        // }
   
        return redirect('login')->with('error',"You don't have admin access.");
    }
}
