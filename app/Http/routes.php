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

Route::get('testldap', function(){
	return view('auth-ldap');
});

Route::get('student/myproject/noproject', function () {
    return view('student.noProject');
});

Route::resource('news/announcement', 'adminAnnouncementController');
Route::post('news/announcement/edit', 'adminAnnouncementController@edit');

Route::resource('news/document', 'adminDocumentController');
Route::post('news/document/edit', 'adminDocumentController@edit');
Route::post('news/delete', function(){
	$id = Request::Input('id');
	$type = Request::Input('type');
	$data = DB::table('news')->where('id',$id)->first();
	$path = base_path('public/adminNewsFiles/') ;
	\File::Delete($path.$data->file_path_name);
	DB::table('news')->where('id',$id)->delete();

	return Response::json($type);
});

Route::get('project', 'AllProjectController@index');

Route::get('dday', 'DdayController@genCode');
Route::get('admin/setting', 'AdminSettingController@index');
Route::get('admin/setting/{numbergencode}', 'AdminSettingController@enterGenCode');

Route::get('search',function(){
  return view('student.createProject');
});

Route::get('index', function () {
    return view('generalTmp');
});
Route::get('ldap',function(){
	return view('ldap');
});
Route::post('loginldp','LdapLoginController@Login');

Route::post('project/pending', 'approveProjectController@updateApproveProject');

Route::get('project/pending/{option}/{project_id}/{group_id}', 'approveProjectController@updateApproveProject');

Route::get('project/pending/{option}/{project_id}', 'approveProjectController@updateApproveProject');

Route::resource('project/pending','approveProjectController@index');

Route::resource('student/myproject/create','createProjectController');

Route::resource('student/myproject/waitapprove','waitApproveController');

Route::resource('student/myproject/edit','editProjectController');

Route::post('student/myproject/create/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/{id}/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/{id}/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_prefix','student_fname','student_lname')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});
