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
	public function checkGenCode(Request $request){
		$dday = DdayProject::All();
		$gencode = $request->gencode;
		$checkgencode = DB::table('dday')
			->where('dday_gencode', $gencode)
			->count();
		if($checkgencode = 1){
			return view('dday/voteproject/'+$gencode);
		} else {
			return redirect('/project');
		}
	}
	public function voteDday(Request $request){
		$gencode = $request->gencode;
		$pjid = $request->pjid;
		$ddayid = Dday::where('dday_gencode', $gencode)->first();
		if($ddayid == null){
			return "invalid";
		} else if ($ddayid != null){
			$checkgencode = DdayProject::where('dday_id','=', $ddayid->id)->first();
			if($checkgencode != null){
				return "used";
			} else if($checkgencode == null){
				DdayProject::insert(
					['project_pkid' => $pjid, 'dday_id' => $ddayid->id]
					);
				return "success";
			}
		}
	}
}
