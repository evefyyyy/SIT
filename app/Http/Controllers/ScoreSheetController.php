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
use Auth;

class ScoreSheetController extends Controller
{
    public function index()
    {
      return view ('admin.scoreSheet');
    }

    public function createCriteria()
    {
      $data['url'] = url('exam/managescore/criteria');
      return view ('admin.manageCriteria',$data);
    }

    public function storeCriteria(Request $request)
    {
      $main = $request['mainfields'];
      $count = count($main);
      for($i=0;$i<$count;$i++){
        $obj = new CriteriaMain();
        $obj->criteria_main_name = $main[$i];
        $obj->save();
      }
      return redirect(url('exam/managescore/criteria/create'));
    }
    public function editCriteria($id)
    {

    }
}
