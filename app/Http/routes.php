<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('generalTmp');
});

Route::get('index', function () {
    return view('generalTmp');
});

Route::get('student/myproject/noproject', function () {
    return view('student.noProject');
});

//Route::get('createProject', 'createProjectController@studentName');
// Route::get('student/myproject/waitapprove', function () {
//     return view('waitApprove');
// });

Route::get('student/myproject/edit', function () {
    return view('student.editProject');
});

Route::get('admin/project/pending', function () {
    return view('admin.approveProject');
});

Route::resource('admin/project', 'AllProjectController');

Route::get('search',function(){
  return view('student.createProject');
});

Route::get('index', function () {
    return view('generalTmp');
});

Route::resource('student/myproject/create','createProjectController');

Route::resource('admin/project/pending','approveProjectController');

Route::resource('student/myproject/waitapprove','waitApproveController');

Route::get('test',function(){
	// $project = App\GroupProject::find(1);
	// return $project->category->category_name;
	// return $project->projectStudents;
	$projects = App\ProjectStudent::all();
	$unique = $projects->unique('project_pkid');
	$projects = $unique->values()->all();
	foreach ($projects as $project) {
		echo "<h1>".$project->groupProject->group_project_th_name."</h1>";
		echo "<br>";
		$teams = App\ProjectStudent::where('project_pkid', $project->project_pkid)->get();
		foreach($teams as $team){
			echo "ชื่อ-นามสกุล: ".$team->student->student_fname." ".$team->student->student_lname;
			echo "<br>";
		}
		echo "<h2>อาจารย์ที่ปรึกษา</h2>";
		$advisors = App\ProjectAdvisor::where('project_pkid', $project->project_pkid)->get();
		foreach($advisors as $advisor){
			echo "ชื่อ-นามสกุล: ".$advisor->advisor->advisor_fname." ".$advisor->advisor->advisor_lname;
			echo "<br>";
		}
		echo "<hr>";
	}
});

Route::post('student/myproject/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});
