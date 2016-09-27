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

class AdvisorProjectController extends Controller
{
    public function index()
    {
      $login = 5;
      $advProject = DB::table('project_advisors')->where('advisor_id',$login)->select('project_pkid')->get();
      $count = count($advProject);
      for($i=0;$i<$count;$i++){
        $id[$i] = $advProject[$i]->project_pkid;
        $project[$i] = GroupProject::where('id',$id[$i])->get();
      }
      $obj['project'] = array_flatten($project);
      for($i=0;$i<$count;$i++){
        $id[$i] = $advProject[$i]->project_pkid;
        $adv[$i] = DB::table('project_advisors')
                    ->join('advisors','advisor_id','=','advisors.id')
                    ->where('project_pkid',$id[$i])
                    ->select('advisor_name')->get();
        $obj['project'][$i]['advisor'] = $adv[$i];
      }
    
      return view('advisor.advProject',$obj);
    }
}
