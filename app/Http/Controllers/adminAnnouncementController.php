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

		$news = \App\News::where('news_type_id','=','1')->where('end_date','=','0000-00-00')->orWhere('end_date','>=',date('Y-m-d'))->get();

		$expired = \App\News::where('news_type_id','=','1')->where('end_date','<=',date('Y-m-d'))->where('end_date','!=','0000-00-00')->get();

		$count = 0 ;

		return view('admin.announce')->with('news',$news->reverse())->with('expired',$expired->reverse())->with('count',$count);
	}

	public function create()
	{

	}

	public function store(Request $request)
	{
		if($time = $request['published']){
			$replace = str_replace('/', '-', $time);
			$str = strtotime($replace);
			$startdate = date('Y-m-d',$str);
		}else{
			$startdate = date('Y-m-d');
		}

		if($time = $request['exp']){
			$replace = str_replace('/', '-', $time);
			$str = strtotime($replace);
			$enddate = date('Y-m-d',$str);
		}else{
			$enddate = '0000-00-00';
		}

		$nId = (DB::table('news')->max('id'))+1 ;
		$news = new News();
		$news->title = $request['title'];
		$path = base_path('public/adminNewsFiles/') ;
		$file = $request->file('myfiles');

		if(isset($file)){
			$extension = $file->getClientOriginalExtension();
			$filename = "Announcement".$nId.".".$extension;
			$move = $file->move($path,$filename);
			$news->file_path_name = $filename ;
		}
		$news->description = $request['description'];
		$news->start_date = $startdate;
		$news->end_date = $enddate;
		$news->news_type_id = '1' ;

		$news->save();


		$news = \App\News::where('news_type_id','=','1')->where('end_date','>',date('Y-m-d'))->get();
		$expired = \App\News::where('news_type_id','=','1')->where('end_date','<=',date('Y-m-d'))->get();
		$count = 0 ;

		return redirect('news/announcement/');
	}

	public function edit(Request $request){
		$file = $request->file('myfiles');
		$title = $request['cTitle'] ;
		$description = $request['description'] ;
		$id = $request['hId'];

		if(isset($file)){
			$path = base_path('public/adminNewsFiles/') ;
			$extension = $file->getClientOriginalExtension();
			$filename = "Announcement".$id.".".$extension;
			$oldFile = DB::table('news')->where('id',$id)->select('file_path_name')->first();
			File::Delete($path.$oldFile->file_path_name);
			$move = $file->move($path,$filename);
			DB::table('news')->where('id',$id)->update(['title'=> $title , 'description'=> $description , 'file_path_name' => $filename]) ;
		}else{
			DB::table('news')->where('id',$id)->update(['title'=> $title , 'description'=> $description]) ;
		}

		if($starttime = $request['published']){
			$replace = str_replace('/', '-', $starttime);
			$str = strtotime($replace);
			$startdate = date('Y-m-d',$str);
			DB::table('news')->where('id',$id)->update(['start_date' => $startdate]) ;
		}

		if($endtime = $request['exp']){
			$replace = str_replace('/', '-', $endtime);
			$str = strtotime($replace);
			$enddate = date('Y-m-d',$str);
			DB::table('news')->where('id',$id)->update(['end_date' => $enddate]) ;
		}

		// $news = \App\News::where('news_type_id','=','1')->where('end_date','>',date('Y-m-d'))->get();
		// $expired = \App\News::where('news_type_id','=','1')->where('end_date','<=',date('Y-m-d'))->get();
		// $count = 0 ;

		$news = \App\News::where('news_type_id','=','1')->where('end_date','=','0000-00-00')->orWhere('end_date','>=',date('Y-m-d'))->get();
		$expired = \App\News::where('news_type_id','=','1')->where('end_date','<=',date('Y-m-d'))->where('end_date','!=','0000-00-00')->get();
		$count = 0 ;


		return redirect(url('news/announcement'))->with('news',$news->reverse())->with('expired',$expired->reverse())->with('count',$count);
	}







}
