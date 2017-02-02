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
//guess
Route::get('/', 'HomeController@ShowProject');
Route::get('index', 'HomeController@ShowProject');
Route::auth();
Route::post('login','LdapLoginController@Login');
Route::get('relogin', 'LdapLoginController@getIndex');
Route::get('logout','LdapLoginController@getLogout');
Route::get('home/','projectController@index');
Route::get('home/search','projectController@search');
// Route::get('showproject/{groupId}','showProjectController@index');
Route::get('showproject/{groupId}','showProjectController@show');

//admin
Route::get('exam/manageroom','examRoomController@index');
Route::get('exam/manageroom/create','examRoomController@create');
Route::get('exam/manageroom/addDatas/{id}','examRoomController@addDatas');
Route::post('exam/manageroom/create/editroom','examRoomController@genGroup');
Route::get('exam/manageroom/create/preview','examRoomController@preview');
Route::post('exam/manageroom/create/editroom/confirmroom', 'examRoomController@submitRoom');
Route::get('exam/manageroom/preview/{roomid}', 'examRoomController@PreviewExamRoom');

Route::get('exam/scoresheet','ScoreSheetController@index');
Route::get('exam/managescore/template/create','ScoreSheetController@createTemplate');
Route::post('exam/managescore/template','ScoreSheetController@storeTemplate');
Route::get('exam/managescore/template', 'ScoreSheetController@manageTemplate');
Route::get('exam/managescore/template/{template}/edit','ScoreSheetController@editTemplate');
Route::put('exam/managescore/template/{template}','ScoreSheetController@updateTemplate');

Route::get('exam/managescore/criteria',function(){
  return view('admin.manageCriteria');
});
Route::get('setting/admin', 'SetAdminController@index');
Route::get('setting/settoadmin/{userid}/{position}', 'SetAdminController@setToAdmin');
Route::get('setting/settouser/{userid}/{position}', 'SetAdminController@setToUser');
Route::get('setting/student',function(){
  return view('admin.setStudent');
});
Route::get('project/edit',function(){
  return view('admin.editStdProject');
});
Route::get('setting/year',function(){
  return view('admin.manageYear');
});
Route::get('setting/category', 'AdminSettingController@managecategory');
Route::get('setting/room',function(){
  return view('admin.testroom');
});

Route::get('exam/managescore/{year}','ScoreSheetController@viewScoreSheet');

Route::post('exam/managescore/{year}','ScoreSheetController@setDefault');

Route::get('exam/managescore/{year}/mainscore/{id}','ScoreSheetController@editMainScore');

Route::put('exam/managescore/{year}/mainscore/{id}','ScoreSheetController@updateMainScore');

Route::get('exam/managescore/{year}/subscore/{id}','ScoreSheetController@editSubScore');

Route::put('exam/managescore/{year}/subscore/{id}','ScoreSheetController@updateSubScore');

Route::get('dday/scorerecord', function () {
  return view('admin.ddayscore');
});
Route::get('setting/recommend', 'AdminSettingController@RecommendProject');
Route::post('setting/recommend/addrecommend', 'AdminSettingController@AddRecommend');
Route::post('/setting/recommend/deleterecommend', 'AdminSettingController@DeleteRecommend');

Route::get('exam/scorerecord/viewscore',function(){
  return view('admin.viewScore');
});
Route::get('dday/scorerecord', 'DdayScoreRecord@ShowScore');


Route::get('exam/managescore/criteria/main/create','ScoreSheetController@createMainCriteria');

Route::post('exam/managescore/criteria/main','ScoreSheetController@storeMainCriteria');

Route::get('exam/managescore/criteria/sub/create','ScoreSheetController@createSubCriteria');

Route::post('exam/managescore/criteria/sub','ScoreSheetController@storeSubCriteria');

Route::get('exam/scorerecord','ScoreRecordController@index');

Route::get('exam/scorerecord/viewscore/{id}', 'ScoreRecordController@viewScore');

Route::post('exam/scorerecord/viewscore/{id}', 'ScoreRecordController@storeScoreLevel');

Route::post('exam/scorerecord/level','ScoreRecordController@ScoreLevel');

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

//advisor
Route::get('exam/round','GiveMarksController@selectRound');
Route::get('exam/round/{round}/givemarks/{id}', 'GiveMarksController@giveMarksData');
Route::put('exam/round/{round}/givemarks/{id}', 'GiveMarksController@giveMarks');
Route::get('exam/round/{round}','GiveMarksController@examDetail');
Route::post('exam/round/{round}','GiveMarksController@submit');

Route::resource('exam/allowtest', 'AllowTestController');
Route::resource('advproject','AdvisorProjectController');
Route::resource('advisor/news/announcement', 'AdvisorAnnoucementController');
Route::resource('advisor/news/document', 'AdvisorDocumentController');

//student
Route::group(['middleware' => 'studentcheck'], function () {

  Route::get('myscore', 'MyScore@ShowMyScore');
  Route::resource('student/news/announcement', 'StudentAnnoucementController');
  Route::resource('student/news/document', 'StudentDocumentController');
});
Route::group(['middleware' => 'studentnoproject'], function() {
  Route::get('student/myproject/noproject', function () {
    return view('student.noProject');
  });
  Route::resource('student/myproject/create','createProjectController');
});

Route::group(['middleware' => 'studentwaitapprove'], function(){
  Route::resource('student/myproject/waitapprove','waitApproveController');
});


Route::get('testldap', function(){
   return view('auth-ldap');
});


Route::get('project', 'AllProjectController@index');

Route::get('dday', 'DdayController@index');
Route::post('votedday', 'DdayController@voteDday');

Route::get('admin/setting', 'AdminSettingController@index');
Route::get('setting/type', 'AdminSettingController@managetype');
Route::get('admin/setting/{numbergencode}/{department}', 'AdminSettingController@enterGenCode');

Route::get('search',function(){
  return view('student.createProject');
});
Route::get('ldap',function(){
	return view('ldap');
});

Route::post('project/pending', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}/{group_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending/{option}/{project_id}', 'approveProjectController@updateApproveProject');
Route::get('project/pending','approveProjectController@index');
Route::get('project/pending/approveallproject', 'approveProjectController@updateApproveProject');

Route::group(['middleware' => 'studenthaveproject'], function(){
  Route::get('student/myproject/edit','editProjectController@index');
  Route::put('student/myproject/edit','editProjectController@update');
});

Route::post('edit/pic/upload', 'editProjectController@upload');

Route::post('edit/pic/delete', function(){
	$id = Request::Input('id');
	$data = DB::table('pictures')->where('id',$id)->first();
	$path = base_path('public_html');
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

// Route::get('exam/managescore/year/mainscore/test/{type}',function($type){
//   $data   = DB::table('main_templates_score')
//             ->join('templates_main','templates_main.id','=','template_main_id')
//             ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
//             ->where('type_id',$type)
//             ->select('criteria_main_name','score','template_id')
//             ->get();
//   if($data!=null){
//     $result['tempId'] =  $data[0]->template_id;
//     $result['data'] = $data;
//     return Response::json($result);
//   }else{
//     return 0;
//   }
// });

// Route::get('exam/scorerecord/viewscore/{projectId}/cal1',function(){
//
//     return 'getRequest complte';
//
// });

Route::get('exam/scorerecord/viewscore/{projectId}/cal1','ScoreRecordController@storeScoreLevel');
