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
use App\Room;
use App\RoomExam;
use App\RoomAdvisor;
use App\GroupProject;
use App\Advisor;
use App\ProjectStudent;
use App\Student;
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
      $obj['project'][$i]['score1'] = $score1[$i];
    
      $score2[$i] = DB::table('score_tests')
                ->where('score_test_round','=','2')
                ->where('project_pkid',$get[$i])->get();
      $obj['project'][$i]['score2'] = $score2[$i];
    
      $score3[$i] = DB::table('score_tests')
                ->where('score_test_round','=','3')
                ->where('project_pkid',$get[$i])->get();
      $obj['project'][$i]['score3'] = $score3[$i];
    
      $score4[$i] = DB::table('score_tests')
                ->where('score_test_round','=','4')
                ->where('project_pkid',$get[$i])->get();
      $obj['project'][$i]['score4'] = $score4[$i];

      $obj['score_level_verygood'] = ScoreLevel::where('id',1)->first();
      $obj['score_level_good'] = ScoreLevel::where('id',2)->first();
      $obj['score_level_fair'] = ScoreLevel::where('id',3)->first();
      $obj['score_level_poor'] = ScoreLevel::where('id',4)->first();
    }

    return view('admin.scoreRecord',$obj);
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
