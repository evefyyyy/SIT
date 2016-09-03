<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use File;
use DB;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GroupProject;
use App\Student;
use App\Category;
use App\Type;
use App\Advisor;
use App\ProjectAdvisor;
use App\ProjectStudent;
use App\ProjectProposal;
use App\Proposal;



class editProjectController extends Controller {

	public function index()
	{
		$objs = '56130500078';

		$checkStd = DB::table('students')->where('student_id',$objs)->value('id');
		$checkProject = DB::table('project_students')->where('student_pkid',$checkStd)->value('project_pkid');
		$obj['projectNameEN'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_ENG_name');
		$obj['projectNameTH'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_TH_name');
		$student = DB::table('project_students')
								->join('students','student_pkid','=','students.id')
								->where('project_pkid',$checkProject)
								->select('student_id','student_prefix','student_fname','student_lname')->get();

		if(count($student)==3){
			$obj['stdId1'] = $student[0]->student_id;
			$obj['stdId2'] = $student[1]->student_id;
			$obj['stdId3'] = $student[2]->student_id;
			$obj['stdPre1'] = $student[0]->student_prefix;
			$obj['stdPre2'] = $student[1]->student_prefix;
			$obj['stdPre3'] = $student[2]->student_prefix;
			$obj['stdFname1'] = $student[0]->student_fname;
			$obj['stdFname2'] = $student[1]->student_fname;
			$obj['stdFname3'] = $student[2]->student_fname;
			$obj['stdLname1'] = $student[0]->student_lname;
			$obj['stdLname2'] = $student[1]->student_lname;
			$obj['stdLname3'] = $student[2]->student_lname;
		}else if(count($student)==2){
			$obj['stdId1'] = $student[0]->student_id;
			$obj['stdId2'] = $student[1]->student_id;
			$obj['stdPre1'] = $student[0]->student_prefix;
			$obj['stdPre2'] = $student[1]->student_prefix;
			$obj['stdFname1'] = $student[0]->student_fname;
			$obj['stdFname2'] = $student[1]->student_fname;
			$obj['stdLname1'] = $student[0]->student_lname;
			$obj['stdLname2'] = $student[1]->student_lname;
		}

			$obj['advisors'] = DB::table('project_advisors')
													->join('advisors','advisor_id','=','advisors.id')
													->where('project_pkid',$checkProject)
													->select('prefix','advisor_fname','advisor_lname')->get();

		return view('student.editProject',$obj);

	}

}
