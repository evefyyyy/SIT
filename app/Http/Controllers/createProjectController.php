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
		$students = \App\Student::where('idStudent','=','56130500078')->get();
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
		$obj->idGroup_project = '8';
		$obj->Group_project_ENG_name = $request['Engname'];
		$obj->Group_project_TH_name = $request['THname'];
		$obj->Category_idCategory = '1';
		$obj->Type_idType = '1';
		$obj->Proposol_idProposol = '1';
		$obj->save();

		$std = new Student();
		$std->idStudent = $request['idStudent'];
		$std->User_type_idUser_type = 'stu';
		$std->save();


		return view('waitApprove');
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);
	}







}
