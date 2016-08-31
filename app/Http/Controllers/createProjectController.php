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
	//
	}

	public function create()
	{
		$data['method'] = 'post';
		$data['url'] = url('student/myproject/create');

		$data['students'] = \App\Student::where('student_id','=','56130500078')->get();

		$category = Category::all();
		$data['category'] = $category;

		$type = Type::all();
		$data['type'] = $type;

		$advisor = Advisor::all();
		$data['advisor'] = $advisor;
		return view('student.createProject',$data);
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

		$proposal = new Proposal();
		$proposal->proposal_path_name = $move;
		$proposal->save();

		$proposalId = DB::table('proposals')->max('id');

		$fileUpload = new ProjectProposal();
		$fileUpload->project_pkid = $projectId;
		$fileUpload->proposal_id = $proposalId;
		$fileUpload->save();

		return redirect(url('student/myproject/waitapprove'));
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);
	}

	public function edit($id)
	{
		$data['students'] = \App\Student::where('student_id','=','56130500078')->get();

		$category = Category::all();
		$data['category'] = $category;

		$type = Type::all();
		$data['type'] = $type;

		$advisor = Advisor::all();
		$data['advisor'] = $advisor;

		$data['url'] = url('student/myproject/create/'.$id);
		$data['method'] = "put";

		$obj1 = GroupProject::find($id);
		$getId = $obj1->id;
		$data['projectNameEN'] = $obj1->group_project_eng_name;
		$data['projectNameTH'] = $obj1->group_project_th_name;

		$getStd = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$getId)
							->select('students.id','student_prefix','student_id','student_fname','student_lname')->get();
		if(count($getStd) == 3){
			$data['stdId2'] = $getStd[1]->student_id;
			$data['stdPre2'] = $getStd[1]->student_prefix;
			$data['stdFname2'] = $getStd[1]->student_fname;
			$data['stdLname2'] = $getStd[1]->student_lname;
			$data['stdId3'] = $getStd[2]->student_id;
			$data['stdPre3'] = $getStd[2]->student_prefix;
			$data['stdFname3'] = $getStd[2]->student_fname;
			$data['stdLname3'] = $getStd[2]->student_lname;
		}else if(count($getStd)==2){
			$data['stdId2'] = $getStd[1]->student_id;
			$data['stdPre2'] = $getStd[1]->student_prefix;
			$data['stdFname2'] = $getStd[1]->student_fname;
			$data['stdLname2'] = $getStd[1]->student_lname;
		}

		$getAdv = DB::table('project_advisors')
							->join('advisors','advisor_id','=','advisors.id')
							->where('project_pkid',$getId)
							->select('prefix','advisor_fname','advisor_lname')->get();
		$data['advPre1'] = $getAdv[0]->prefix;
		$data['advFname1'] = $getAdv[0]->advisor_fname;
		$data['advLname1'] = $getAdv[0]->advisor_lname;
		$data['advPre2'] = $getAdv[1]->prefix;
		$data['advFname2'] = $getAdv[1]->advisor_fname;
		$data['advLname2'] = $getAdv[1]->advisor_lname;

		$getFile = DB::table('project_proposals')
							->join('proposals','proposal_id','=','proposals.id')
							->where('project_pkid',$getId)
							->value('proposal_path_name');
		// $data['fileName'] = $getFile->proposal_path_name;

		// dd($getFile);

		return view('student.createProject',$data);

	}

	public function update(Request $request,$id)
	{
		$type = $request->input('selectType');
		$data1 = DB::table('types')->where('id',$type)->value('id');

		$cat = $request->input('selectCat');
		$data2 = DB::table('categories')->where('id',$cat)->value('id');

		$obj = GroupProject::find($id);
		$getId = $obj->id;
		$obj->group_project_ENG_name = $request['projectNameEN'];
		$obj->group_project_TH_name = $request['projectNameTH'];
		$obj->category_id = $data2;
		$obj->type_id = $data1;
		$obj->save();

		return redirect(url('student/myproject/waitapprove'));
	}






}
