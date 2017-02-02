<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advisor;
use App\Staff;

use App\Http\Requests;

class SetAdminController extends Controller
{
    public function index(){
    	$advisor_user = Advisor::all();
    	$staff_user = Staff::all();

    	return view('admin.setAdmin', compact('advisor_user','staff_user')); 
	}

	public function setToAdmin(Request $request){
		$userid = $request->userid;
		$position = $request->position;
		if($position = "adv"){
			Advisor::where('id', $userid)->update(['admin_authen' => 1]);
		} else if($position = "stf"){
			Staff::where('id', $userid)->update(['admin_authen' => 1]);
		}

		return redirect('/setting/admin');
	}

	public function setToUser(Request $request){
		$userid = $request->userid;
		$position = $request->position;
		if($position = "adv"){
			Advisor::where('id', $userid)->update(['admin_authen' => 0]);
		} else if($position = "stf"){
			Staff::where('id', $userid)->update(['admin_authen' => 0]);
		}

		return redirect('/setting/admin');
	}
}
