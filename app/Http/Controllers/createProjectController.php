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
use App\ProjectDetail;
use App\Picture;


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
		$checkAdv = DB::table('advisors')
								->where('advisor_name','=',$advisor)
								->value('id');
		$adv = new ProjectAdvisor();
		$adv->advisor_id = $checkAdv;
		$adv->project_pkid = $projectId;
		$adv->advisor_position_id = '1';
		$adv->save();

		if($advisor = $request['browser2']){
			$checkAdv = DB::table('advisors')
									->where('advisor_name','=',$advisor)
									->value('id');
			$adv = new ProjectAdvisor();
			$adv->advisor_id = $checkAdv;
			$adv->project_pkid = $projectId;
			$adv->advisor_position_id = '2';
			$adv->save();
		}
		$path = base_path('public/proposalFile');
		$file = $request->file('myfiles');
		$filename = $file->getClientOriginalName();
		$move = $file->move($path,$filename);
		$proposal = new Proposal();
		$saveFile = $filename;
		$proposal->proposal_path_name = $saveFile;
		$proposal->project_pkid = $projectId;
		$proposal->proposal_type_id = '1';
		$proposal->save();

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
							->select('students.id','student_id','student_name')->get();
		if(count($getStd) == 3){
			$data['stdId2'] = $getStd[1]->student_id;
			$data['stdName2'] = $getStd[1]->student_name;
			$data['stdId3'] = $getStd[2]->student_id;
			$data['stdName3'] = $getStd[2]->student_name;
		}else if(count($getStd)==2){
			$data['stdId2'] = $getStd[1]->student_id;
			$data['stdName2'] = $getStd[1]->student_name;
		}

		$getAdv = DB::table('project_advisors')
							->join('advisors','advisor_id','=','advisors.id')
							->where('project_pkid',$getId)
							->select('advisor_name')->get();
		if(count($getAdv)==2){
			$data['advName1'] = $getAdv[0]->advisor_name;
			$data['advName2'] = $getAdv[1]->advisor_name;
		}else if(count($getAdv)==1){
			$data['advName1'] = $getAdv[0]->advisor_name;
		}

		$getFile = DB::table('proposals')
							->where('project_pkid',$getId)
							->value('proposal_path_name');
		$start = 6;
		$data['filename'] = mb_substr($getFile,$start);

		return view('student.editInfo',$data);

	}

	public function update(Request $request,$id)
	{

		$type = $request->input('selectType');
		$data1 = DB::table('types')->where('id',$type)->value('id');

		$cat = $request->input('selectCat');
		$data2 = DB::table('categories')->where('id',$cat)->value('id');

		$getAdv1 = DB::table('project_advisors')
							->join('advisors','advisor_id','=','advisors.id')
							->where('project_pkid',$id)
							->where('advisor_position_id','1')
							->value('project_advisors.id');
		$getAdv2 = DB::table('project_advisors')
							->join('advisors','advisor_id','=','advisors.id')
							->where('project_pkid',$id)
							->where('advisor_position_id','2')
							->value('project_advisors.id');

		$getStd = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$id)
							->select('project_students.id')->get();

		$std1 = $getStd[1]->id;
		$std2 = $getStd[2]->id;

		$getProposal = DB::table('proposals')
									->where('project_pkid',$id)
									->value('proposals.id');

		$obj = GroupProject::find($id);
		$getId = $obj->id;
		$obj->group_project_ENG_name = $request['projectNameEN'];
		$obj->group_project_TH_name = $request['projectNameTH'];
		$obj->category_id = $data2;
		$obj->type_id = $data1;
		$obj->save();

		$obj = ProjectStudent::find($std1);
		$stdId = $request->input('idStudent2');
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$obj->student_pkid = $data;
		$obj->save();

		$obj = ProjectStudent::find($std2);
		$stdId = $request->input('idStudent3');
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$obj->student_pkid = $data;
		$obj->save();

		$obj = ProjectAdvisor::find($getAdv1);
		$advisor = $request['browser1'];
		$checkAdv = DB::table('advisors')
								->where('advisor_name','=',$advisor)
								->value('id');
		$obj->advisor_id = $checkAdv;
		$obj->advisor_position_id = '1';
		$obj->save();

		if($getAdv2 !=null ){
			$obj = ProjectAdvisor::find($getAdv2);
			$advisor = $request['browser2'];
			$checkAdv = DB::table('advisors')
									->where('advisor_name','=',$advisor)
									->value('id');
			$obj->advisor_id = $checkAdv;
			$obj->advisor_position_id = '2';
			$obj->save();
		}else if($getAdv2 == null){
			$advisor = $request['browser2'];
			$checkAdv = DB::table('advisors')
									->where('advisor_name','=',$advisor)
									->value('id');
			$obj = new ProjectAdvisor();
			$obj->project_pkid = $id;
			$obj->advisor_id = $checkAdv;
			$obj->advisor_position_id = '2';
			$obj->save();
		}

		if($request->file('myfiles')){
			$path = base_path('public/proposalFile');
  		$file = $request->file('myfiles');
  		$filename = $file->getClientOriginalName();
  		$move = $file->move($path,$filename);
			$saveFile = $filename;
  		$obj = Proposal::find($getProposal);
  		$obj->proposal_path_name = $saveFile;
			$obj->save();
		}


		return redirect(url('student/myproject/waitapprove'));
	}






}
