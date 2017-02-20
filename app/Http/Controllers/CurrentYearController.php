<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllSetting;

class CurrentYearController extends Controller
{
    //
    public function changeYear(Request $request){
    	$current_year = $request->current_year;
    	AllSetting::where('id', 1)
    				->update(array('current_year' => $current_year));
    	return redirect()->back();
    }
}
