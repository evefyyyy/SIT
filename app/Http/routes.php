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

Route::get('admin/project/pending/{project_id}/{group_id}', 'approveProjectController@updateApproveProject');

Route::resource('student/myproject/create','createProjectController');

Route::resource('admin/project/pending','approveProjectController@index');

Route::resource('student/myproject/waitapprove','waitApproveController');

Route::get('test',function(){
	$projects = App\GroupProject::all();
	foreach ($projects as $project) {
		echo "<h1>".$project->group_project_th_name."</h1>";
		foreach ($project->projectStudents as $team) {
			echo "ชื่อ-นามสกุล: ".$team->student->student_fname." ".$team->student->student_lname;
			echo "<br>";
		}
		echo "<h2>อาจารย์ที่ปรึกษา</h2>";
		foreach ($project->projectAdvisors as $advisor) {
			echo "ชื่อ-นามสกุล: ".$advisor->advisor->advisor_fname." ".$advisor->advisor->advisor_lname;
			echo "<br>";
		}
		echo "<hr>";
	}
<<<<<<< HEAD
	return  'out';
}); 
=======
});
>>>>>>> bc528a5d875fa0fd21be1a7e18827ed49620c2e7

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
