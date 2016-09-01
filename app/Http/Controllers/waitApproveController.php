<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\studentProfile;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use File;
use DB;
use App\GroupProject;
use App\Student;
use App\Category;
use App\Type;
use App\Advisor;
use App\ProjectAdvisor;
use App\ProjectStudent;

class waitApproveController extends Controller
{
    public function index()
    {
        $objs = '56130500078';

        $checkStd = DB::table('students')->where('student_id',$objs)->value('id');
        $checkProject = DB::table('project_students')->where('student_pkid',$checkStd)->value('project_pkid');

        $obj['std'] = DB::table('project_students')
                    ->join('students','student_pkid','=','students.id')
                    ->where('project_pkid',$checkProject)
                    ->select('student_id','student_prefix','student_fname','student_lname')->get();

        $obj['projectNameEN'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_ENG_name');
        $obj['projectNameTH'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_TH_name');
        $projectCat = DB::table('group_projects')->where('id',$checkProject)->value('category_id');
        $projectType = DB::table('group_projects')->where('id',$checkProject)->value('type_id');
        $obj['categories'] = DB::table('categories')->where('id',$projectCat)->value('category_name');
        $obj['types'] = DB::table('types')->where('id',$projectType)->value('type_name');
        $obj['advisors'] = DB::table('project_advisors')
                    ->join('advisors','advisor_id','=','advisors.id')
                    ->where('project_pkid',$checkProject)
                    ->select('prefix','advisor_fname','advisor_lname')->get();

        $obj['obj'] = DB::table('group_projects')->where('id',$checkProject)->value('id');

        return view('student.waitApprove',$obj);

    }
}
