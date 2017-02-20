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
        if($s1->score_test_sum >= 3.5){
          $obj['project'][$i]['grade1'] = 'A';
          $obj['project'][$i]['level1'] = 'Very Good';
          $obj['project'][$i]['class1'] = 'verygood';
        }elseif($s1->score_test_sum >= 3){
          $obj['project'][$i]['grade1'] = 'B';
          $obj['project'][$i]['level1'] = 'Good';
          $obj['project'][$i]['class1'] = 'good';
        }elseif($s1->score_test_sum >= 2.5){
          $obj['project'][$i]['grade1'] = 'C+';
          $obj['project'][$i]['level1'] = 'Fair';
          $obj['project'][$i]['class1'] = 'fair';
        }elseif ($s1->score_test_sum < 2.5) {
          $obj['project'][$i]['grade1'] = 'D+';
          $obj['project'][$i]['level1'] = 'Poor';
          $obj['project'][$i]['class1'] = 'poor';
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
        if($s2->score_test_sum >= 3.5){
          $obj['project'][$i]['grade2'] = 'A';
          $obj['project'][$i]['level2'] = 'Very Good';
          $obj['project'][$i]['class2'] = 'verygood';
        }elseif($s2->score_test_sum >= 3){
          $obj['project'][$i]['grade2'] = 'B';
          $obj['project'][$i]['level2'] = 'Good';
          $obj['project'][$i]['class2'] = 'good';
        }elseif($s2->score_test_sum >= 2.5){
          $obj['project'][$i]['grade2'] = 'C+';
          $obj['project'][$i]['level2'] = 'Fair';
          $obj['project'][$i]['class2'] = 'fair';
        }elseif ($s2->score_test_sum < 2.5) {
          $obj['project'][$i]['grade2'] = 'D+';
          $obj['project'][$i]['level2'] = 'Poor';
          $obj['project'][$i]['class2'] = 'poor';
        }elseif($s2->score_test_sum == null){
          $obj['project'][$i]['grade2'] = null;
        }
      }

      $score3[$i] = DB::table('score_tests')
                ->where('score_test_round','=','3')
                ->where('project_pkid',$get[$i])->get();
      // $obj['project'][$i]['score3'] = $score3[$i];
      foreach($score3[$i] as $s3){
        if($s3->score_test_sum >= 3.5){
          $obj['project'][$i]['grade3'] = 'A';
          $obj['project'][$i]['level3'] = 'Very Good';
          $obj['project'][$i]['class3'] = 'verygood';
        }elseif($s3->score_test_sum >= 3){
          $obj['project'][$i]['grade3'] = 'B';
          $obj['project'][$i]['level3'] = 'Good';
          $obj['project'][$i]['class3'] = 'good';
        }elseif($s3->score_test_sum >= 2.5){
          $obj['project'][$i]['grade3'] = 'C+';
          $obj['project'][$i]['level3'] = 'Fair';
          $obj['project'][$i]['class3'] = 'fair';
        }elseif ($s3->score_test_sum < 2.5) {
          $obj['project'][$i]['grade3'] = 'D+';
          $obj['project'][$i]['level3'] = 'Poor';
          $obj['project'][$i]['class3'] = 'poor';
        }elseif($s3->score_test_sum == null){
          $obj['project'][$i]['grade3'] = null;
        }
      }

      $score4[$i] = DB::table('score_tests')
                ->where('score_test_round','=','4')
                ->where('project_pkid',$get[$i])->get();
      // $obj['project'][$i]['score4'] = $score4[$i];
      foreach($score4[$i] as $s4){
        if($s4->score_test_sum >= 3.5){
          $obj['project'][$i]['grade4'] = 'A';
          $obj['project'][$i]['level4'] = 'Very Good';
          $obj['project'][$i]['class4'] = 'verygood';
        }elseif($s4->score_test_sum >= 3){
          $obj['project'][$i]['grade4'] = 'B';
          $obj['project'][$i]['level4'] = 'Good';
          $obj['project'][$i]['class4'] = 'good';
        }elseif($s4->score_test_sum >= 2.5){
          $obj['project'][$i]['grade4'] = 'C+';
          $obj['project'][$i]['level4'] = 'Fair';
          $obj['project'][$i]['class4'] = 'fair';
        }elseif ($s4->score_test_sum < 2.5) {
          $obj['project'][$i]['grade4'] = 'D+';
          $obj['project'][$i]['level4'] = 'Poor';
          $obj['project'][$i]['class4'] = 'poor';
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

    $data['subRound1'] = DB::table('templates_sub')
                        ->join('criteria_subs','criteria_sub_id','=','criteria_subs.id')
                        ->join('sub_templates_score','template_sub_id','=','templates_sub.id')
                        ->where('main_template_score_id','=',$data['mainRound1'][0]->id)
                        ->select('templates_sub.id','score','criteria_sub_name')
                        ->get();

    for($i=0;$i<$data['quantity'];$i++){
      $commitee[$i] = $data['commitee'][$i]->advisor_id;
      $gradeRound1[$i] = DB::table('grade_advisor')
                        ->where('project_pkid','=',$groupId)
                        ->where('main_template_id','=',$data['mainRound1'][0]->template_main_id)
                        ->where('advisor_id','=',$commitee[$i])
                        ->where('submit','=',1)
                        ->get();
      for($j=0;$j<count($data['subRound1']);$j++){
        $scoreRound1[$j][$i] = DB::table('advisor_scoresheet')
                          ->where('advisor_id','=',$commitee[$i])
                          ->where('sub_template_id','=',$data['subRound1'][$j]->id)
                          ->where('project_pkid','=',$groupId)
                          ->where('submit','=',1)
                          ->get();
      }
    }
    $total1 = DB::table('score_tests')
              ->where('score_test_round',1)
              ->where('project_pkid',$groupId)
              ->value('score_test_sum');
    if($total1 === null){
      $data['level1'] = null;
    }elseif($total1>=3.5){
      $data['level1'] = 'Very Good';
    }elseif($total1>=3){
      $data['level1'] = 'Good';
    }elseif($total1>=2.5){
      $data['level1'] = 'Fair';
    }elseif($total1<2.5){
      $data['level1'] = 'Poor';
    }
    $data['scoreRound1'] = $scoreRound1;
    $data['gradeRound1'] = $gradeRound1;

    $data['mainRound2'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',2)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();

    $data['subRound2'] = DB::table('templates_sub')
                        ->join('criteria_subs','criteria_sub_id','=','criteria_subs.id')
                        ->join('sub_templates_score','template_sub_id','=','templates_sub.id')
                        ->where('main_template_score_id','=',$data['mainRound2'][0]->id)
                        ->select('templates_sub.id','score','criteria_sub_name')
                        ->get();

    for($i=0;$i<$data['quantity'];$i++){
      $commitee[$i] = $data['commitee'][$i]->advisor_id;
      $gradeRound2[$i] = DB::table('grade_advisor')
                        ->where('project_pkid','=',$groupId)
                        ->where('main_template_id','=',$data['mainRound2'][0]->template_main_id)
                        ->where('advisor_id','=',$commitee[$i])
                        ->where('submit','=',1)
                        ->get();
      for($j=0;$j<count($data['subRound2']);$j++){
        $scoreRound2[$j][$i] = DB::table('advisor_scoresheet')
                          ->where('advisor_id','=',$commitee[$i])
                          ->where('sub_template_id','=',$data['subRound2'][$j]->id)
                          ->where('project_pkid','=',$groupId)
                          ->where('submit','=',1)
                          ->get();
      }
    }
    $total2 = DB::table('score_tests')
              ->where('score_test_round',2)
              ->where('project_pkid',$groupId)
              ->value('score_test_sum');
    if($total2 === null){
      $data['level2'] = null;
    }elseif($total2>=3.5){
      $data['level2'] = 'Very Good';
    }elseif($total2>=3){
      $data['level2'] = 'Good';
    }elseif($total2>=2.5){
      $data['level2'] = 'Fair';
    }elseif($total2<2.5){
      $data['level2'] = 'Poor';
    }
    $data['scoreRound2'] = $scoreRound2;
    $data['gradeRound2'] = $gradeRound2;

    $data['mainRound3'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',3)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();

    $data['subRound3'] = DB::table('templates_sub')
                        ->join('criteria_subs','criteria_sub_id','=','criteria_subs.id')
                        ->join('sub_templates_score','template_sub_id','=','templates_sub.id')
                        ->where('main_template_score_id','=',$data['mainRound3'][0]->id)
                        ->select('templates_sub.id','score','criteria_sub_name')
                        ->get();

    for($i=0;$i<$data['quantity'];$i++){
      $commitee[$i] = $data['commitee'][$i]->advisor_id;
      $gradeRound3[$i] = DB::table('grade_advisor')
                        ->where('project_pkid','=',$groupId)
                        ->where('main_template_id','=',$data['mainRound3'][0]->template_main_id)
                        ->where('advisor_id','=',$commitee[$i])
                        ->where('submit','=',1)
                        ->get();
      for($j=0;$j<count($data['subRound3']);$j++){
        $scoreRound3[$j][$i] = DB::table('advisor_scoresheet')
                          ->where('advisor_id','=',$commitee[$i])
                          ->where('sub_template_id','=',$data['subRound3'][$j]->id)
                          ->where('project_pkid','=',$groupId)
                          ->where('submit','=',1)
                          ->get();
      }
    }
    $total3 = DB::table('score_tests')
              ->where('score_test_round',3)
              ->where('project_pkid',$groupId)
              ->value('score_test_sum');
    if($total3 === null){
      $data['level3'] = null;
    }elseif($total3>=3.5){
      $data['level3'] = 'Very Good';
    }elseif($total3>=3){
      $data['level3'] = 'Good';
    }elseif($total3>=2.5){
      $data['level3'] = 'Fair';
    }elseif($total3<2.5){
      $data['level3'] = 'Poor';
    }
    $data['scoreRound3'] = $scoreRound3;
    $data['gradeRound3'] = $gradeRound3;

    $data['mainRound4'] = DB::table('main_templates_score')
                        ->join('templates_main','templates_main.id','=','template_main_id')
                        ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                        ->where('type_id',$typeId)
                        ->where('year_id',$yearId)
                        ->where('round',4)
                        ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                        ->get();

    $data['subRound4'] = DB::table('templates_sub')
                        ->join('criteria_subs','criteria_sub_id','=','criteria_subs.id')
                        ->join('sub_templates_score','template_sub_id','=','templates_sub.id')
                        ->where('main_template_score_id','=',$data['mainRound4'][0]->id)
                        ->select('templates_sub.id','score','criteria_sub_name')
                        ->get();

    for($i=0;$i<$data['quantity'];$i++){
      $commitee[$i] = $data['commitee'][$i]->advisor_id;
      $gradeRound4[$i] = DB::table('grade_advisor')
                        ->where('project_pkid','=',$groupId)
                        ->where('main_template_id','=',$data['mainRound4'][0]->template_main_id)
                        ->where('advisor_id','=',$commitee[$i])
                        ->where('submit','=',1)
                        ->get();
      for($j=0;$j<count($data['subRound1']);$j++){
        $scoreRound4[$j][$i] = DB::table('advisor_scoresheet')
                          ->where('advisor_id','=',$commitee[$i])
                          ->where('sub_template_id','=',$data['subRound4'][$j]->id)
                          ->where('project_pkid','=',$groupId)
                          ->where('submit','=',1)
                          ->get();
      }
    }
    $total4 = DB::table('score_tests')
              ->where('score_test_round',4)
              ->where('project_pkid',$groupId)
              ->value('score_test_sum');
    if($total4 === null){
      $data['level4'] = null;
    }elseif($total4>=3.5){
      $data['level4'] = 'Very Good';
    }elseif($total4>=3){
      $data['level4'] = 'Good';
    }elseif($total4>=2.5){
      $data['level4'] = 'Fair';
    }elseif($total4<2.5){
      $data['level4'] = 'Poor';
    }
    $data['scoreRound4'] = $scoreRound4;
    $data['gradeRound4'] = $gradeRound4;



    return view('admin.viewScore',$data);
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
