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
    return view('stdTmp');
});

Route::get('student/myproject/noproject', function () {
    return view('noProject');
});

//Route::get('createProject', 'createProjectController@studentName');
Route::get('student/myproject/', function () {
    return view('waitApprove');
});

Route::get('admin/project/pending', function () {
    return view('approveProject');
});

Route::get('search',function(){
  return view('createProject');
});


Route::resource('student/myproject/create','createProjectController');

Route::resource('admin/project/pending','approveProjectController');

Route::post('student/myproject/stdId',function(){
	$stdId = Request::Input('stdId');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});
