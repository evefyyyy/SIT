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
use Auth;

class AdvisorProjectController extends Controller
{
  public function index()
  {
    $login = Auth::user()->user_advisor->advisor_id;
    $advProject = DB::table('project_advisors')->where('advisor_id',$login)->select('project_pkid')->get();
    $count = count($advProject);
    for($i=0;$i<$count;$i++){
      $id[$i] = $advProject[$i]->project_pkid;
      $project[$i] = GroupProject::where('id',$id[$i])->get();
    }
    $obj['project'] = array_flatten($project);
    for($i=0;$i<$count;$i++){
      $id[$i] = $advProject[$i]->project_pkid;

// advisor
      $adv[$i] = DB::table('project_advisors')
                  ->join('advisors','advisor_id','=','advisors.id')
                  ->where('project_pkid',$id[$i])
                  ->select('advisor_name')->get();
      $obj['project'][$i]['advisor'] = $adv[$i];

// proposal file
      $firstDraftProposal[$i] = DB::table('proposals')
                                ->where('project_pkid',$id[$i])
                                ->where('proposal_type_id','=','1')
                                ->value('proposal_path_name');
      $firstProposal[$i] = DB::table('proposals')
                                ->where('project_pkid',$id[$i])
                                ->where('proposal_type_id','=','2')
                                ->value('proposal_path_name');
      $secondProposal[$i] = DB::table('proposals')
                                ->where('project_pkid',$id[$i])
                                ->where('proposal_type_id','=','3')
                                ->value('proposal_path_name');
      $thirdProposal[$i] = DB::table('proposals')
                                ->where('project_pkid',$id[$i])
                                ->where('proposal_type_id','=','4')
                                ->value('proposal_path_name');
      $finalProposal[$i] = DB::table('proposals')
                                ->where('project_pkid',$id[$i])
                                ->where('proposal_type_id','=','5')
                                ->value('proposal_path_name');

      $obj['project'][$i]['firstDraftProposal'] = $firstDraftProposal[$i];
      $obj['project'][$i]['firstProposal'] = $firstProposal[$i];
      $obj['project'][$i]['secondProposal'] = $secondProposal[$i];
      $obj['project'][$i]['thirdProposal'] = $thirdProposal[$i];
      $obj['project'][$i]['finalProposal'] = $finalProposal[$i];
    }


    return view('advisor.advProject',$obj);
  }
}
