<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use File;
use DB;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GroupProject;
use App\Student;
use App\Category;
use App\Type;
use App\Advisor;
use App\ProjectAdvisor;
use App\ProjectStudent;
use App\ProjectProposal;
use App\Proposal;
use App\ProjectDetail;
use App\Picture;
use App\Year;
use Illuminate\Http\Response;

class projectController extends Controller
{
  public function index()
  {
    $category = Category::orderBy('category_name', 'asc')->get();

    $groupProject = GroupProject::join('project_detail','group_projects.id','=','project_detail.project_pkid')
    ->join('pictures','pictures.project_pkid','=','group_projects.id')
    ->select('group_project_eng_name','group_project_detail','picture_path_name','category_id','group_projects.id','group_project_id')
    ->where('group_project_approve','=','1')
    ->where('picture_type_id',1)
    ->whereNotNull('group_project_detail')
    ->groupBy('group_projects.id')
    ->get();

    $poster = Picture::where('picture_type_id', 1)->get();



    return view('projects', compact('category', 'groupProject', 'poster'));
  }

  public function search(Request $request)
  {
   $obj['category'] = Category::all();

   $search = $request['search'];

   $year = $request['year'];

   $obj['search'] = $search;

   if($year==0 && $search == "" || $search == " "){
     $result = DB::table('group_projects')
     ->join('project_detail','group_projects.id','=','project_detail.project_pkid')
     ->join('pictures','pictures.project_pkid','=','group_projects.id')
     ->where('group_project_approve','=','1')
     ->where('picture_type_id',1)
     ->whereNotNull('group_project_detail')
     ->groupBy('project_detail.project_pkid')
     ->select('project_detail.project_pkid')->get();

     $obj['groupProject']  = [];
     if(count($result) != null){
       $countObj = count($result);
       for($i=0; $i< $countObj; $i++){
         $id[$i] = $result[$i]->project_pkid;
       }
       foreach($id as $i){
        array_push($obj['groupProject'],GroupProject::where('id',$i)->get()[0]);
      }
    }
  }else{
    if($year == 0){
      $result = DB::table('group_projects')
      ->join('project_detail','group_projects.id','=','project_detail.project_pkid')
      ->join('pictures','pictures.project_pkid','=','group_projects.id')
      ->where('group_project_approve','=','1')
      ->where('picture_type_id',1)
      ->whereNotNull('group_project_detail')
      ->where('group_project_eng_name','like','%'.$search.'%')
      ->orWhere('group_project_detail','like','%'.$search.'%')
      ->groupBy('project_detail.project_pkid')
      ->select('project_detail.project_pkid')->get();
    }else{
      if($year != 0 && $search != ""){
        $result = DB::table('group_projects')
        ->join('project_detail','group_projects.id','=','project_detail.project_pkid')
        ->join('pictures','pictures.project_pkid','=','group_projects.id')
        ->where('group_project_approve','=','1')
        ->where('picture_type_id',1)
        ->whereNotNull('group_project_detail')
        ->where('group_project_eng_name','like','%'.$search.'%')
        ->where('year_id',$year)
        ->groupBy('project_detail.project_pkid')
        ->select('project_detail.project_pkid')->get();
          if($result == ""){
            $result = DB::table('group_projects')
            ->join('project_detail','group_projects.id','=','project_detail.project_pkid')
            ->join('pictures','pictures.project_pkid','=','group_projects.id')
            ->where('group_project_approve','=','1')
            ->where('picture_type_id',1)
            ->whereNotNull('group_project_detail')
            ->where('group_project_detail','like','%'.$search.'%')
            ->where('year_id',$year)
            ->groupBy('project_detail.project_pkid')
            ->select('project_detail.project_pkid')->get();
          }
        }else{
          if($year != 0 && $search == ""){
            $result = DB::table('group_projects')
            ->join('project_detail','group_projects.id','=','project_detail.project_pkid')
            ->join('pictures','pictures.project_pkid','=','group_projects.id')
            ->where('year_id',$year)
            ->where('group_project_approve','=','1')
            ->where('picture_type_id',1)
            ->whereNotNull('group_project_detail')
            ->groupBy('project_detail.project_pkid')
            ->select('project_detail.project_pkid')->get();
          }
        }
      }

    $obj['groupProject']  = [];
    if(count($result) != ""){
      $countObj = count($result);
      for($i=0; $i< $countObj; $i++){
        $id[$i] = $result[$i]->project_pkid;
      }
      foreach($id as $i){
        array_push($obj['groupProject'],GroupProject::where('id',$i)->get()[0]);
      }
    }
  }

  return view(('searchResult'),$obj);
}
}
