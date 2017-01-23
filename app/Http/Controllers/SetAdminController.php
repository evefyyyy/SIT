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
}
