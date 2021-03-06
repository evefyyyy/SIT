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

class showProjectController extends Controller
{
  // public function index()
  // {
  //   if(Auth::check()){
  //     $objs = Auth::user()->user_student->student->student_id;
  //     $checkStd = DB::table('students')->where('student_id',$objs)->value('id');
  //     $checkProject = DB::table('project_students')->where('student_pkid',$checkStd)->value('project_pkid');
  //     $obj['checkProject'] = $checkProject;
  //     $obj['projectNameEN'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_ENG_name');
  //     $obj['projectNameTH'] = DB::table('group_projects')->where('id',$checkProject)->value('group_project_TH_name');
  //     $student = DB::table('project_students')
  //                 ->join('students','student_pkid','=','students.id')
  //                 ->where('project_pkid',$checkProject)
  //                 ->select('student_id','student_name','student_email')->get();
  //     $obj['student'] = $student;
  //
  //     $obj['advisors'] = DB::table('project_advisors')
  //                         ->join('advisors','advisor_id','=','advisors.id')
  //                         ->where('project_pkid',$checkProject)
  //                         ->select('advisor_name')->get();
  //
  //     $obj['detail'] = DB::table('group_projects')
  //                       ->join('project_detail','group_projects.id','=','project_pkid')
  //                       ->where('group_projects.id',$checkProject)
  //                       ->value('group_project_detail');
  //
  //     $obj['tools'] = DB::table('group_projects')
  //                       ->join('project_detail','group_projects.id','=','project_pkid')
  //                       ->where('group_projects.id',$checkProject)
  //                       ->value('tools_detail');
  //
  //     $obj['video'] = DB::table('group_projects')
  //                     ->join('project_detail','group_projects.id','=','project_pkid')
  //                     ->where('group_projects.id',$checkProject)
  //                     ->value('video');
  //
  //     $obj['poster'] = DB::table('pictures')
  //                       ->where('project_pkid',$checkProject)
  //                       ->where('picture_type_id','=','1')
  //                       ->value('picture_path_name');
  //
  //     $obj['groupPic'] = DB::table('pictures')
  //                     ->where('project_pkid',$checkProject)
  //                     ->where('picture_type_id','=','2')
  //                     ->value('picture_path_name');
  //
  //     $obj['screenshot'] = DB::table('pictures')
  //                         ->where('project_pkid',$checkProject)
  //                         ->where('picture_type_id','=','3')
  //                         ->select('picture_path_name')->get();
  //   }
  //   return view('showProject', $obj);
  // }

  public function show($groupId){
    $obj['groupId'] = $groupId;
    $id = DB::table('group_projects')->where('group_project_id',$groupId)->value('id');
    $obj['checkProject'] = $id;
    $obj['projectNameEN'] = DB::table('group_projects')->where('id',$id)->value('group_project_ENG_name');
    $obj['projectNameTH'] = DB::table('group_projects')->where('id',$id)->value('group_project_TH_name');
    $student = DB::table('project_students')
                ->join('students','student_pkid','=','students.id')
                ->where('project_pkid',$id)
                ->select('student_id','student_name','student_email')->get();
    $obj['student'] = $student;

    $obj['advisors'] = DB::table('project_advisors')
                        ->join('advisors','advisor_id','=','advisors.id')
                        ->where('project_pkid',$id)
                        ->select('advisor_name')->get();

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
                        ->select('picture_path_name')->get();
      return view('showProject',$obj);
  }
}
