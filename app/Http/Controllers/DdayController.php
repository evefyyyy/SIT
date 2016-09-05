<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DdayController extends Controller
{
    //
    public function genCode()
	{
		$string = str_random(7);
		return view('ddayhome')->with(compact('string'));
	}
}
