<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GroupProject;
use App\ProjectStudent;

class MyScore extends Controller
{
    public function ShowMyScore(){
    	$project_student = ProjectStudent::all();
    	return view('student.myscore', compact('project_student'));
    }
}
