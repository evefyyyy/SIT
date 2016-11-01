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
use DB;

class AdminSettingController extends Controller
{
    
	public function index(){
		$current_year = AllSetting::where('id', 1)->first()->current_year;
		return view('admin.adminsetting');
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
}
