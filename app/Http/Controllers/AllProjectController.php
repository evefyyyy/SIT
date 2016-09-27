<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Advisor;
use App\Category;
use App\GroupProject;
use App\GroupAdvisor;
use App\ProjectStudent;
use App\Student;
use App\Type;
use App\User;
use App\Http\Requests;
use App\Proposal;

class AllProjectController extends Controller
{
    public function index()
    {
    $student = Student::all();
		$objs['students'] = $student;

		$category = Category::all();
		$objs['category'] = $category;

		$type = Type::all();
		$objs['type'] = $type;

		$advisor = Advisor::all();
		$objs['advisors'] = $advisor;

    	$objs['proposal'] = Proposal::all();

		$objs['countProject'] = GroupProject::where('group_project_approve','=',1)->count();


		$projects = \App\ProjectStudent::all();
		$unique = $projects->unique('project_pkid');
		$objs['project'] = $projects;

		$groupProject = GroupProject::all();
    $objs['group_project'] = $groupProject;

      	return view('admin.allProject',$objs);
      }

      public function show($id){
        $obj['checkProject'] = $id;
        $obj['projectNameEN'] = DB::table('group_projects')->where('id',$id)->value('group_project_ENG_name');
        $obj['projectNameTH'] = DB::table('group_projects')->where('id',$id)->value('group_project_TH_name');
        $student = DB::table('project_students')
                    ->join('students','student_pkid','=','students.id')
                    ->where('project_pkid',$id)
                    ->select('student_id','student_name','student_email')->get();
        if(count($student)==3){
          $obj['stdId1'] = $student[0]->student_id;
          $obj['stdId2'] = $student[1]->student_id;
          $obj['stdId3'] = $student[2]->student_id;
          $obj['stdName1'] = $student[0]->student_name;
          $obj['stdName2'] = $student[1]->student_name;
          $obj['stdName3'] = $student[2]->student_name;
          $obj['email1'] = $student[0]->student_email;
          $obj['email2'] = $student[1]->student_email;
          $obj['email3'] = $student[2]->student_email;
        }else if(count($student)==2){
          $obj['stdId1'] = $student[0]->student_id;
          $obj['stdId2'] = $student[1]->student_id;
          $obj['stdName1'] = $student[0]->student_name;
          $obj['stdName2'] = $student[1]->student_name;
          $obj['email1'] = $student[0]->student_email;
          $obj['email2'] = $student[1]->student_email;
        }

        $obj['advisors'] = DB::table('project_advisors')
                            ->join('advisors','advisor_id','=','advisors.id')
                            ->where('project_pkid',$id)
                            ->select('advisor_name')->get();

        $obj['detail'] = DB::table('group_projects')
                          ->join('project_detail','group_projects.id','=','project_pkid')
                          ->where('group_projects.id',$id)
                          ->value('group_project_detail');

        $obj['tools'] = DB::table('group_projects')
                          ->join('project_detail','group_projects.id','=','project_pkid')
                          ->where('group_projects.id',$id)
                          ->value('tools_detail');

        $obj['poster'] = DB::table('pictures')
                          ->where('project_pkid',$id)
                          ->where('picture_type_id','=','1')
                          ->value('picture_path_name');

        $obj['groupPic'] = DB::table('pictures')
                        ->where('project_pkid',$id)
                        ->where('picture_type_id','=','2')
                        ->value('picture_path_name');

        $obj['screenshot'] = DB::table('pictures')
                            ->where('project_pkid',$id)
                            ->where('picture_type_id','=','3')
                            ->select('picture_path_name')->get();
          return view('showProject',$obj);
      }


}
