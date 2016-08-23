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

Route::get('/student', function () {
    return view('stdTmp');
});

Route::get('/student/myproject/noproject', function () {
    return view('noProject');
});

Route::get('/student/myproject/create', 'createProjectController@studentName');
Route::get('/student/myproject/details', function () {
    return view('waitApprove');
});

Route::get('/admin', function () {
    return view('adminTmp');
});

Route::get('/admin/project/pending', function () {
    return view('approveProject');
});

 