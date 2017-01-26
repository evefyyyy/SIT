<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdvisorAuth
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
        if(Auth::check()){
            if(Auth::user()->user_type_id===1){
                return $next($request);
            } else {
                return redirect('/logout');
            }
        } else {
            return redirect('/relogin');
        }   
    }
}
