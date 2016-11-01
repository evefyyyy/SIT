<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Dday;
use App\Advisor;
use App\Category;
use App\Type;
use App\GroupProject;
use App\ProjectStudent;
use App\ProjectJoinStudents;
use App\ProjectProposal;
use App\DdayProject;
use DB;

class DdayController extends Controller
{
    //
    public function index()
	{
		return view('ddayhome');
	}
	public function voteDday(Request $request){
		$gencode = $request->gencode;
		$pjid = $request->pjid;
		$ddayid = Dday::where('dday_gencode', $gencode)->first();
		$group_project_id = GroupProject::where('id', $pjid)->first()->group_project_id;
		if($ddayid == null){
			return "invalid";
		} else if ($ddayid != null){
			$checkgencode = DdayProject::where('dday_id','=', $ddayid->id)->first();
			if($checkgencode != null){
				return "used";
			} else if($checkgencode == null){
				if(substr($gencode, 0,2)=='IT' && substr($group_project_id, 0,2) == 'IT'){
					DdayProject::insert(
						['project_pkid' => $pjid, 'dday_id' => $ddayid->id]
						);
					return "success";
				} else if(substr($gencode, 0,2)=='CS' && substr($group_project_id, 0,2) == 'CS'){
					DdayProject::insert(
						['project_pkid' => $pjid, 'dday_id' => $ddayid->id]
						);
					return "success";
				} else {
					return "invalid";
				}
			}
		}
	}
}
