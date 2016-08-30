<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Advisor;
use App\Category;
use App\Type;
use App\GroupProject;
use App\Http\Requests;
use App\ProjectStudent;
use App\ProjectJoinStudents;
use DB;

class approveProjectController extends Controller
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
		$objs['advisor'] = $advisor;

		$projectStudent = ProjectStudent::all();
		$objs['project_student'] = $projectStudent;

		$objs['countProject'] = GroupProject::where('group_project_approve','=',0)->count();

		$projects = \App\ProjectStudent::all();
		$unique = $projects->unique('project_pkid');
		$projects = $unique->values()->all();
		$objs['project'] = $projects;

      	return view('admin.approveProject',$objs);
    }

    public function updateApproveProject(Request $request){
    	$project_id = $request->project_id;
    	$group_id = $request->group_id;

    	$group_project = GroupProject::where('id', $project_id);
    	$group_project->group_project_id = $group_id;
    	$group_project->group_project_approve = 1;
    	$group_project->save();

    	return view('approveProject');
    }
}
