<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use Input;
use DB;

class searchController extends Controller
{
    public function searchStd2()
    {
      $stdId = Request::Input('stdId2');
    	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
    	if(isset($data)){
    		return Response::json($data);
    	}else{
    		return 0;
    	}
      return redirect(url('student/myproject/create'));
    }
}
