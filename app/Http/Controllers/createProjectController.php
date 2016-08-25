<?php

namespace App\Http\Controllers;
use App\Model\studentProfile;
use Input;
use Redirect;
use File;
use App\GroupProject;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Category;
use App\Type;
use App\Advisor;


class createProjectController extends Controller {

	public function index()
	{
		$wantedStudent = null;
		$objs['students'] = \App\Student::where('student_id','=','56130500078')->get();

		$category = Category::all();
		$objs['category'] = $category;

		$type = Type::all();
		$objs['type'] = $type;

		$advisor = Advisor::all();
		$objs['advisor'] = $advisor;

		return view('createProject',$objs);

	}

	public function create()
	{
		//$data['method'] = 'post';
		//$data['url'] = url('student/myproject/');
		return view('waitApprove');
	}

	public function store(Request $request)
	{
		//$cat = Category::get('category_id');


		$obj = new GroupProject();
		$obj->group_project_ENG_name = $request['Engname'];
		$obj->group_project_TH_name = $request['THname'];
		$obj->category_id = 1;
		$obj->type_id = 1;
		$obj->save();

		/*$std = new Student();
		$std->student_id = $request['idStudent1'];
		$std->user_type_id = 1;
		$std->save();*/

		$obj = new Student();
		$obj->student_id = $request['idStudent2'];
		$obj->user_type_id = 1;
		$obj->save();

		$obj = new Student();
		$obj->student_id = $request['idStudent3'];
		$obj->user_type_id = 1;
		$obj->save();

		return redirect::to('student/myproject/');
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);

		return view('waitApprove');
	}







}
