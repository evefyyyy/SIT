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

              return view('admin.approveProject',$objs);
          }

          public function updateApproveProject(Request $request){

             $project_id = $request->project_id;
             $group_id = $request->group_id;
             $option = $request->option;

             $proposal = Proposal::where('project_pkid', $project_id)->get();
             if($option === 'approve'){
              $group_project = GroupProject::find($project_id);
              $group_project->group_project_id = $group_id;
              $group_project->group_project_approve = 1;
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
            $group_project = GroupProject::where('group_project_approve', 0);
            if($group_project->type_id===1){
                $typeAbb = 'BU';
            } else if($group_project->type_id===2){
                $typeAbb = 'SO';
            } else {
                $typeAbb = 'RE';
            }
        }



        return redirect(url('project/pending'));
    }

    public function deleteProject(Request $request){

    }
}
