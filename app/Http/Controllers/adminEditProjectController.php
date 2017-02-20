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
use Auth;

class adminEditProjectController extends Controller
{
    public function index($groupId){

      $obj['url'] = url('project/'.$groupId.'/edit');
      $obj['method'] = "put";
      $obj['groupId'] = $groupId;
      $id = DB::table('group_projects')->where('group_project_id',$groupId)->value('id');
      $obj['projectNameEN'] = DB::table('group_projects')->where('id',$id)->value('group_project_ENG_name');
      $obj['projectNameTH'] = DB::table('group_projects')->where('id',$id)->value('group_project_TH_name');
      $obj['projectType'] = DB::table('group_projects')->where('id',$id)->value('type_id');
      $obj['projectCat'] = DB::table('group_projects')->where('id',$id)->value('category_id');
      $student = DB::table('project_students')
                  ->join('students','student_pkid','=','students.id')
                  ->where('project_pkid',$id)
                  ->select('student_id','student_name','student_email')->get();
      $obj['student'] = $student;

      $obj['mainAdv'] = DB::table('project_advisors')
                        ->join('advisors','advisor_id','=','advisors.id')
                        ->where('project_pkid',$id)
                        ->where('advisor_position_id',1)
                        ->select('advisors.id','advisor_name')->get();

      $obj['subAdv'] = DB::table('project_advisors')
                        ->join('advisors','advisor_id','=','advisors.id')
                        ->where('project_pkid',$id)
                        ->where('advisor_position_id',2)
                        ->select('advisors.id','advisor_name')->get();

      $obj['detail'] = DB::table('group_projects')
                        ->join('project_detail','group_projects.id','=','project_pkid')
                        ->where('group_projects.id',$id)
                        ->value('group_project_detail');

      $obj['tools'] = DB::table('group_projects')
                        ->join('project_detail','group_projects.id','=','project_pkid')
                        ->where('group_projects.id',$id)
                        ->value('tools_detail');

      $obj['video'] = DB::table('group_projects')
                      ->join('project_detail','group_projects.id','=','project_pkid')
                      ->where('group_projects.id',$id)
                      ->value('video');

      $obj['poster'] = DB::table('pictures')
                        ->where('project_pkid',$id)
                        ->where('picture_type_id','=','1')
                        ->value('picture_path_name');

      $obj['groupPic'] = DB::table('pictures')
                      ->where('project_pkid',$id)
                      ->where('picture_type_id','=','2')
                      ->value('picture_path_name');

      $obj['screenshot'] = DB::table('pictures')
                          ->where('project_pkid',$id)
                          ->where('picture_type_id','=','3')
                          ->select('id','picture_path_name')->get();

      $obj['type'] = DB::table('types')->get();

      $obj['category'] = DB::table('categories')->get();

      $obj['alladvisor'] = DB::table('advisors')->get();

      return view('admin.editStdProject',$obj);
    }

    public function update(Request $request,$groupId){
      $id = DB::table('group_projects')->where('group_project_id',$groupId)->value('id');
      $obj = GroupProject::find($id);
      $obj->group_project_eng_name = $request['projectNameEN'];
      $obj->group_project_th_name = $request['projectNameTH'];
      $obj->type_id = $request['selectType'];
      $obj->category_id = $request['selectCat'];
      $obj->save();

      $detailId = DB::table('project_detail')->where('project_pkid',$id)->value('id');
      $checkUrl = strrpos($request['video'],'www.youtube.com/watch?v=');
      $obj = ProjectDetail::find($detailId);
      $obj->group_project_detail = $request['detail'];
      $obj->tools_detail = $request['tools'];
      if($checkUrl || $request['video'] == null){
				$obj->video = str_replace('watch?v=','embed/',$request['video']);
			}
      $obj->save();

      $mainAdvisor = DB::table('project_advisors')
                      ->where('project_pkid',$id)
                      ->where('advisor_position_id',1)
                      ->value('id');
      $obj = ProjectAdvisor::find($mainAdvisor);
      $obj->advisor_id = $request['mainAdv'];
      $obj->save();

      $subAdvisor = DB::table('project_advisors')
                    ->where('project_pkid',$id)
                    ->where('advisor_position_id',2)
                    ->value('id');
      if($subAdvisor != null){
        if($request['subAdv'] != null){
          $obj = ProjectAdvisor::find($subAdvisor);
          $obj->advisor_id = $request['subAdv'];
          $obj->save();
        }else{
          $obj = ProjectAdvisor::find($subAdvisor);
          $obj->delete();
        }
      }else{
        $obj = new ProjectAdvisor();
        $obj->project_pkid = $id;
        $obj->advisor_id = $request['subAdv'];
        $obj->advisor_position_id = 2;
        $obj->save();
      }
      dd($request['stdId']);

      return redirect('/showproject'.'/'.$groupId);
    }

}
