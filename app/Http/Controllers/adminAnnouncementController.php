<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use File;
use DateTime;
use DB;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GroupProject;
use App\Student;
use App\Category;
use App\News;
use App\Advisor;
use App\ProjectAdvisor;
use App\ProjectStudent;



class adminAnnouncementController extends Controller {

	public function index()
	{
		$news = \App\News::where('news_type_id','=','1')->get();

		return view('admin.announce')->with('news',$news->reverse());
	}

	public function create()
	{

	}

	public function store(Request $request)
	{
		$nId = (DB::table('news')->max('id'))+1 ;
		$news = new News();
		$news->title = $request['title'];
		$path = base_path('public/adminNewsFiles') ;
		$file = $request->file('myfiles');
		$extension = $file->getClientOriginalExtension();
		$filename = "Announcement".$nId.".".$extension;
		$move = $file->move($path,$filename);
		$news->description = $request['description'];
		$news->file_path_name = $filename ;
		$news->news_type_id = '1' ;
		$news->save();


		$news = \App\News::where('news_type_id','=','1')->get();
		return view('admin.announce')->with('news',$news->reverse());
	}

	public function show($id)
	{

	}







}
