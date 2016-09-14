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

class projectController extends Controller
{
    public function index()
    {
      $obj['category'] = Category::all();

      $obj['groupProject'] = GroupProject::all();

      $obj['detail'] = ProjectDetail::all();

      $obj['poster'] = Picture::all();

      return view('projects',$obj);
    }

    public function search(Request $request)
    {
      $obj['category'] = Category::all();

      $search = $request['search'];

      $result = DB::table('group_projects')
                ->join('project_detail','group_projects.id','=','project_pkid')
                ->where('group_project_eng_name','like','%'.$search.'%')
                ->orwhere('group_project_detail','like','%'.$search.'%')
                ->select('project_pkid')->get();

      foreach($result as $r){
        $id = $r->project_pkid;
      }

      $obj['groupProject'] = GroupProject::where('id',$id)->get();

      return view(('searchResult'),$obj);
    }
}
