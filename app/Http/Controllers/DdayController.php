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
use App\Proposal;

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
	public function allowDday(Request $request){
		$student = Student::all();
		$objs['students'] = $student;

		$category = Category::all();
		$objs['category'] = $category;

		$type = Type::all();
		$objs['type'] = $type;

		$advisor = Advisor::all();
		$objs['advisors'] = $advisor;

    	$objs['proposal'] = Proposal::all();

		$objs['countProject'] = GroupProject::where('group_project_approve','=',1)->count();


		$projects = \App\ProjectStudent::all();
		$unique = $projects->unique('project_pkid');
		$objs['project'] = $projects;

		$groupProject = GroupProject::all();
    	$objs['group_project'] = $groupProject;

      	return view('admin.allowdday',$objs);
	}
}
