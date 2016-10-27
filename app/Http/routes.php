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
    return view('home');
});

Route::get('index', function () {
    return view('home');
});

Route::get('exam/manageroom','examRoomController@index');

Route::get('exam/manageroom/create','examRoomController@create');

Route::post('exam/manageroom/create/editroom','examRoomController@genGroup');

Route::get('exam/manageroom/create/preview','examRoomController@preview');

Route::post('exam/manageroom/create/editroom/confirmroom', 'examRoomController@submitRoom');

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
Route::get('exam/round', function () {
    return view('advisor.examDetail');
});
Route::get('exam/round/givemarks', function () {
    return view('advisor.giveMarks');
});
Route::get('exam/selectround', function () {
    return view('advisor.selectRound');
});
Route::resource('exam/allowtest', 'AllowTestController');

Route::get('exam/scoresheet','ScoreSheetController@index');

Route::get('exam/managescore/template/create','ScoreSheetController@createTemplate');

Route::post('exam/managescore/template','ScoreSheetController@storeTemplate');

Route::get('exam/managescore/template', 'ScoreSheetController@manageTemplate');

Route::get('exam/managescore/template/{template}/edit','ScoreSheetController@editTemplate');

Route::put('exam/managescore/template/{template}','ScoreSheetController@updateTemplate');

// Route::get('exam/managescore/year/mainscore/create','ScoreSheetController@createManageScoreSheet1');
//
// Route::post('exam/managescore/year/mainscore','ScoreSheetController@storeManageScoreSheet1');
//
// Route::get('exam/managescore/year/subscore/create','ScoreSheetController@createManageScoreSheet2');
//
// Route::post('exam/managescore/year/subscore','ScoreSheetController@storeManageScoreSheet2');

Route::get('exam/managescore/criteria',function(){
  return view('admin.manageCriteria');
});
Route::get('exam/managescore/{year}','ScoreSheetController@viewScoreSheet');

Route::get('exam/scorerecord/viewscore',function(){
  return view('admin.viewScore');
});

Route::get('exam/managescore/criteria/main/create','ScoreSheetController@createMainCriteria');

Route::post('exam/managescore/criteria/main','ScoreSheetController@storeMainCriteria');

Route::get('exam/managescore/criteria/sub/create','ScoreSheetController@createSubCriteria');

Route::post('exam/managescore/criteria/sub','ScoreSheetController@storeSubCriteria');

Route::resource('exam/scorerecord','ScoreRecordController');

Route::get('myscore', function () {
    return view('student.myScore');
});
Route::resource('advproject','AdvisorProjectController');

Route::resource('student/news/announcement', 'StudentAnnoucementController');
// Route::post('news/announcement/edit', 'adminAnnouncementController@edit');

Route::resource('student/news/document', 'StudentDocumentController');
// Route::post('news/document/edit', 'adminDocumentController@edit');
Route::resource('advisor/news/announcement', 'AdvisorAnnoucementController');
Route::resource('advisor/news/document', 'AdvisorDocumentController');

// Route::group(['middleware' => 'studentCheck'], function () {
//     Route::get('home/projects','projectController@index');
// });

Route::get('home/','projectController@index');

Route::get('home/search','projectController@search');

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
Route::get('relogin', 'LdapLoginController@getIndex');
Route::get('logout','LdapLoginController@getLogout');

Route::post('project/pending', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}/{group_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending','approveProjectController@index');
Route::get('project/pending/approveallproject', 'approveProjectController@updateApproveProject');

Route::resource('student/myproject/create','createProjectController');

Route::resource('student/myproject/waitapprove','waitApproveController');

Route::get('student/myproject/edit','editProjectController@index');

Route::put('student/myproject/edit','editProjectController@update');

Route::post('edit/pic/delete', function(){
	$id = Request::Input('id');
	$data = DB::table('pictures')->where('id',$id)->first();
	$path = base_path('public_html') ;
	File::Delete($path.$data->picture_path_name);
	DB::table('pictures')->where('id',$id)->delete();
});

Route::post('student/myproject/create/stdId2',function(){
	$stdId = Request::Input('stdId2');
  $data = DB::table('students')
          ->where('student_id',$stdId)
          ->select('student_name')->first();
  if(isset($data)){
    $projectStd = DB::table('project_students')->select('student_pkid')->get();
    if($projectStd != null){
      foreach($projectStd as $ps){
        $id[] = $ps->student_pkid;
      }
      $data = DB::table('students')
              ->where('student_id',$stdId)
              ->whereNotIn('id',$id)
              ->select('student_name')->first();
      if(isset($data)){
        return Response::json($data);
      }else{
        return 1;
      }
    }else{
      return Response::json($data);
    }
  }else{
  		return 0;
  }
});

Route::post('student/myproject/create/stdId3',function(){
  $stdId = Request::Input('stdId3');
  $data = DB::table('students')
          ->where('student_id',$stdId)
          ->select('student_name')->first();
  if(isset($data)){
    $projectStd = DB::table('project_students')->select('student_pkid')->get();
    if($projectStd != null){
      foreach($projectStd as $ps){
        $id[] = $ps->student_pkid;
      }
      $data = DB::table('students')
              ->where('student_id',$stdId)
              ->whereNotIn('students.id',$id)
              ->select('student_name')->first();
      if(isset($data)){
    	   return Response::json($data);
      }else{
        return 1;
      }
    }else{
      return Response::json($data);
    }
  }else{
  		return 0;
  }
});

Route::post('student/myproject/create/{id}/stdId2',function(){
  $stdId = Request::Input('stdId2');
  $data = DB::table('students')
          ->where('student_id',$stdId)
          ->select('student_name')->first();
  if(isset($data)){
    $projectStd = DB::table('project_students')->select('student_pkid')->get();
    if($projectStd != null){
      foreach($projectStd as $ps){
        $id[] = $ps->student_pkid;
      }
      $data = DB::table('students')
              ->where('student_id',$stdId)
              ->whereNotIn('students.id',$id)
              ->select('student_name')->first();
      if(isset($data)){
    	   return Response::json($data);
      }else{
        return 1;
      }
    }else{
      return Response::json($data);
    }
  }else{
  		return 0;
  }
});

Route::post('student/myproject/create/{id}/stdId3',function(){
  $stdId = Request::Input('stdId3');
  $data = DB::table('students')
          ->where('student_id',$stdId)
          ->select('student_name')->first();
  if(isset($data)){
    $projectStd = DB::table('project_students')->select('student_pkid')->get();
    if($projectStd != null){
      foreach($projectStd as $ps){
        $id[] = $ps->student_pkid;
      }
      $data = DB::table('students')
              ->where('student_id',$stdId)
              ->whereNotIn('students.id',$id)
              ->select('student_name')->first();
      if(isset($data)){
         return Response::json($data);
      }else{
        return 1;
      }
    }else{
      return Response::json($data);
    }
  }else{
      return 0;
  }
});

Route::get('exam/managescore/year/mainscore/test/{type}',function($type){
  $data   = DB::table('main_templates_score')
          ->join('templates_main','templates_main.id','=','template_main_id')
          ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
          ->where('type_id',$type)
          ->select('criteria_main_name','score','template_id')
          ->get();
  if($data!=null){
  $result['tempId'] =  $data[0]->template_id;
  $result['data'] = $data;
    return Response::json($result);
  }else{
    return 0;
  }
});

Route::get('/hello',function(){
    $type = Request::Input('type');
    $data = DB::table('main_templates_score')
            ->join('templates_main','templates_main.id','=','template_main_id')
            ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
            ->where('type_id',$type)
            ->get();
    return $data ;
});
