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
    return view('noProject');
});

//Route::get('createProject', 'createProjectController@studentName');
Route::get('student/myproject', function () {
    return view('waitApprove');
});

Route::get('admin/project/pending', function () {
    return view('approveProject');
});

<<<<<<< HEAD
Route::get('admin/project', function () {
    return view('allProject');
=======

Route::get('search',function(){
  return view('createProject');
});



Route::get('index', function () {
    return view('generalTmp');
>>>>>>> 1230e9aa1f9524a117b45f621918fd12901883ed
});


Route::resource('student/myproject/create','createProjectController');

Route::resource('admin/project/pending','approveProjectController');

Route::post('student/myproject/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});
