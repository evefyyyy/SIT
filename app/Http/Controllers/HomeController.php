<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GroupProject;
use App\Picture;

class HomeController extends Controller
{
    public function ShowProject(){
    	$group_project = GroupProject::join('project_detail','group_projects.id','=','project_detail.project_pkid')
                              ->join('pictures','pictures.project_pkid','=','group_projects.id')
                              ->select('group_project_eng_name','group_project_detail','picture_path_name','category_id','group_projects.id','group_project_id')
                              ->where('group_project_approve','=','1')
                              ->where('picture_type_id',1)
                              ->whereNotNull('group_project_detail')
                              ->groupBy('group_projects.id')
                              ->get();

      $recommend_project = GroupProject::where('group_project_recommend', 1)->get();
    	$count_show_project = 0;
    	return view('home', compact('group_project', 'count_show_project', 'recommend_project'));
    }
}
