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
use App\ScoreTest;
use App\ScoreLevel;

class ScoreRecordController extends Controller
{
  public function index()
  {
    $project = GroupProject::where('group_project_approve','=','1')->where('group_project_id','like','IT%')->get();
    $obj['project'] = array_flatten($project);
    $count = count($obj['project']);


    for($i=0;$i<$count;$i++){
      $get[$i] = $obj['project'][$i]->id;
      $score1[$i] = DB::table('score_tests')
                    ->where('score_test_round','=','1')
                    ->where('project_pkid',$get[$i])->get();
      foreach($score1[$i] as $s1){
        if($s1->score_test_sum == 4){
          $obj['project'][$i]['grade1'] = 'A';
          $obj['project'][$i]['level1'] = 'Very Good';
        }elseif($s1->score_test_sum == 3){
          $obj['project'][$i]['grade1'] = 'B';
          $obj['project'][$i]['level1'] = 'Good';
        }elseif($s1->score_test_sum == 2.5){
          $obj['project'][$i]['grade1'] = 'C+';
          $obj['project'][$i]['level1'] = 'Fair';
        }elseif ($s1->score_test_sum == 1) {
          $obj['project'][$i]['grade1'] = 'D+';
          $obj['project'][$i]['level1'] = 'Poor';
        }elseif($s1->score_test_sum == null){
          $obj['project'][$i]['grade1'] = null;
        }
      }
      // $obj['project'][$i]['score1'] = $score1[$i];

      $score2[$i] = DB::table('score_tests')
                ->where('score_test_round','=','2')
                ->where('project_pkid',$get[$i])->get();
      // $obj['project'][$i]['score2'] = $score2[$i];
      foreach($score2[$i] as $s2){
        if($s2->score_test_sum == 4){
          $obj['project'][$i]['grade2'] = 'A';
          $obj['project'][$i]['level2'] = 'Very Good';
        }elseif($s2->score_test_sum == 3){
          $obj['project'][$i]['grade2'] = 'B';
          $obj['project'][$i]['level2'] = 'Good';
        }elseif($s2->score_test_sum == 2.5){
          $obj['project'][$i]['grade2'] = 'C+';
          $obj['project'][$i]['level2'] = 'Fair';
        }elseif ($s2->score_test_sum == 1) {
          $obj['project'][$i]['grade2'] = 'D+';
          $obj['project'][$i]['level2'] = 'Poor';
        }elseif($s2->score_test_sum == null){
          $obj['project'][$i]['grade2'] = null;
        }
      }

      $score3[$i] = DB::table('score_tests')
                ->where('score_test_round','=','3')
                ->where('project_pkid',$get[$i])->get();
      // $obj['project'][$i]['score3'] = $score3[$i];
      foreach($score3[$i] as $s3){
        if($s3->score_test_sum == 4){
          $obj['project'][$i]['grade3'] = 'A';
          $obj['project'][$i]['level3'] = 'Very Good';
        }elseif($s3->score_test_sum == 3){
          $obj['project'][$i]['grade3'] = 'B';
          $obj['project'][$i]['level3'] = 'Good';
        }elseif($s3->score_test_sum == 2.5){
          $obj['project'][$i]['grade3'] = 'C+';
          $obj['project'][$i]['level3'] = 'Fair';
        }elseif ($s3->score_test_sum == 1) {
          $obj['project'][$i]['grade3'] = 'D+';
          $obj['project'][$i]['level3'] = 'Poor';
        }elseif($s3->score_test_sum == null){
          $obj['project'][$i]['grade3'] = null;
        }
      }

      $score4[$i] = DB::table('score_tests')
                ->where('score_test_round','=','4')
                ->where('project_pkid',$get[$i])->get();
      // $obj['project'][$i]['score4'] = $score4[$i];
      foreach($score4[$i] as $s4){
        if($s4->score_test_sum == 4){
          $obj['project'][$i]['grade4'] = 'A';
          $obj['project'][$i]['level4'] = 'Very Good';
        }elseif($s4->score_test_sum == 3){
          $obj['project'][$i]['grade4'] = 'B';
          $obj['project'][$i]['level4'] = 'Good';
        }elseif($s4->score_test_sum == 2.5){
          $obj['project'][$i]['grade4'] = 'C+';
          $obj['project'][$i]['level4'] = 'Fair';
        }elseif ($s4->score_test_sum == 1) {
          $obj['project'][$i]['grade4'] = 'D+';
          $obj['project'][$i]['level4'] = 'Poor';
        }elseif($s4->score_test_sum == null){
          $obj['project'][$i]['grade4'] = null;
        }
      }


      $obj['score_level_verygood'] = ScoreLevel::where('id',1)->first();
      $obj['score_level_good'] = ScoreLevel::where('id',2)->first();
      $obj['score_level_fair'] = ScoreLevel::where('id',3)->first();
      $obj['score_level_poor'] = ScoreLevel::where('id',4)->first();

    }

    return view('admin.scoreRecord',$obj);
  }


