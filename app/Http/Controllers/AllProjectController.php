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
		$objs['advisor'] = $advisor;

		$projectStudent = ProjectStudent::all();
		$objs['project_student'] = $projectStudent;

		$objs['countProject'] = GroupProject::where('group_project_approve','=',0)->count();

		$projects = \App\ProjectStudent::all();
		$unique = $projects->unique('project_pkid');
		$projects = $unique->values()->all();
		$objs['project'] = $projects;

      	return view('allProject',$objs);
}
}