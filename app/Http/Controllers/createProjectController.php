<?php

namespace App\Http\Controllers;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use File;
use DB;
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

		// $advisor = $request['browser1'];
		// $data = strpos($advisor," ");
		// $data2 = strpos($advisor," ",$data+1);
		// $lname = substr($advisor,$data2);
		// echo $advisor." substring lname :: ".$lname." :: ผมหาไว้แต่นามสกุล หาชื่อต่อละไปค้นใน database เอา id มาใช้นะพี่ฟาง" ;

		// $advisor = $request->input('selectAdv1');
		// $data = DB::table('advisors')->where('id',$advisor)->value('id');
		// $adv = new ProjectAdvisor();
		// $adv->advisor_id = $data;
		// $adv->project_pkid = $projectId;
		// $adv->advisor_position_id = '1';
		// $adv->save();
		// //
		// $adv = new ProjectAdvisor();
		// $adv->advisor_id = $request['browser2'];
		// $adv->project_pkid = $projectId;
		// $adv->advisor_position_id = '2';
		// $adv->save();

		$stdId1 = $request->input('idStudent1');
		$stdData1 = DB::table('students')->where('student_id',$stdId1)->select('student_prefix','student_fname','student_lname')->first();
		$stdName1 = $stdData1->student_prefix.$stdData1->student_fname.' '.$stdData1->student_lname;

		$stdId2 = $request->input('idStudent2');
		$stdData2 = DB::table('students')->where('student_id',$stdId2)->select('student_prefix','student_fname','student_lname')->first();
		$stdName2 = $stdData2->student_prefix.$stdData2->student_fname.' '.$stdData2->student_lname;

		$stdId3 = $request->input('idStudent3');
		if($stdId3 != null){
		$stdData3 = DB::table('students')->where('student_id',$stdId3)->select('student_prefix','student_fname','student_lname')->first();
		$stdName3 = $stdData3->student_prefix.$stdData3->student_fname.' '.$stdData3->student_lname;
		$nextObj['stdId3'] = $request->input('idStudent3');
		$nextObj['stdName3'] = $stdName3;
		}else{
			$nextObj['stdId3'] = '';
			$nextObj['stdName3'] = '';
		}

		$catName = DB::table('categories')->where('id',$data2)->value('category_name');
		$typeName= DB::table('types')->where('id',$data1)->value('type_name');

		$nextObj['projectNameEN'] = $request->input('projectNameEN');
		$nextObj['projectNameTH'] = $request->input('projectNameTH');
		$nextObj['categories'] = $catName;
		$nextObj['types'] = $typeName;
		$nextObj['stdId1'] = $request->input('idStudent1');
		$nextObj['stdName1'] = $stdName1;
		$nextObj['stdId2'] = $request->input('idStudent2');
		$nextObj['stdName2'] = $stdName2;





		return view('waitApprove',$nextObj);
	}

	public function show($id)
	{
		$obj = GroupProject::find($id);

		return view('waitApprove');
	}







}
