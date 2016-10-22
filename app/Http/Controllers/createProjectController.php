<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use File;
use DB;
use Storage;
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
use Auth;


class createProjectController extends Controller {

	public function index()
	{
		$wantedStudent = null;
		// $objs['students'] = \App\Student::where('student_id','=','56130500078')->get();

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
		$data['method'] = 'post';
		$data['url'] = url('student/myproject/create');

		// $data['students'] = \App\Student::where('student_id','=','56130500078')->get();

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

		$currentYear = date("Y");
		$getYear = DB::table('years')->where('year',$currentYear)->value('id');

		$obj = new GroupProject();
		$obj->group_project_ENG_name = $request['projectNameEN'];
		$obj->group_project_TH_name = $request['projectNameTH'];
		$obj->category_id = $data2;
		$obj->type_id = $data1;
		$obj->year_id = $getYear;
		$obj->save();

		$projectId = DB::table('group_projects')->max('id');


		$stdId = $request->input('idStudent1');
		$data = DB::table('students')->where('student_id',$stdId)->value('id');
		$std = new ProjectStudent();
		$std->project_pkid = $projectId;
		$std->student_pkid = $data;
		$std->save();

		$stdId = $request->input('idStudent2');
		if($stdId != null){
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$std = new ProjectStudent();
			$std->project_pkid = $projectId;
			$std->student_pkid = $data;
			$std->save();
		}

		$stdId = $request->input('idStudent3');
		if($stdId != null){
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$std = new ProjectStudent();
			$std->project_pkid = $projectId;
			$std->student_pkid = $data;
			$std->save();
		}
		$advisor = $request['mainAdv'];
		$checkAdv = DB::table('advisors')
								->where('advisor_name','=',$advisor)
								->value('id');
		$adv = new ProjectAdvisor();
		$adv->advisor_id = $checkAdv;
		$adv->project_pkid = $projectId;
		$adv->advisor_position_id = '1';
		$adv->save();

		if($advisor = $request['coAdv']){
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

	public function edit($id)
	{
		// $data['students'] = \App\Student::where('student_id','=','56130500078')->get();

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
		$projectType = $obj1->type_id;
		$projectCategory = $obj1->category_id;

		$data['projectType'] = DB::table('types')->where('id',$projectType)->first();
		$data['projectCategory'] = DB::table('categories')->where('id',$projectCategory)->first();

		$groupStd = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$getId)
							->select('student_id')->get();


		$logInStd[] = Auth::user()->user_student->student->student_id;
		$getData = [];
		foreach($groupStd as $std){
			array_push($getData,$std->student_id);
		}
		$result = array_diff($getData,$logInStd);
		$newresult = [];
		foreach($result as $s){
			array_push($newresult,$s);
		}

		if(count($newresult) != 0){
			if(count($newresult) == 2){
				$getStd2 = DB::table('students')->where('student_id',$newresult[0])->select('student_id','student_name')->get();
				$getStd3 = DB::table('students')->where('student_id',$newresult[1])->select('student_id','student_name')->get();
				$data['stdId2'] = $getStd2[0]->student_id;
				$data['stdName2'] = $getStd2[0]->student_name;
				$data['stdId3'] = $getStd3[0]->student_id;
				$data['stdName3'] = $getStd3[0]->student_name;
			}else if(count($newresult)== 1){
				$getStd2 = DB::table('students')->where('student_id',$newresult[0])->select('student_id','student_name')->get();
				$data['stdId2'] = $getStd2[0]->student_id;
				$data['stdName2'] = $getStd2[0]->student_name;
			}
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

		$data['filename'] = DB::table('proposals')
							->where('project_pkid',$getId)
							->value('proposal_path_name');


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

		if(count($getStd) == 3){
			$std1 = $getStd[0]->id;
			$std2 = $getStd[1]->id;
			$std3 = $getStd[2]->id;

			$obj = ProjectStudent::find($std1);
			$stdId = $request->input('idStudent1');
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$obj->student_pkid = $data;
			$obj->save();

			$obj = ProjectStudent::find($std2);
			$stdId = $request->input('idStudent2');
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$obj->student_pkid = $data;
			$obj->save();

			$obj = ProjectStudent::find($std3);
			$stdId = $request->input('idStudent3');
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$obj->student_pkid = $data;
			$obj->save();
		}
		if(count($getStd) == 2){
			$std1 = $getStd[0]->id;
			$std2 = $getStd[1]->id;

			$obj = ProjectStudent::find($std1);
			$stdId = $request->input('idStudent1');
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$obj->student_pkid = $data;
			$obj->save();

			$obj = ProjectStudent::find($std2);
			$stdId = $request->input('idStudent2');
			$data = DB::table('students')->where('student_id',$stdId)->value('id');
			$obj->student_pkid = $data;
			$obj->save();
		}

		$obj = ProjectAdvisor::find($getAdv1);
		$advisor = $request['mainAdv'];
		$checkAdv = DB::table('advisors')
								->where('advisor_name','=',$advisor)
								->value('id');
		$obj->advisor_id = $checkAdv;
		$obj->advisor_position_id = '1';
		$obj->save();

		if($getAdv2 !=null ){
			$obj = ProjectAdvisor::find($getAdv2);
			$advisor = $request['coAdv'];
			$checkAdv = DB::table('advisors')
									->where('advisor_name','=',$advisor)
									->value('id');
			$obj->advisor_id = $checkAdv;
			$obj->advisor_position_id = '2';
			$obj->save();
		}else if($getAdv2 == null){
			$advisor = $request['coAdv'];
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
// delete old file
			$proposal = DB::table('proposals')
										->where('project_pkid',$id)
										->value('proposal_path_name');
			$path = base_path('public/proposalFile/');
			File::delete($path.$proposal);
// add new file
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