  public function viewScore($id)
  {
    $data['id'] = $id;
    $data['project'] = GroupProject::where('group_project_id',$id)->get();
    $groupId = $data['project'][0]->id;
    $adv = DB::table('project_advisors')
            ->join('advisors','advisors.id','=','advisor_id')
            ->where('project_pkid',$groupId)
            ->select('advisor_name','advisors.id')->get();
    $data['project'][0]['advisor'] = $adv;

    $typeId = $data['project'][0]->type_id;
    $yearId = $data['project'][0]->year_id;

    $data['commitee'] = DB::table('rooms_exam')
                        ->join('rooms_advisor','room_exam_id','=','rooms_exam.id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('project_pkid',$groupId)
                        ->select('advisor_id','advisor_name')
                        ->get();
    $data['quantity'] = count($data['commitee']);

    $data['mainRound1'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',1)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();
    $data['mainRound2'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',2)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();
    $data['mainRound3'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',3)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();
    $data['mainRound4'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',4)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();

    $mainScoreId1 = $data['mainRound1'][0]->id;
    $data['subRound1'] = DB::table('sub_templates_score')
                          ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                          ->join('templates_sub','templates_sub.id','=','template_sub_id')
                          ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                          ->where('main_template_score_id',$mainScoreId1)
                          ->select('criteria_sub_name','sub_templates_score.score','templates_sub.id')
                          ->get();
      for($k=0; $k<count($data['subRound1']); $k++){
        $subId = $data['subRound1'][$k]->id;
        $getScore[$k] = DB::table('advisor_scoresheet')
                        ->where('sub_template_id',$subId)
                        ->where('project_pkid',$groupId)
                        ->where('submit',1)
                        ->select('advisor_id','score')
                        ->get();
        $data['subRound1'][$k]->scoreRound1 = $getScore[$k];
    }

    $mainScoreId2 = $data['mainRound2'][0]->id;
    $data['subRound2'] = DB::table('sub_templates_score')
                          ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                          ->join('templates_sub','templates_sub.id','=','template_sub_id')
                          ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                          ->where('main_template_score_id',$mainScoreId2)
                          ->select('criteria_sub_name','sub_templates_score.score','templates_sub.id')
                          ->get();
      for($k=0; $k<count($data['subRound2']); $k++){
        $subId = $data['subRound2'][$k]->id;
        $getScore[$k] = DB::table('advisor_scoresheet')
                        ->where('sub_template_id',$subId)
                        ->where('project_pkid',$groupId)
                        ->where('submit',2)
                        ->select('advisor_id','score')
                        ->get();
        $data['subRound2'][$k]->scoreRound2 = $getScore[$k];
    }

    $mainScoreId3 = $data['mainRound3'][0]->id;
    $data['subRound3'] = DB::table('sub_templates_score')
                          ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                          ->join('templates_sub','templates_sub.id','=','template_sub_id')
                          ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                          ->where('main_template_score_id',$mainScoreId3)
                          ->select('criteria_sub_name','sub_templates_score.score','templates_sub.id')
                          ->get();
      for($k=0; $k<count($data['subRound3']); $k++){
        $subId = $data['subRound3'][$k]->id;
        $getScore[$k] = DB::table('advisor_scoresheet')
                        ->where('sub_template_id',$subId)
                        ->where('project_pkid',$groupId)
                        ->where('submit',3)
                        ->select('advisor_id','score')
                        ->get();
        $data['subRound3'][$k]->scoreRound3 = $getScore[$k];
    }

    $mainScoreId4 = $data['mainRound4'][0]->id;
    $data['subRound4'] = DB::table('sub_templates_score')
                          ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                          ->join('templates_sub','templates_sub.id','=','template_sub_id')
                          ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                          ->where('main_template_score_id',$mainScoreId4)
                          ->select('criteria_sub_name','sub_templates_score.score','templates_sub.id')
                          ->get();
      for($k=0; $k<count($data['subRound4']); $k++){
        $subId = $data['subRound4'][$k]->id;
        $getScore[$k] = DB::table('advisor_scoresheet')
                        ->where('sub_template_id',$subId)
                        ->where('project_pkid',$groupId)
                        ->where('submit',4)
                        ->select('advisor_id','score')
                        ->get();
        $data['subRound4'][$k]->scoreRound4 = $getScore[$k];
    }

    $data['gradeRound1'] = DB::table('grade_advisor')
                          ->where('main_template_id',$data['mainRound1'][0]->template_main_id)
                          ->where('project_pkid',$groupId)
                          ->get();
    $data['gradeRound2'] = DB::table('grade_advisor')
                          ->where('main_template_id',$data['mainRound2'][0]->template_main_id)
                          ->where('project_pkid',$groupId)
                          ->get();
    $data['gradeRound3'] = DB::table('grade_advisor')
                          ->where('main_template_id',$data['mainRound3'][0]->template_main_id)
                          ->where('project_pkid',$groupId)
                          ->get();
    $data['gradeRound4'] = DB::table('grade_advisor')
                          ->where('main_template_id',$data['mainRound4'][0]->template_main_id)
                          ->where('project_pkid',$groupId)
                          ->get();

    $advId = $adv[0]->id;
    $mainAdvScore1 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound1'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->value('grade');
    if($mainAdvScore1 == 'A'){
      $mainGrade1 = (4*40)/100;
    }elseif($mainAdvScore1 == 'B+'){
      $mainGrade1 = (3.5*40)/100;
    }elseif($mainAdvScore1 == 'B'){
      $mainGrade1 = (3*40)/100;
    }elseif($mainAdvScore1 == 'C+'){
      $mainGrade1 = (2.5*40)/100;
    }elseif($mainAdvScore1 == 'C'){
      $mainGrade1 = (2*40)/100;
    }elseif($mainAdvScore1 == 'D+'){
      $mainGrade1 = (1.5*40)/100;
    }elseif($mainAdvScore1 == 'D'){
      $mainGrade1 = (1*40)/100;
    }elseif($mainAdvScore1 == null){
      $mainGrade1 = 0;
    }
    $comScore1 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound1'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->get();
    $sum = 0;
    foreach($comScore1 as $com1){
      $commitee = $com1->grade;
      if($commitee == 'A'){
        $calGrade1 = 4;
      }elseif($commitee == 'B+'){
        $calGrade1 = 3.5;
      }elseif($commitee == 'B'){
        $calGrade1 = 3;
      }elseif($commitee == 'C+'){
        $calGrade1 = 2.5;
      }elseif($commitee == 'C'){
        $calGrade1 = 2;
      }elseif($commitee == 'D+'){
        $calGrade1 = 1.5;
      }elseif($commitee == 'D'){
        $calGrade1 = 1;
      }
      $sum += $calGrade1;
    }
    if($sum != 0){
      $calSum1 = ($sum/count($comScore1))*60/100;
      $total1 = $mainGrade1+$calSum1;
      if($total1>=3.5){
        $data['level1'] = 'Very Good';
      }elseif($total1>=3){
        $data['level1'] = 'Good';
      }elseif($total1>=2.5){
        $data['level1'] = 'Fair';
      }elseif($total1<2.5){
        $data['level1'] = 'Poor';
      }
    }

    $mainAdvScore2 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound2'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->value('grade');
    if($mainAdvScore2 == 'A'){
      $mainGrade2 = (4*40)/100;
    }elseif($mainAdvScore2 == 'B+'){
      $mainGrade2 = (3.5*40)/100;
    }elseif($mainAdvScore2 == 'B'){
      $mainGrade2 = (3*40)/100;
    }elseif($mainAdvScore2 == 'C+'){
      $mainGrade2 = (2.5*40)/100;
    }elseif($mainAdvScore2 == 'C'){
      $mainGrade2 = (2*40)/100;
    }elseif($mainAdvScore2 == 'D+'){
      $mainGrade2 = (1.5*40)/100;
    }elseif($mainAdvScore2 == 'D'){
      $mainGrade2 = (1*40)/100;
    }elseif($mainAdvScore2 == null){
      $mainGrade2 = 0;
    }
    $comScore2 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound2'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->get();
    $sum = 0;
    foreach($comScore2 as $com2){
      $commitee = $com2->grade;
      if($commitee == 'A'){
        $calGrade2 = 4;
      }elseif($commitee == 'B+'){
        $calGrade2 = 3.5;
      }elseif($commitee == 'B'){
        $calGrade2 = 3;
      }elseif($commitee == 'C+'){
        $calGrade2 = 2.5;
      }elseif($commitee == 'C'){
        $calGrade2 = 2;
      }elseif($commitee == 'D+'){
        $calGrade2 = 1.5;
      }elseif($commitee == 'D'){
        $calGrade2 = 1;
      }
      $sum += $calGrade2;
    }
    if($sum != 0){
      $calSum2 = ($sum/count($comScore2))*60/100;
      $total2 = $mainGrade2+$calSum2;
      if($total2>=3.5){
        $data['level2'] = 'Very Good';
      }elseif($total2>=3){
        $data['level2'] = 'Good';
      }elseif($total2>=2.5){
        $data['level2'] = 'Fair';
      }elseif($total2<2.5){
        $data['level2'] = 'Poor';
      }
    }

    $mainAdvScore3 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound3'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->value('grade');
    if($mainAdvScore3 == 'A'){
      $mainGrade3 = (4*40)/100;
    }elseif($mainAdvScore3 == 'B+'){
      $mainGrade3 = (3.5*40)/100;
    }elseif($mainAdvScore3 == 'B'){
      $mainGrade3 = (3*40)/100;
    }elseif($mainAdvScore3 == 'C+'){
      $mainGrade3 = (2.5*40)/100;
    }elseif($mainAdvScore3 == 'C'){
      $mainGrade3 = (2*40)/100;
    }elseif($mainAdvScore3 == 'D+'){
      $mainGrade3 = (1.5*40)/100;
    }elseif($mainAdvScore3 == 'D'){
      $mainGrade3 = (1*40)/100;
    }elseif($mainAdvScore3 == null){
      $mainGrade3 = 0;
    }
    $comScore3 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound3'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->get();
    $sum = 0;
    foreach($comScore3 as $com3){
      $commitee = $com3->grade;
      if($commitee == 'A'){
        $calGrade3 = 4;
      }elseif($commitee == 'B+'){
        $calGrade3 = 3.5;
      }elseif($commitee == 'B'){
        $calGrade3 = 3;
      }elseif($commitee == 'C+'){
        $calGrade3 = 2.5;
      }elseif($commitee == 'C'){
        $calGrade3 = 2;
      }elseif($commitee == 'D+'){
        $calGrade3 = 1.5;
      }elseif($commitee == 'D'){
        $calGrade3 = 1;
      }
      $sum += $calGrade3;
    }
    if($sum != 0){
      $calSum3 = ($sum/count($comScore3))*60/100;
      $total3 = $mainGrade3+$calSum3;
      if($total3>=3.5){
        $data['level3'] = 'Very Good';
      }elseif($total3>=3){
        $data['level3'] = 'Good';
      }elseif($total3>=2.5){
        $data['level3'] = 'Fair';
      }elseif($total3<2.5){
        $data['level3'] = 'Poor';
      }
    }

    $mainAdvScore4 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound4'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->value('grade');
    if($mainAdvScore4 == 'A'){
      $mainGrade4 = (4*40)/100;
    }elseif($mainAdvScore4 == 'B+'){
      $mainGrade4 = (3.5*40)/100;
    }elseif($mainAdvScore4 == 'B'){
      $mainGrade4 = (3*40)/100;
    }elseif($mainAdvScore4 == 'C+'){
      $mainGrade4 = (2.5*40)/100;
    }elseif($mainAdvScore4 == 'C'){
      $mainGrade4 = (2*40)/100;
    }elseif($mainAdvScore4 == 'D+'){
      $mainGrade4 = (1.5*40)/100;
    }elseif($mainAdvScore4 == 'D'){
      $mainGrade4 = (1*40)/100;
    }elseif($mainAdvScore4 == null){
      $mainGrade4 = 0;
    }
    $comScore4 = DB::table('grade_advisor')
                    ->where('main_template_id',$data['mainRound4'][0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->get();
    $sum = 0;
    foreach($comScore4 as $com4){
      $commitee = $com4->grade;
      if($commitee == 'A'){
        $calGrade4 = 4;
      }elseif($commitee == 'B+'){
        $calGrade4 = 3.5;
      }elseif($commitee == 'B'){
        $calGrade4 = 3;
      }elseif($commitee == 'C+'){
        $calGrade4 = 2.5;
      }elseif($commitee == 'C'){
        $calGrade4 = 2;
      }elseif($commitee == 'D+'){
        $calGrade4 = 1.5;
      }elseif($commitee == 'D'){
        $calGrade4 = 1;
      }
      $sum += $calGrade4;
    }
    if($sum != 0){
      $calSum4 = ($sum/count($comScore4))*60/100;
      $total4 = $mainGrade4+$calSum4;
      if($total4>=3.5){
        $data['level4'] = 'Very Good';
      }elseif($total4>=3){
        $data['level4'] = 'Good';
      }elseif($total4>=2.5){
        $data['level4'] = 'Fair';
      }elseif($total4<2.5){
        $data['level4'] = 'Poor';
      }
    }

    return view('admin.viewscore',$data);
  }

  public function storeScoreLevel()
  {
    return redirect(url('exam/scorerecord'));
  }

  public function ScoreLevel(Request $request){
    $score_verygood = $request->score_verygood;
    $level_verygood = $request->level_verygood;
    $score_good = $request->score_good;
    $level_good = $request->level_good;
    $score_fair = $request->score_fair;
    $level_fair = $request->level_fair;
    $score_poor = $request->score_poor;
    $level_poor = $request->level_poor;

    $very_good = ScoreLevel::find(1);
    $very_good->score_level_name = $level_verygood;
    $very_good->score = $score_verygood;
    $very_good->save();

    $good = ScoreLevel::find(2);
    $good->score_level_name = $level_good;
    $good->score = $score_good;
    $good->save();

    $fair = ScoreLevel::find(3);
    $fair->score_level_name = $level_fair;
    $fair->score = $score_fair;
    $fair->save();

    $poor = ScoreLevel::find(4);
    $poor->score_level_name = $level_poor;
    $poor->score = $score_poor;
    $poor->save();


    return redirect()->back();
  }
}
