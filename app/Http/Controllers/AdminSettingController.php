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
use App\AllSetting;
use App\DdayProject;
use DB;

class AdminSettingController extends Controller
{
    
	public function index(){
		$current_year = AllSetting::where('id', 1)->first()->current_year;
		$dday_gencode = Dday::where('year', $current_year)->get();
		return view('admin.adminsetting', compact('dday_gencode'));
	}

	public function managetype(){
		$alltype = Type::all();
		return view('admin.manageType', compact('alltype'));
	}
	public function managecategory(){
		$allcategory = Category::all();
		 return view('admin.manageCategory', compact('allcategory'));
	}
    public function enterGenCode(Request $request)
	{
		$gencode = $request->numbergencode;
		$department = $request->department;
		$current_year = AllSetting::where('id', 1)->first()->current_year;
		if($department == "IT"){
			for($i=0; $i<$gencode; $i++){
			$code = $department."-".str_random(7);
			DB::table('dday')->insert(
				['dday_gencode'=> $code, 'year'=> $current_year]
				);
			}
		} else if($department == "CS"){
			for($i=0; $i<$gencode; $i++){
				$code = $department."-".str_random(7);
				DB::table('dday')->insert(
					['dday_gencode' => $code, 'year' => $current_year]
					);
			}
		}
		return redirect('admin/setting');
	}

	public function RecommendProject(){
		$recommendproject = GroupProject::where('group_project_recommend', 1)->get();
		return view('admin.recommend', compact('recommendproject'));
	}

	public function AddRecommend(Request $request){
		$addrecommend = $request->recommend;
		$addprojectid = GroupProject::where('group_project_id', strtoupper($addrecommend))->first();
		$group_project = GroupProject::find($addprojectid->id);
      	$group_project->group_project_recommend = 1;
      	$group_project->save();

		return redirect()->back();
	}

	public function DeleteRecommend(Request $request){
		$deleterecommend = $request->pjid;
		$addprojectid = GroupProject::where('group_project_id', strtoupper($deleterecommend))->first();
		$group_project = GroupProject::find($addprojectid->id);
      	$group_project->group_project_recommend = 0;
      	$group_project->save();
	}
}
