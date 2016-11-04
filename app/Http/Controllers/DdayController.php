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
				if(Dday::where('dday_gencode', $gencode) != null){
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
				} else {
					return 'invalid';
				}
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
