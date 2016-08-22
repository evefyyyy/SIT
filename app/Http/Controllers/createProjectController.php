<?php

namespace App\Http\Controllers;
use App\Model\studentProfile;
use Input;
use Redirect;
use File;

class createProjectController extends Controller {

	public function studentName()
	{
		
		$wantedStudent = null;

		$students = \App\Student::where('idStudent','=','56130500078')->get();



		return view('createProject',compact('students'));

	}

	





}