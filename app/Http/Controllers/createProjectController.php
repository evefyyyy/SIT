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


		return view('student.createProject',$objs);

	}

	public function create()
	{
		//$data['method'] = 'post';
		//$data['url'] = url('student/myproject/');
		return view('student.waitApprove');
	}

	public function store(Request $request)
	{
		$type = $request->input('selectType');
		$data1 = DB::table('types')->where('id',$type)->value('id');

		$cat = $request->input('selectCat');
		$data2 = DB::table('categories')->where('id',$cat)->value('id');

		$obj = new GroupProject();
		$obj->group_project_ENG_name = $request['projectNameEN'];
		$obj->group_project_TH_name = $request['projectNameTH'];
		$obj->category_id = $data2;
		$obj->type_id = $data1;
		$obj->save();

		$projectId = DB::table('group_projects')->max('id');


		$stdId = $request->input('idStudent1');
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$std = new ProjectStudent();
		$std->project_pkid = $projectId;
		$std->student_pkid = $data;
		$std->save();

		$stdId = $request->input('idStudent2');
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$std = new ProjectStudent();
		$std->project_pkid = $projectId;
		$std->student_pkid = $data;
		$std->save();

		$stdId = $request->input('idStudent3');
		if($stdId != null){
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$std = new ProjectStudent();
		$std->project_pkid = $projectId;
		$std->student_pkid = $data;
		$std->save();


		}

		$advisor = $request['browser1'];
		$index = mb_strpos($advisor," ");
		$index2 = mb_strpos($advisor," ",$index+1);
		$lname = mb_substr($advisor,$index2+1);
		$fname = mb_substr($advisor,$index+1,$index2-$index);
		$advId = DB::table('advisors')->where('advisor_fname',$fname)
									  							->where('advisor_lname',$lname)->value('id');
		$adv = new ProjectAdvisor();
		$adv->advisor_id = $advId;
		$adv->project_pkid = $projectId;
		$adv->advisor_position_id = '1';
		$adv->save();

		$advisor = $request['browser2'];
		$index = mb_strpos($advisor," ");
		$index2 = mb_strpos($advisor," ",$index+1);
		$lname = mb_substr($advisor,$index2+1);
		$fname = mb_substr($advisor,$index+1,$index2-$index);
		$advId = DB::table('advisors')->where('advisor_fname',$fname)
									  							->where('advisor_lname',$lname)->value('id');
		$adv = new ProjectAdvisor();
		$adv->advisor_id = $advId;
		$adv->project_pkid = $projectId;
		$adv->advisor_position_id = '2';
		$adv->save();

		$path = '/Applications/MAMP/htdocs/SIT-master/public/test';
		$file = $request->file('myfiles')	;
		$filename = $file->getClientOriginalName();
		$move = $file->move($path,$filename);



		return redirect(url('student/myproject/waitapprove'));
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);

		return view('student.waitApprove');
	}







}
