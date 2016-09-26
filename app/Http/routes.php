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

Route::get('home',function(){
  return view('home');
});

Route::get('index', function () {
    return view('home');
});

Route::get('exam/manageroom','examRoomController@index');

Route::get('exam/manageroom/create','examRoomController@create');

Route::post('exam/manageroom/create/editroom','examRoomController@genGroup');

Route::get('exam/manageroom/create/preview','examRoomController@preview');

// Route::get('exam/manageroom',function(){
//   return view('admin.manageRoom');
// });

// Route::get('exam/manageroom/addroom','examRoomController@create');


// Route::get('exam/manageroom/addroom/editroom', function () {
//     return view('admin.editRoom');
// });
//
// Route::get('exam/manageroom/addroom/preview', function () {
//     return view('admin.confirmRoom');
// });
Route::get('exam/manageroom/preview', function () {
    return view('admin.previewRoom');
});
Route::get('exam/managescore', function () {
    return view('admin.manageScore');
});
Route::get('exam/scorerecord', function () {
    return view('admin.scoreRecord');
});
Route::get('myscore', function () {
    return view('student.myScore');
});
Route::get('advproject', function () {
    return view('advisor.advProject');
});
Route::get('exam/givemarks', function () {
    return view('advisor.giveMark');
});
Route::resource('student/news/announcement', 'StudentAnnoucementController');
// Route::post('news/announcement/edit', 'adminAnnouncementController@edit');

Route::resource('student/news/document', 'StudentDocumentController');
// Route::post('news/document/edit', 'adminDocumentController@edit');
Route::get('home/projects','projectController@index');

Route::get('home/projects/search','projectController@search');

Route::resource('showproject','showProjectController');

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

Route::get('dday', 'DdayController@index');
Route::get('dday/voteproject/{gencode}', 'DdayController@checkGenCode');

Route::get('admin/setting', 'AdminSettingController@index');
Route::get('admin/setting/{numbergencode}', 'AdminSettingController@enterGenCode');

Route::get('search',function(){
  return view('student.createProject');
});
Route::get('ldap',function(){
	return view('ldap');
});
Route::auth();

Route::post('login','LdapLoginController@Login');
Route::get('logout','LdapLoginController@getLogout');

Route::post('project/pending', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}/{group_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending','approveProjectController@index');
Route::get('project/pending/approveallproject', 'approveProjectController@updateApproveProject');

Route::resource('student/myproject/create','createProjectController');

Route::resource('student/myproject/waitapprove','waitApproveController');

Route::resource('student/myproject/edit','editProjectController');
Route::post('edit/pic/delete', function(){
	$id = Request::Input('id');
	$data = DB::table('pictures')->where('id',$id)->first();
	$path = base_path('public') ;
	\File::Delete($path.$data->picture_path_name);
	DB::table('pictures')->where('id',$id)->delete();
});

Route::post('student/myproject/create/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_name')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_name')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/{id}/stdId2',function(){
	$stdId = Request::Input('stdId2');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_name')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});

Route::post('student/myproject/create/{id}/stdId3',function(){
	$stdId = Request::Input('stdId3');
	$data = DB::table('students')->where('student_id',$stdId)->select('student_name')->first();
	if(isset($data)){
		return Response::json($data);
	}else{
		return 0;
	}
});
