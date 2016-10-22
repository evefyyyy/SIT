<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Advisor;
use App\Category;
use App\GroupProject;
use App\GroupAdvisor;
use App\ProjectStudent;
use App\Student;
use App\Type;
use App\User;
use App\Http\Requests;
use App\Proposal;
use Auth;

class AdvisorProjectController extends Controller
{
  public function index()
  {
    $login = Auth::user()->user_advisor->advisor_id;
    $advProject = DB::table('project_advisors')->where('advisor_id',$login)->select('project_pkid')->get();
    $count = count($advProject);
    if($count != 0){
      for($i=0;$i<$count;$i++){
        $id[$i] = $advProject[$i]->project_pkid;
        $project[$i] = GroupProject::where('id',$id[$i])->get();
      }
      $obj['project'] = array_flatten($project);

      for($i=0;$i<$count;$i++){
        $id[$i] = $advProject[$i]->project_pkid;
  // advisor
        $adv[$i] = DB::table('project_advisors')
                    ->join('advisors','advisor_id','=','advisors.id')
                    ->where('project_pkid',$id[$i])
                    ->select('advisor_name')->get();
        $obj['project'][$i]['advisor'] = $adv[$i];

  // proposal file
        $firstDraftProposal[$i] = DB::table('proposals')
                                  ->where('project_pkid',$id[$i])
                                  ->where('proposal_type_id','=','1')
                                  ->value('proposal_path_name');
        $firstProposal[$i] = DB::table('proposals')
                                  ->where('project_pkid',$id[$i])
                                  ->where('proposal_type_id','=','2')
                                  ->value('proposal_path_name');
        $secondProposal[$i] = DB::table('proposals')
                                  ->where('project_pkid',$id[$i])
                                  ->where('proposal_type_id','=','3')
                                  ->value('proposal_path_name');
        $thirdProposal[$i] = DB::table('proposals')
                                  ->where('project_pkid',$id[$i])
                                  ->where('proposal_type_id','=','4')
                                  ->value('proposal_path_name');
        $finalProposal[$i] = DB::table('proposals')
                                  ->where('project_pkid',$id[$i])
                                  ->where('proposal_type_id','=','5')
                                  ->value('proposal_path_name');

        $obj['project'][$i]['firstDraftProposal'] = $firstDraftProposal[$i];
        $obj['project'][$i]['firstProposal'] = $firstProposal[$i];
        $obj['project'][$i]['secondProposal'] = $secondProposal[$i];
        $obj['project'][$i]['thirdProposal'] = $thirdProposal[$i];
        $obj['project'][$i]['finalProposal'] = $finalProposal[$i];
      }
    }else{
        $obj['project'] = 0;
    }
  
    return view('advisor.advProject',$obj);
  }

  public function show($id){
    $obj['checkProject'] = $id;
    $obj['projectNameEN'] = DB::table('group_projects')->where('id',$id)->value('group_project_ENG_name');
    $obj['projectNameTH'] = DB::table('group_projects')->where('id',$id)->value('group_project_TH_name');
    $student = DB::table('project_students')
                ->join('students','student_pkid','=','students.id')
                ->where('project_pkid',$id)
                ->select('student_id','student_name','student_email')->get();
    $obj['student'] = $student;

    if(count($student)==3){
      $obj['stdId1'] = $student[0]->student_id;
      $obj['stdId2'] = $student[1]->student_id;
      $obj['stdId3'] = $student[2]->student_id;
      $obj['stdName1'] = $student[0]->student_name;
      $obj['stdName2'] = $student[1]->student_name;
      $obj['stdName3'] = $student[2]->student_name;
      $obj['email1'] = $student[0]->student_email;
      $obj['email2'] = $student[1]->student_email;
      $obj['email3'] = $student[2]->student_email;
    }else if(count($student)==2){
      $obj['stdId1'] = $student[0]->student_id;
      $obj['stdId2'] = $student[1]->student_id;
      $obj['stdName1'] = $student[0]->student_name;
      $obj['stdName2'] = $student[1]->student_name;
      $obj['email1'] = $student[0]->student_email;
      $obj['email2'] = $student[1]->student_email;
    }

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
