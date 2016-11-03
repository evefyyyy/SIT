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
use Auth;



class editProjectController extends Controller {



	public function index()
	{
		$data['url'] = url('student/myproject/edit');
		$data['method'] = "put";

		$stdId = Auth::user()->user_student->student_pkid;
		$id = DB::table('project_students')->where('student_pkid',$stdId)->value('project_pkid');

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
		$data['student'] = $student;

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

		$data['video'] = DB::table('project_detail')
											->where('project_pkid',$getId)
											->value('video');

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
							->select('id','picture_path_name')->get();


		return view('student.editProject',$data);

	}

	public function update(Request $request)
	{

		$stdId = Auth::user()->user_student->student_pkid;
		$id = DB::table('project_students')->where('student_pkid',$stdId)->value('project_pkid');
		$groupId = DB::table('group_projects')->where('id',$id)->value('group_project_id');

		$obj = GroupProject::find($id);
		$getId = $obj->id;

		$email = $request['email'];
		$student = DB::table('project_students')
							->join('students','student_pkid','=','students.id')
							->where('project_pkid',$getId)
							->select('students.id')->get();
		$countStd = count($student);
		for($i=0; $i<$countStd; $i++){
			$stdId = $student[$i]->id;
			$obj = Student::find($stdId);
			$obj->student_email = $email[$i];
			$obj->save();
		}

		$detail = DB::table('project_detail')
							->join('group_projects','project_pkid','=','group_projects.id')
							->where('project_pkid',$getId)
							->value('project_detail.id');

		$checkUrl = strrpos($request['video'],'www.youtube.com/watch?v=');

		if($detail != null){
			$obj = ProjectDetail::find($detail);
			$obj->group_project_detail = $request['detail'];
			$obj->tools_detail = $request['tools'];
			if($checkUrl || $request['video'] == null){
				$obj->video = str_replace('watch?v=','embed/',$request['video']);
			}
			$obj->save();
		}else if($detail == null){
			$obj = new ProjectDetail();
			$obj->project_pkid = $getId;
			$obj->group_project_detail = $request['detail'];
			$obj->tools_detail = $request['tools'];
			if($checkUrl || $request['video'] == null){
				$obj->video = str_replace('watch?v=','embed/',$request['video']);
			}
			$obj->save();
		}


		$poster = DB::table('pictures')
								->join('group_projects','project_pkid','=','group_projects.id')
								->where('project_pkid',$getId)
								->where('picture_type_id','=','1')
								->value('pictures.id');

		if($poster != null){
				if($request->file('poster')){
					$path = base_path('public_html/projectPoster');
					File::Delete($path.$poster);
					$file = $request->file('poster');
					$extension = $file->getClientOriginalExtension();
					$filename = "poster".$groupId.".".$extension;
					$move = $file->move($path,$filename);
					$obj = Picture::find($poster);
					$savePic = '/projectPoster'."/".$filename ;
					$obj->picture_path_name = $savePic;
					$obj->picture_type_id = '1';
					$obj->save();
				}
		}else if($poster == null){
			if($request->file('poster')){
				$path = base_path('public_html/projectPoster');
				$file = $request->file('poster');
				$extension = $file->getClientOriginalExtension();
				$filename = "poster".$groupId.".".$extension;
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
					$path = base_path('public_html/groupPicture');
					File::Delete($path.$groupPic);
					$file = $request->file('groupPicture');
					$extension = $file->getClientOriginalExtension();
					$filename = "groupPic".$groupId.".".$extension;
					$move = $file->move($path,$filename);
					$obj = Picture::find($groupPic);
					$savePic = '/groupPicture'."/".$filename ;
					$obj->picture_path_name = $savePic;
					$obj->picture_type_id = '2';
					$obj->save();
				}
		}else if($groupPic == null){
			if($request->file('groupPicture')){
				$path = base_path('public_html/groupPicture');
				$file = $request->file('groupPicture');
				$extension = $file->getClientOriginalExtension();
				$filename = "groupPic".$groupId.".".$extension;
				$move = $file->move($path,$filename);
				$obj = new Picture();
				$savePic = '/groupPicture'."/".$filename ;
				$obj->picture_path_name = $savePic;
				$obj->picture_type_id = '2';
				$obj->project_pkid = $getId;
				$obj->save();
			}
		}

		$countPic = DB::table('pictures')
								->where('project_pkid',$getId)
								->where('picture_type_id','=','3')
								->select('project_pkid')->get();
		$count = count($countPic);

								if(count($countPic)<10) {
										$screenshot = $request->file('screenshot');
										$unuseScreenshot = $request['uploadIndex'];
										if($unuseScreenshot != null){
											$explodeUnuse = explode(",",$unuseScreenshot);
											$getScreenshot = array_diff_key($screenshot,$explodeUnuse);
													foreach ($getScreenshot as $key => $screen) {
															$numPic = $count+$key+1;
															$path = base_path('public_html/screenshot');
															$extension = $screen->getClientOriginalExtension();
															$filename = "screenshot".$numPic.".".$groupId.".".$extension;
															$move = $screen->move($path,$filename);
															$savePic = '/screenshot'."/".$filename;
															$obj = new Picture();
															$obj->picture_path_name = $savePic;
															$obj->picture_type_id = '3';
			 												$obj->project_pkid = $getId;
															$obj->save();
													}
										}else{
											if($screenshot[0] != null){
													foreach ($screenshot as $key => $screen) {
														$numPic = $count+$key+1;
														$path = base_path('public_html/screenshot');
														$extension = $screen->getClientOriginalExtension();
														$filename = "screenshot".$numPic.".".$groupId.".".$extension;
														$move = $screen->move($path,$filename);
														$savePic = '/screenshot'."/".$filename;
														$obj = new Picture();
														$obj->picture_path_name = $savePic;
														$obj->picture_type_id = '3';
		 												$obj->project_pkid = $getId;
														$obj->save();
													}
												}
										}
							}

			return redirect('/showproject'.'/'.$groupId);
	}

	public function upload(Request $requst)
	{
		dd($request);
		$stdId = Auth::user()->user_student->student_pkid;
		$id = DB::table('project_students')->where('student_pkid',$stdId)->value('project_pkid');
		$groupId = DB::table('group_projects')->where('id',$id)->value('group_project_id');

		$obj = GroupProject::find($id);
		$getId = $obj->id;
	}
}
