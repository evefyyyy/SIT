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
    return view('tmp');
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

Route::resource('student/myproject/create','createProjectController');

Route::resource('admin/project/pending','approveProjectController');
