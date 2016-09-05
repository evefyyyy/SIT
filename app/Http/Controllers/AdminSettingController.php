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
use DB;

class AdminSettingController extends Controller
{
    
	public function index(){
		return view('admin.adminsetting');
	}

    public function enterGenCode(Request $request)
	{
		$gencode = $request->numbergencode;
		for($i=0; $i<$gencode; $i++){
			$code = str_random(7);
			DB::table('dday')->insert(
				['dday_gencode'=> $code, 'dday_type'=>2]
				);
		}

		return redirect('admin/setting');
	}
}
