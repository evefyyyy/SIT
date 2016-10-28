<?php

namespace App\Http\Middleware;

use Closure;

class ProjectStudentCheck
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
            if(Auth::user()->user_student->student->groupProject == null){
                return redirect('/student/myproject/noproject');
            } else {
                if(Auth::user()->user_student->student->projectStudent->groupProject->group_project_approve==0){
                    return redirect('/student/myproject/waitapprove');
                } else {
                    return redirect('/showproject');
                }
            }
        }
    }
}
