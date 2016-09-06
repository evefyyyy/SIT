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



class editProjectController extends Controller {



	public function edit($id)
	{
		$data['url'] = url('student/myproject/edit/'.$id);
		$data['method'] = "put";

		$obj = GroupProject::find($id);
		$getId = $obj->id;
		$data['projectNameEN'] = $obj->group_project_eng_name;
		$data['projectNameTH'] = $obj->group_project_th_name;
		$getType = $obj->type_id;
		$data['types'] = DB::table('group_projects')
											->join('types','type_id','=','types.id')
											->where('type_id',$getType)
											->value('type_name');
		$getCat = $obj->category_id;
		$data['categories'] = DB::table('group_projects')
													->join('categories','category_id','=','categories.id')
													->where('category_id',$getCat)
													->value('category_name');

		$student = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$getId)
							->select('student_id','student_prefix','student_fname','student_lname','student_email')->get();

		if(count($student)==3){
			$data['stdId1'] = $student[0]->student_id;
			$data['stdId2'] = $student[1]->student_id;
			$data['stdId3'] = $student[2]->student_id;
			$data['stdPre1'] = $student[0]->student_prefix;
			$data['stdPre2'] = $student[1]->student_prefix;
			$data['stdPre3'] = $student[2]->student_prefix;
			$data['stdFname1'] = $student[0]->student_fname;
			$data['stdFname2'] = $student[1]->student_fname;
			$data['stdFname3'] = $student[2]->student_fname;
			$data['stdLname1'] = $student[0]->student_lname;
			$data['stdLname2'] = $student[1]->student_lname;
			$data['stdLname3'] = $student[2]->student_lname;
			$data['email1'] = $student[0]->student_email;
			$data['email2'] = $student[1]->student_email;
			$data['email3'] = $student[2]->student_email;
		}else if(count($student)==2){
			$data['stdId1'] = $student[0]->student_id;
			$data['stdId2'] = $student[1]->student_id;
			$data['stdPre1'] = $student[0]->student_prefix;
			$data['stdPre2'] = $student[1]->student_prefix;
			$data['stdFname1'] = $student[0]->student_fname;
			$data['stdFname2'] = $student[1]->student_fname;
			$data['stdLname1'] = $student[0]->student_lname;
			$data['stdLname2'] = $student[1]->student_lname;
			$data['email1'] = $student[0]->student_email;
			$data['email2'] = $student[1]->student_email;
		}

		$data['advisors'] = DB::table('project_advisors')
												->join('advisors','advisor_id','=','advisors.id')
												->where('project_pkid',$getId)
												->select('prefix','advisor_fname','advisor_lname')->get();

		$data['detail'] = DB::table('project_detail')
											->join('group_projects','project_pkid','=','group_projects.id')
											->where('project_pkid',$getId)
											->value('group_project_detail');

		$data['tools'] = DB::table('project_detail')
										->join('group_projects','project_pkid','=','group_projects.id')
										->where('project_pkid',$getId)
										->value('tools_detail');

		$data['picture'] = DB::table('pictures')
										->join('group_projects','project_pkid','=','group_projects.id')
										->where('project_pkid',$getId)
						 			  ->value('pictures.picture_path_name');

		return view('student.editProject',$data);

	}

	public function update(Request $request,$id)
	{
		$obj = GroupProject::find($id);
		$getId = $obj->id;

		$student = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$getId)
							->select('students.id')->get();

		if(count($student)==3){
			$std1 = $student[0]->id;
			$std2 = $student[1]->id;
			$std3 = $student[2]->id;
		}else if(count($student)==2){
			$std1 = $student[0]->id;
			$std2 = $student[1]->id;
		}

		if(count($student)==3){
			$obj = Student::find($std1);
			$obj->student_email = $request['email1'];
			$obj->save();

			$obj = Student::find($std2);
			$obj->student_email = $request['email2'];
			$obj->save();

			$obj = Student::find($std3);
			$obj->student_email = $request['email3'];
			$obj->save();
		}else if(count($student)==2){
			$obj = Student::find($std1);
			$obj->student_email = $request['email1'];
			$obj->save();

			$obj = Student::find($std2);
			$obj->student_email = $request['email2'];
			$obj->save();
		}

		$detail = DB::table('project_detail')
							->join('group_projects','project_pkid','=','group_projects.id')
							->where('project_pkid',$getId)
							->value('project_detail.id');

		$obj = ProjectDetail::find($detail);
		$obj->group_project_detail = $request['detail'];
		$obj->tools_detail = $request['tools'];
		$obj->save();

		$picture = DB::table('pictures')
								->join('group_projects','project_pkid','=','group_projects.id')
								->where('project_pkid',$getId)
								->value('pictures.id');

		if($request->file('poster')){
			$path = '/Applications/MAMP/htdocs/SIT-master/public/projectPoster';
			$file = $request->file('poster');
			$filename = $file->getClientOriginalName();
			$move = $file->move($path,$filename);
			$obj = Picture::find($picture);
			$naja = '/projectPoster'."/".$filename ;
			$obj->picture_path_name = $naja;
			$obj->save();
		}

		return redirect(url('showproject'));
	}
}
