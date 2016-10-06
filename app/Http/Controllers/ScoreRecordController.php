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

class ScoreRecordController extends Controller
{
  public function index()
  {
    $project = GroupProject::where('group_project_approve','=','1')->get();
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
    }

    return view('admin.scoreRecord',$obj);
  }
}
