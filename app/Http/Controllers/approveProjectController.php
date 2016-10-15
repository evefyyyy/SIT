<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Advisor;
use App\Category;
use App\Type;
use App\GroupProject;
use App\Http\Requests;
use App\ProjectStudent;
use App\ProjectJoinStudents;
use App\Proposal;
use DB;
use App\ProjectAdvisor;

class approveProjectController extends Controller
{
  public function index()
  {
    $student = Student::all();
    $objs['students'] = $student;

    $category = Category::all();
    $objs['category'] = $category;

    $type = Type::all();
    $objs['type'] = $type;

    $advisor = Advisor::all();
    $objs['advisor'] = $advisor;

    $projectAdvisor = ProjectAdvisor::all();
    $objs['projectAdvisor'] = $projectAdvisor;

    $projectStudent = ProjectStudent::all();
    $objs['project_student'] = $projectStudent;

    $proposal = Proposal::all();
    $objs['proposal'] = $proposal;

    $objs['countProject'] = GroupProject::where('group_project_approve','=',0)->count();
    $objs['countProjectApp'] = GroupProject::where('group_project_approve', 1)->count();

    $projects = \App\ProjectStudent::all();
    $unique = $projects->unique('project_pkid');
    $projects = $unique->values()->all();
    $objs['project'] = $projects;

    $groupProject = GroupProject::all();
    $objs['group_project'] = $groupProject;

    $objs['project_number'] = GroupProject::where('year_id', 1)->max('project_num');

    //current year = 2016


    return view('admin.approveProject',$objs);
  }

  public function updateApproveProject(Request $request){

    $project_id = $request->project_id;
    $group_id = $request->group_id;
    $option = $request->option;
    $project_number = GroupProject::where('year_id', 1)->max('project_num');
    $proposal = Proposal::where('project_pkid', $project_id)->get();
    if($option === 'approve'){
      $group_project = GroupProject::find($project_id);
      $group_project->group_project_id = $group_id;
      $group_project->group_project_approve = 1;
      $group_project->project_num = ++$project_number;
      $group_project->save();
    } else if($option == 'delete'){
      DB::table('project_students')
      ->where('project_pkid',$project_id)
      ->delete();
      DB::table('project_advisors')
      ->where('project_pkid', $project_id)
      ->delete();
      DB::table('proposals')
      ->where('project_pkid', $project_id)
      ->delete();
      DB::table('group_projects')
      ->where('id', $project_id)
      ->delete();
    } else {
      $project = ProjectStudent::all();
      foreach ($project as $pj) {
        if($pj->groupProject->group_project_approve===0){
          if($pj->groupProject->type_id===1){
            $typeAbb = 'BU';
          } else if($pj->groupProject->type_id===2){
            $typeAbb = 'SO';
          } else {
            $typeAbb = 'RE';
          }

          $pj_number = GroupProject::where('year_id', 1)->max('project_num');
          $pj_number = ++$project_number;
          $current_year = $pj->groupProject->year->year_create;

          if($pj_number<10){
            $group_project_id = 'IT'.$current_year.'-'.$typeAbb.'0'.$pj_number;
          } else {
            $group_project_id = 'IT'.$current_year.'-'.$typeAbb.$pj_number;
          }
          $group_project = GroupProject::find($pj->groupProject->id);
          $group_project->group_project_id = $group_project_id;
          $group_project->group_project_approve = 1;
          $group_project->project_num = $pj_number;
          $group_project->save();
        }
      }
    }



    return redirect(url('project/pending'));
  }

  public function deleteProject(Request $request){

  }
}
