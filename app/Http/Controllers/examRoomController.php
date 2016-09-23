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
      $obj['addProject'] = [];
      $explode = explode(",",$selectAdv);
      $count = count($explode);
      $allProject = DB::table('group_projects')->select('id')->get();
      $getData1 = [];
      foreach($allProject as $pj){
        array_push($getData1,$pj->id);
      }
      for($i=0;$i<$count;$i++){
        $mainadv[$i] = DB::table('project_advisors')
                    ->where('advisor_id',$explode[$i])
                    ->where('advisor_position_id','=','1')
                    ->select('project_pkid')->get();
      }
        $flatdata = array_flatten($mainadv);
        $getData2 = [];
        foreach($flatdata as $adv){
          array_push($getData2,$adv->project_pkid);
        }
        $count1 = count($flatdata);
        if($count1 == 0){
          $obj['project'] = 0;
          $obj['addProject'] = GroupProject::all();
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
          $roomexam = DB::table('rooms_exam')->select('project_pkid')->get();
          $getData3 = [];
          foreach($roomexam as $re){
            array_push($getData3,$re->project_pkid);
          }
          $result = array_diff($getData1,$getData2,$getData3);
          if(count($result) != null){
            $newresult = [];
            foreach($result as $s){
              array_push($newresult,$s);
            }
            $count3 = count($newresult);
            for($i=0;$i<$count3;$i++){
              $addProject[$i] = GroupProject::where('id',$newresult[$i])->get();
            }
            $obj['addProject'] = array_flatten($addProject);
          }
        }

      return view('admin.editRoom',$obj);
    }

    public function preview()
    {
      return view('admin.confirmRoom');
    }
    vbvb
}
