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
		$count = 0 ;
		return view('admin.announce')->with('news',$news->reverse())->with('count',$count);
	}

	public function create()
	{

	}

	public function store(Request $request)
	{
		$nId = (DB::table('news')->max('id'))+1 ;
		$news = new News();
		$news->title = $request['title'];
		$path = base_path('public/adminNewsFiles/') ;
		$file = $request->file('myfiles');
		$extension = $file->getClientOriginalExtension();
		$filename = "Announcement".$nId.".".$extension;
		$move = $file->move($path,$filename);
		$news->description = $request['description'];
		$news->file_path_name = $filename ;
		$news->news_type_id = '1' ;
		$news->save();


		$news = \App\News::where('news_type_id','=','1')->get();
		$count = 0 ;
		return view('admin.announce')->with('news',$news->reverse())->with('count',$count);
	}

	public function show($id)
	{

	}

	public function edit(Request $request){
		$file = $request->file('myfiles');
		$title = $request['cTitle'] ;
		$description = $request['description'] ;
		$id = $request['hId'];
		$path = base_path('public/adminNewsFiles/') ;

		if(isset($file)){
			$extension = $file->getClientOriginalExtension();
			$filename = "Document".$id.".".$extension;
			$move = $file->move($path,$filename);
			$oldFile = DB::table('news')->where('id',$id)->first();
			\File::Delete($path.$oldFile->file_path_name);
			DB::table('news')->where('id',$id)->update(['title'=> $title , 'description'=> $description , 'file_path_name' => $filename]) ;		
		}else{
			DB::table('news')->where('id',$id)->update(['title'=> $title , 'description'=> $description]) ;
		}

		$news = \App\News::where('news_type_id','=','1')->get();
		$count = 0 ;
		return view('admin.announce')->with('news',$news->reverse())->with('count',$count);
	}







}
