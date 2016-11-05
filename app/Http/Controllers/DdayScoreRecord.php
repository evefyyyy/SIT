<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GroupProject;
use App\DdayProject;
use App\AllSetting;
use App\Year;

class DdayScoreRecord extends Controller
{
    public function ShowScore(){
    	$this_year = AllSetting::first();
    	$project_year = Year::where('year', $this_year->current_year)->first();
    	$group_project = GroupProject::where('year_id', $project_year->id)->get();

    	return view('admin.ddayscore', compact('group_project'));
    }
}
