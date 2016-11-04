<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controller\createProjectController;

class StudentNoProject
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
            if(Auth::user()->user_type_id==3){
                if(Auth::user()->user_student->student->projectStudent == null){
                    return $next($request);
                } else {
                    if(Auth::user()->user_student->student->projectStudent->groupProject->group_project_approve==0){
                        return redirect('/student/myproject/waitapprove');
                    } else {
                        return redirect('/showproject');
                    }
                }
            } else {
                return redirect('/relogin');
            }
        } else {
            return redirect('/relogin');
        }
    }
}
