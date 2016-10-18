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

class projectController extends Controller
{
    public function index()
    {
      $obj['category'] = Category::all();

      $obj['groupProject'] = GroupProject::where('group_project_approve','=','1')->get();

      $obj['poster'] = Picture::where('picture_type_id', 1)->get();


      return view('projects',$obj);
    }

    public function search(Request $request)
    {
      $obj['category'] = Category::all();

      $search = $request['search'];

      $year = $request['year'];

      $obj['search'] = $search;

      if($search === " "){
        $obj['groupProject'] = GroupProject::where('group_project_approve','=','1')->get();
      }else{
        if($year == 0){
          $result = DB::table('group_projects')
                    ->join('project_detail','group_projects.id','=','project_pkid')
                    ->where('group_project_approve','=','1')
                    ->where('group_project_eng_name','like','%'.$search.'%')
                    ->orWhere('group_project_detail','like','%'.$search.'%')
                    ->select('project_pkid')->get();
        }else{
          if($year != 0 && $search != null){
            $result = DB::table('group_projects')
                      ->join('project_detail','group_projects.id','=','project_pkid')
                      ->where('group_project_approve','=','1')
                      ->where('group_project_eng_name','like','%'.$search.'%')
                      ->where('year_id',$year)
                      ->select('project_pkid')->get();
            if($result == null){
              $result = DB::table('group_projects')
                        ->join('project_detail','group_projects.id','=','project_pkid')
                        ->where('group_project_approve','=','1')
                        ->where('group_project_detail','like','%'.$search.'%')
                        ->where('year_id',$year)
                        ->select('project_pkid')->get();
            }
          }else{
            if($year != 0 && $search == null){
              $result = DB::table('group_projects')
                        ->join('project_detail','group_projects.id','=','project_pkid')
                        ->where('group_project_approve','=','1')
                        ->where('year_id',$year)
                        ->select('project_pkid')->get();
            }
          }
        }
          $obj['groupProject']  = [];
          if(count($result) != null){
            $countObj = count($result);
            for($i=0; $i< $countObj; $i++){
              $id[$i] = $result[$i]->project_pkid;
            }
            $obj['groupProject'] =[];
            foreach($id as $i){
              array_push($obj['groupProject'],GroupProject::where('id',$i)->get()[0]);
            }
          }
      }


      return view(('searchResult'),$obj);
    }
}
