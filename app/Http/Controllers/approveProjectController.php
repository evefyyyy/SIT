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
		$objs['project_student'] = $projectStudent;

		$project = DB::table('group_projects')
				->join('types', 'types.id', '=', 'group_projects.type_id')
				->join('categories', 'categories.id', '=', 'group_projects.category_id')
				->select('*')
				->get();
		$objs['group_projects'] = $project;

		$objs['countProject'] = GroupProject::where('group_project_approve','=',0)->count();

		$groupproject_student = DB::table('students')
				->join('project_students', 'project_students.student_pkid', '=', 'students.id')
				->join('group_projects', 'group_projects.id', '=', 'project_students.project_pkid')
				->select('*')
				->get();

		$objs['group_project_student'] = $groupproject_student;

		$groupProjectAll = DB::table('students')
            	->join('project_students', 'students.id', '=', 'project_students.student_pkid')
            	->rightjoin('group_projects', 'group_projects.id', '=', 'project_students.project_pkid')
            	->join('categories', 'categories.id', '=', 'group_projects.category_id')
            	->join('types', 'types.id', '=', 'group_projects.type_id')
            	->join('project_advisors', 'project_advisors.project_pkid', '=', 'group_projects.id')
            	->join('advisors', 'advisors.id', '=', 'project_advisors.advisor_id')
            	->join('advisor_positions', 'advisor_positions.id', '=', 'project_advisors.advisor_position_id')
                ->select('*')
            	->get();
        $objs['groupProject'] = $groupProjectAll;
      	return view('approveProject',$objs);
    }
}

