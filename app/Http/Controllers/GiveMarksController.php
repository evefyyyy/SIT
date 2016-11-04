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
use App\CriteriaMain;
use App\CriteriaSub;
use App\Template;
use App\TemplateMain;
use App\TemplateSub;
use App\Year;
use App\MainScore;
use App\SubScore;
use App\AdvisorScoreSheet;
use App\GradeAdvisor;
use Auth;

class GiveMarksController extends Controller
{
    public function selectRound()
    {
      for($i=0; $i<4; $i++){
        $data['round'][$i] = $i+1;
      }
      return view('advisor.selectRound',$data);
    }

    public function examDetail($round)
    {
      $data['round'] = $round;
      $adv = Auth::user()->user_advisor->advisor->id;
      $data['roomExam'] = DB::table('rooms_advisor')
                        ->join('rooms_exam','rooms_exam.id','=','room_exam_id')
                        ->join('rooms','rooms.id','=','room_id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('advisor_id',$adv)
                        ->select('advisor_name','room_name','exam_datetime','project_pkid','rooms.id','exam_starttime','exam_endtime')
                        ->get();
    if($data['roomExam'] != null){
      for($i=0; $i<count($data['roomExam']); $i++){
        $projectId = $data['roomExam'][$i]->project_pkid;
        $data['project'][$i] = DB::table('group_projects')->where('id',$projectId)->get();
      }
      $getRoom = $data['roomExam'][0]->id;

      $getAdv =  DB::table('rooms_advisor')
                        ->join('rooms_exam','rooms_exam.id','=','room_exam_id')
                        ->join('rooms','rooms.id','=','room_id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('room_id',$getRoom)
                        ->groupBy('advisor_id')
                        ->select('advisor_name')
                        ->get();

      foreach($getAdv as $adv){
        $explode[] = explode(' ',$adv->advisor_name);
      }
      foreach($explode as $ex){
        $data['advName'][] = $ex[0];
      }
    }


      return view('advisor.examDetail',$data);
    }

    public function giveMarksData($round,$id)
    {
      $data['url'] = url('exam/round/'.$round.'/givemarks'.'/'.$id);
      $data['method'] = 'put';
      $data['round'] = $round;
      $data['groupId'] = $id;

      $data['project'] = GroupProject::where('group_project_id',$id)->get();
      $projectId = $data['project'][0]->id;
      $typeId = $data['project'][0]->type_id;
      $yearId = $data['project'][0]->year_id;

      $data['advisor'] = DB::table('project_advisors')
                          ->join('advisors','advisors.id','=','advisor_id')
                          ->where('project_pkid',$projectId)
                          ->get();

      $data['main'] = DB::table('main_templates_score')
                      ->join('templates_main','templates_main.id','=','template_main_id')
                      ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                      ->where('type_id',$typeId)
                      ->where('round',$round)
                      ->where('year_id',$yearId)
                      ->select('main_templates_score.id','score','round','criteria_main_name')
                      ->get();
      $mainId = $data['main'][0]->id;
      $data['sub'] = DB::table('sub_templates_score')
                  ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                  ->join('templates_sub','templates_sub.id','=','template_sub_id')
                  ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                  ->where('main_template_score_id',$mainId)
                  ->select('criteria_sub_name','sub_templates_score.score','template_sub_id')
                  ->get();
      for($i=0; $i<count($data['sub']); $i++){
        $subTempId = $data['sub'][$i]->template_sub_id;
        $getScore = DB::table('advisor_scoresheet')
                      ->join('templates_sub','templates_sub.id','=','sub_template_id')
                      ->join('templates_main','templates_main.id','=','template_main_id')
                      ->where('sub_template_id',$subTempId)
                      ->where('project_pkid',$projectId)
                      ->where('round',$round)
                      ->value('score');
        $data['sub'][$i]->getScore = $getScore;
      }
      $data['grade'] = DB::table('grade_advisor')
                        ->join('templates_main','templates_main.id','=','main_template_id')
                        ->where('project_pkid',$projectId)
                        ->where('round',$round)
                        ->value('grade');
                            // dd($data);

      return view('advisor.giveMarks',$data);
    }

    public function giveMarks(Request $request,$round,$id)
    {
      $adv = Auth::user()->user_advisor->advisor->id;
      $giveScore = $request['giveScore'];
      $grade = $request['grade'];

      $projectId = DB::table('group_projects')->where('group_project_id',$id)->value('id');
      $typeId = DB::table('group_projects')->where('group_project_id',$id)->value('type_id');
      $yearId = DB::table('group_projects')->where('group_project_id',$id)->value('year_id');

      $mainTemp = DB::table('main_templates_score')
                      ->join('templates_main','templates_main.id','=','template_main_id')
                      ->where('type_id',$typeId)
                      ->where('round',$round)
                      ->where('year_id',$yearId)
                      ->select('main_templates_score.id','template_main_id','round')
                      ->get();
      $mainId = $mainTemp[0]->id;
      $scoreExist = DB::table('advisor_scoresheet')
                    ->join('templates_sub','templates_sub.id','=','sub_template_id')
                    ->join('templates_main','templates_main.id','=','template_main_id')
                    ->where('project_pkid',$projectId)
                    ->where('round',$round)
                    ->select('advisor_scoresheet.id')
                    ->get();
      if($scoreExist == null){
        $subTemp = DB::table('sub_templates_score')
                    ->join('templates_sub','templates_sub.id','=','template_sub_id')
                    ->join('templates_main','templates_main.id','=','template_main_id')
                    ->where('round',$round)
                    ->where('main_template_score_id',$mainId)
                    ->select('templates_sub.id')
                    ->get();
        for($i=0; $i<count($subTemp); $i++){
          $obj = new AdvisorScoreSheet();
          $obj->score = $giveScore[$i];
          $obj->sub_template_id = $subTemp[$i]->id;
          $obj->advisor_id = $adv;
          $obj->project_pkid = $projectId;
          $obj->submit = 0;
          $obj->save();
        }
      }else{
        for($i=0; $i<count($scoreExist); $i++){
          $existId = $scoreExist[$i]->id;
          $obj = AdvisorScoreSheet::find($existId);
          $obj->score = $giveScore[$i];
          $obj->save();
        }
      }

      $gradeExist = DB::table('grade_advisor')
                    ->join('templates_main','templates_main.id','=','main_template_id')
                    ->where('project_pkid',$projectId)
                    ->where('round',$round)
                    ->value('grade_advisor.id');
      if($gradeExist == null){
        $obj = new GradeAdvisor();
        $obj->grade = $grade;
        $obj->submit = 0;
        $obj->advisor_id = $adv;
        $obj->main_template_id = $mainTemp[0]->template_main_id;
        $obj->project_pkid = $projectId;
        $obj->save();
      }else{
        $obj = GradeAdvisor::find($gradeExist);
        $obj->grade = $grade;
        $obj->save();
      }

      return redirect('exam/round/'.$round);
    }
}
