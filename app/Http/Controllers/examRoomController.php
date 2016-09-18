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

class examRoomController extends Controller
{
    public function index()
    {

      return view('admin.manageRoom');
    }

    public function create()
    {
      $obj['rooms'] = Room::all();
      $obj['advisor'] = Advisor::all();

      return view('admin.addRoom',$obj);
    }

    public function genGroup(Request $request)
    {
      $obj['selectroom'] = $request['selectroom'];
      $selectAdv = $request['selectAdv'];
      $startTime = $request['startTime'];
      $minute = $request['minute'];
      $explode = explode(",",$selectAdv);
      $count = count($explode);
      for($i=0;$i<$count;$i++){
        $adv[$i] = DB::table('project_advisors')
                    ->where('advisor_id',$explode[$i])
                    ->where('advisor_position_id','=','1')
                    ->select('project_pkid')->get();
      }
        $flatdata = array_flatten($adv);
        $count1 = count($flatdata);
        if($count1 == 0){
          $obj['project'] = 0;
        }else{
          for($i=0;$i<$count1;$i++){
            $get[$i] = $flatdata[$i]->project_pkid;
            $project[$i] = GroupProject::where('id',$get[$i])->get();
          }
          $obj['project'] = array_flatten($project);
          $count2 = count($obj['project']);
          for($i=0;$i<$count1;$i++){
            $project_pkid[$i] = $obj['project'][$i]->id;
            $student[$i] = DB::table('project_students')
                          ->join('students','student_pkid','=','students.id')
                          ->where('project_pkid',$project_pkid[$i])
                          ->get();
            $obj['project'][$i]['student'] = $student[$i];
            $advisor[$i] = DB::table('project_advisors')
                          ->join('advisors','advisor_id','=','advisors.id')
                          ->where('project_pkid',$project_pkid[$i])
                          ->select('advisor_name')->get();
            $obj['project'][$i]['advisor'] = $advisor[$i];
          }
        }

      return view('admin.editRoom',$obj);
    }
}
