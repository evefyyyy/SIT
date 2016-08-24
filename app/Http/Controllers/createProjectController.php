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


class createProjectController extends Controller {

	public function index()
	{
		$wantedStudent = null;
		$students = \App\Student::where('student_id','=','56130500078')->get();
		return view('createProject',compact('students'));

		

	}

	public function create()
	{
		//$data['method'] = 'post';
		//$data['url'] = url('student/myproject/');
		return view('waitApprove');
	}

	public function store(Request $request)
	{
		$obj = new GroupProject();
		$obj->group_project_ENG_name = $request['Engname'];
		$obj->group_project_TH_name = $request['THname'];
		$obj->save();

		$std = new Student();
		$std->student_id = $request['idStudent'];
		$std->user_type_id = 1;
		$std->save();


		return view('waitApprove');
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);
	}







}
