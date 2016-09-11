<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use File;
use DB;
use Image;
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
							->select('student_id','student_name','student_email')->get();

		if(count($student)==3){
			$data['stdId1'] = $student[0]->student_id;
			$data['stdId2'] = $student[1]->student_id;
			$data['stdId3'] = $student[2]->student_id;
			$data['stdName1'] = $student[0]->student_name;
			$data['stdName2'] = $student[1]->student_name;
			$data['stdName3'] = $student[2]->student_name;
			$data['email1'] = $student[0]->student_email;
			$data['email2'] = $student[1]->student_email;
			$data['email3'] = $student[2]->student_email;
		}else if(count($student)==2){
			$data['stdId1'] = $student[0]->student_id;
			$data['stdId2'] = $student[1]->student_id;
			$data['stdName1'] = $student[0]->student_name;
			$data['stdName2'] = $student[1]->student_name;
			$data['email1'] = $student[0]->student_email;
			$data['email2'] = $student[1]->student_email;
		}

		$data['advisors'] = DB::table('project_advisors')
												->join('advisors','advisor_id','=','advisors.id')
												->where('project_pkid',$getId)
												->select('advisor_name')->get();

		$data['detail'] = DB::table('project_detail')
											->where('project_pkid',$getId)
											->value('group_project_detail');

		$data['tools'] = DB::table('project_detail')
										->where('project_pkid',$getId)
										->value('tools_detail');

		$data['poster'] = DB::table('pictures')
										->where('project_pkid',$getId)
										->where('picture_type_id','=','1')
						 			  ->value('picture_path_name');

		$data['groupPic'] = DB::table('pictures')
											->where('project_pkid',$getId)
											->where('picture_type_id','=','2')
										  ->value('picture_path_name');

		$data['screenshot'] = DB::table('pictures')
													->where('project_pkid',$getId)
													->where('picture_type_id','=','3')
													->select('picture_path_name')->get();

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

		if($detail != null){
			$obj = ProjectDetail::find($detail);
			$obj->group_project_detail = $request['detail'];
			$obj->tools_detail = $request['tools'];
			$obj->save();
		}else if($detail == null){
			$obj = new ProjectDetail();
			$obj->project_pkid = $getId;
			$obj->group_project_detail = $request['detail'];
			$obj->tools_detail = $request['tools'];
			$obj->save();
		}

		$poster = DB::table('pictures')
								->join('group_projects','project_pkid','=','group_projects.id')
								->where('project_pkid',$getId)
								->where('picture_type_id','=','1')
								->value('pictures.id');

		if($poster != null){
				if($request->file('poster')){
					$path = base_path('public/projectPoster');
					$file = $request->file('poster');
					$filename = $file->getClientOriginalName();
					$move = $file->move($path,$filename);
					$obj = Picture::find($poster);
					$savePic = '/projectPoster'."/".$filename ;
					$obj->picture_path_name = $savePic;
					$obj->picture_type_id = '1';
					$obj->save();
				}
		}else if($poster == null){
			if($request->file('poster')){
				$path = base_path('public/projectPoster');
				$file = $request->file('poster');
				$filename = $file->getClientOriginalName();
				$move = $file->move($path,$filename);
				$obj = new Picture();
				$savePic = '/projectPoster'."/".$filename ;
				$obj->picture_path_name = $savePic;
				$obj->picture_type_id = '1';
				$obj->project_pkid = $getId;
				$obj->save();
			}
		}

		$groupPic = DB::table('pictures')
								->join('group_projects','project_pkid','=','group_projects.id')
								->where('project_pkid',$getId)
								->where('picture_type_id','=','2')
								->value('pictures.id');

		if($groupPic != null){
				if($request->file('groupPicture')){
					$path = base_path('public/groupPicture');
					$file = $request->file('groupPicture');
					$filename = $file->getClientOriginalName();
					$move = $file->move($path,$filename);
					$obj = Picture::find($groupPic);
					$savePic = '/groupPicture'."/".$filename ;
					$obj->picture_path_name = $savePic;
					$obj->picture_type_id = '2';
					$obj->save();
				}
		}else if($groupPic == null){
			if($request->file('groupPicture')){
				$path = base_path('public/groupPicture');
				$file = $request->file('groupPicture');
				$filename = $file->getClientOriginalName();
				$move = $file->move($path,$filename);
				$obj = new Picture();
				$savePic = '/groupPicture'."/".$filename ;
				$obj->picture_path_name = $savePic;
				$obj->picture_type_id = '2';
				$obj->project_pkid = $getId;
				$obj->save();
			}
		}
		//
		// $screenshot = DB::table('pictures')
		// 						->join('group_projects','project_pkid','=','group_projects.id')
		// 						->where('project_pkid',$getId)
		// 						->where('picture_type_id','=','3')
		// 						->value('pictures.id');

		$countPic = DB::table('pictures')
								->where('project_pkid',$getId)
								->where('picture_type_id','=','3')
								->select('project_pkid')->get();

		if(count($countPic)<10){
			if($request->file('screenshot')){
					$file = $request->file('screenshot');
					$path = base_path('public/screenshot');
					$filename = $file->getClientOriginalName();
					$move = $file->move($path,$filename);
					$obj = new Picture();
					$savePic = '/screenshot'."/".$filename;
					$obj->picture_path_name = $savePic;
					$obj->picture_type_id = '3';
					$obj->project_pkid = $getId;
					$obj->save();
			}
		}
			return redirect('/showproject');
	}
}
