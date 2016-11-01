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
use Auth;

class GiveMarksController extends Controller
{
    public function selectRound()
    {
      $getType = DB::table('group_projects')->where('group_project_id','IT56-31')->value('type_id');
      $year = DB::table('years')->where('year',date('Y'))->value('id');
      $mainSheet = DB::table('main_templates_score')
                    ->join('templates_main','templates_main.id','=','template_main_id')
                    ->where('type_id',$getType)->where('year_id',$year)->get();
      for($i=0; $i<count($mainSheet); $i++){
        $data['round'][$i] = $mainSheet[$i]->round;
      }

      return view('advisor.selectRound',$data);
    }

    public function giveMarksData($id)
    {

      return view('advisor.giveMarks');
    }
}
