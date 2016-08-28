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
		$objs['group_projects'] = $projectStudent;

		$groupproject = GroupProject::all();
		$objs['group_projects'] = $groupproject;

		$objs['countProject'] = \app\GroupProject::where('group_project_approve','=',0)->count();

		$groupProjectAll = DB::table('students')
            	->join('project_students', 'students.student_id', '=', 'project_students.student_id')
            	->join('group_projects', 'project_students.project_pkid', '=', 'group_projects.id')
            	->join('categories', 'categories.id', '=', 'group_projects.category_id')
            	->join('types', 'types.id', '=', 'group_projects.type_id')
            	->join('project_advisors', 'project_advisors.project_pkid', '=', 'group_projects.id')
            	->join('advisors', 'advisors.id', '=', 'project_advisors.advisor_id')
            	->join('advisor_positions', 'advisor_positions.id', '=', 'project_advisors.advisor_position_id')
                ->select('students.student_id')
            	->get();
        $objs['groupProject'] = $groupProjectAll;
      	return view('approveProject',$objs);
    }
}

