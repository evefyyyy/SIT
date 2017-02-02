<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Redirect;
use File;
use DB;
use Storage;
use App\Model\studentProfile;
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

class calculateScoreController extends Controller
{
  public function storeScoreLevel1($id)
  {
    $id = $id;
    $project = GroupProject::where('group_project_id',$id)->get();
    $groupId = $project[0]->id;
    $adv = DB::table('project_advisors')
            ->join('advisors','advisors.id','=','advisor_id')
            ->where('project_pkid',$groupId)
            ->where('advisor_position_id','=',1)
            ->select('advisor_name','advisors.id')->get();
    $typeId = $project[0]->type_id;
    $yearId = $project[0]->year_id;

    $commitee = DB::table('rooms_exam')
                        ->join('rooms_advisor','room_exam_id','=','rooms_exam.id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('project_pkid',$groupId)
                        ->select('advisor_id','advisor_name')
                        ->get();
    $quantity = count($commitee);

    $mainRound1 = DB::table('main_templates_score')
                  ->join('templates_main','templates_main.id','=','template_main_id')
                  ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                  ->where('type_id',$typeId)
                  ->where('year_id',$yearId)
                  ->where('round',1)
                  ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                  ->get();

    $advId = $adv[0]->id;
    $mainAdvScore1 = DB::table('grade_advisor')
                    ->where('main_template_id',$mainRound1[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->where('submit',1)
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
                    ->where('main_template_id',$mainRound1[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->where('submit',1)
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
      }else{
        $calGrade1 = 0;
      }
      $sum += $calGrade1;
    }

    if($sum != 0){
      $calSum1 = ($sum/count($comScore1))*60/100;
      $total1 = $mainGrade1+$calSum1;
      if($total1>=3.5){
        $data1 = 'Very Good';
      }elseif($total1>=3){
        $data1 = 'Good';
      }elseif($total1>=2.5){
        $data1 = 'Fair';
      }elseif($total1<2.5){
        $data1 = 'Poor';
      }
    }else{
      $total1 = 0;
      $data1 = null;
    }
    $checkData1 = DB::table('score_tests')
                  ->where('score_test_round',1)
                  ->where('project_pkid',$groupId)
                  ->value('score_test_sum');
    if($checkData1 === null && $total1 !=0){
      ScoreTest::insert(
        ['score_test_sum'=>$total1,'score_test_round'=>1,'project_pkid'=>$groupId]
      );
    }else{
      DB::table('score_tests')->where('project_pkid','=',$groupId)->where('score_test_round',1)
      ->update(['score_test_sum'=>$total1]);
    }
    return $data1;
  }

  public function storeScoreLevel2($id)
  {
    $id = $id;
    $project = GroupProject::where('group_project_id',$id)->get();
    $groupId = $project[0]->id;
    $adv = DB::table('project_advisors')
            ->join('advisors','advisors.id','=','advisor_id')
            ->where('project_pkid',$groupId)
            ->where('advisor_position_id','=',1)
            ->select('advisor_name','advisors.id')->get();
    $typeId = $project[0]->type_id;
    $yearId = $project[0]->year_id;

    $commitee = DB::table('rooms_exam')
                        ->join('rooms_advisor','room_exam_id','=','rooms_exam.id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('project_pkid',$groupId)
                        ->select('advisor_id','advisor_name')
                        ->get();
    $quantity = count($commitee);

    $mainRound2 = DB::table('main_templates_score')
                  ->join('templates_main','templates_main.id','=','template_main_id')
                  ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                  ->where('type_id',$typeId)
                  ->where('year_id',$yearId)
                  ->where('round',2)
                  ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                  ->get();

    $advId = $adv[0]->id;
    $mainAdvScore2 = DB::table('grade_advisor')
                    ->where('main_template_id',$mainRound2[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->where('submit',1)
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
                    ->where('main_template_id',$mainRound2[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->where('submit',1)
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
      }else{
        $calGrade2 = 0;
      }
      $sum += $calGrade2;
    }

    if($sum != 0){
      $calSum2 = ($sum/count($comScore2))*60/100;
      $total2 = $mainGrade2+$calSum2;
      if($total2>=3.5){
        $data2 = 'Very Good';
      }elseif($total2>=3){
        $data2 = 'Good';
      }elseif($total2>=2.5){
        $data2 = 'Fair';
      }elseif($total2<2.5){
        $data2 = 'Poor';
      }
    }else{
      $total2 = 0;
      $data2 = null;
    }
    $checkData2 = DB::table('score_tests')
                  ->where('score_test_round',2)
                  ->where('project_pkid',$groupId)
                  ->value('score_test_sum');
    if($checkData2 == null && $total2 != 0){
      ScoreTest::insert(
        ['score_test_sum'=>$total2,'score_test_round'=>2,'project_pkid'=>$groupId]
      );
    }else{
      DB::table('score_tests')->where('project_pkid','=',$groupId)->where('score_test_round',2)
      ->update(['score_test_sum'=>$total2]);
    }
    return $data2;
  }

  public function storeScoreLevel3($id)
  {
    $id = $id;
    $project = GroupProject::where('group_project_id',$id)->get();
    $groupId = $project[0]->id;
    $adv = DB::table('project_advisors')
            ->join('advisors','advisors.id','=','advisor_id')
            ->where('project_pkid',$groupId)
            ->where('advisor_position_id','=',1)
            ->select('advisor_name','advisors.id')->get();
    $typeId = $project[0]->type_id;
    $yearId = $project[0]->year_id;

    $commitee = DB::table('rooms_exam')
                        ->join('rooms_advisor','room_exam_id','=','rooms_exam.id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('project_pkid',$groupId)
                        ->select('advisor_id','advisor_name')
                        ->get();
    $quantity = count($commitee);

    $mainRound3 = DB::table('main_templates_score')
                  ->join('templates_main','templates_main.id','=','template_main_id')
                  ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                  ->where('type_id',$typeId)
                  ->where('year_id',$yearId)
                  ->where('round',3)
                  ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                  ->get();

    $advId = $adv[0]->id;
    $mainAdvScore3 = DB::table('grade_advisor')
                    ->where('main_template_id',$mainRound3[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->where('submit',1)
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
                    ->where('main_template_id',$mainRound3[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->where('submit',1)
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
      }else{
        $calGrade3 = 0;
      }
      $sum += $calGrade3;
    }

    if($sum != 0){
      $calSum3 = ($sum/count($comScore3))*60/100;
      $total3 = $mainGrade3+$calSum3;
      if($total3>=3.5){
        $data3 = 'Very Good';
      }elseif($total3>=3){
        $data3 = 'Good';
      }elseif($total3>=2.5){
        $data3 = 'Fair';
      }elseif($total3<2.5){
        $data3 = 'Poor';
      }
    }else{
      $total3 = 0;
      $data3 = null;
    }
    $checkData3 = DB::table('score_tests')
                  ->where('score_test_round',3)
                  ->where('project_pkid',$groupId)
                  ->value('score_test_sum');
    if($checkData3 == null && $total3 != 0){
      ScoreTest::insert(
        ['score_test_sum'=>$total3,'score_test_round'=>3,'project_pkid'=>$groupId]
      );
    }else{
      DB::table('score_tests')->where('project_pkid','=',$groupId)->where('score_test_round',3)
      ->update(['score_test_sum'=>$total3]);
    }
    return $data3;
  }

  public function storeScoreLevel4($id)
  {
    $id = $id;
    $project = GroupProject::where('group_project_id',$id)->get();
    $groupId = $project[0]->id;
    $adv = DB::table('project_advisors')
            ->join('advisors','advisors.id','=','advisor_id')
            ->where('project_pkid',$groupId)
            ->where('advisor_position_id','=',1)
            ->select('advisor_name','advisors.id')->get();
    $typeId = $project[0]->type_id;
    $yearId = $project[0]->year_id;

    $commitee = DB::table('rooms_exam')
                        ->join('rooms_advisor','room_exam_id','=','rooms_exam.id')
                        ->join('advisors','advisors.id','=','advisor_id')
                        ->where('project_pkid',$groupId)
                        ->select('advisor_id','advisor_name')
                        ->get();
    $quantity = count($commitee);

    $mainRound4 = DB::table('main_templates_score')
                  ->join('templates_main','templates_main.id','=','template_main_id')
                  ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                  ->where('type_id',$typeId)
                  ->where('year_id',$yearId)
                  ->where('round',4)
                  ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                  ->get();

    $advId = $adv[0]->id;
    $mainAdvScore4 = DB::table('grade_advisor')
                    ->where('main_template_id',$mainRound4[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id',$advId)
                    ->where('submit',1)
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
                    ->where('main_template_id',$mainRound4[0]->template_main_id)
                    ->where('project_pkid',$groupId)
                    ->where('advisor_id','!=',$advId)
                    ->where('submit',1)
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
      }else{
        $calGrade = 0;
      }
      $sum += $calGrade4;
    }

    if($sum != 0){
      $calSum4 = ($sum/count($comScore4))*60/100;
      $total4 = $mainGrade4+$calSum4;
      if($total4>=3.5){
        $data4 = 'Very Good';
      }elseif($total4>=3){
        $data4 = 'Good';
      }elseif($total4>=2.5){
        $data4 = 'Fair';
      }elseif($total4<2.5 && $total4!=0){
        $data4 = 'Poor';
      }
    }else{
      $total4 = 0;
      $data4 = null;
    }
    $checkData4 = DB::table('score_tests')
                  ->where('score_test_round',4)
                  ->where('project_pkid',$groupId)
                  ->value('score_test_sum');
    if($checkData4 == null && $total4!=0){
      ScoreTest::insert(
        ['score_test_sum'=>$total4,'score_test_round'=>4,'project_pkid'=>$groupId]
      );
    }else{
      DB::table('score_tests')->where('project_pkid','=',$groupId)->where('score_test_round',4)
      ->update(['score_test_sum'=>$total4]);
    }
    return $data4;
  }
}
