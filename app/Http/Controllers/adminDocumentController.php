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



class adminDocumentController extends Controller {

	public function index()
	{
		$news = \App\News::where('news_type_id','=','2')->get();
		$count = 0 ;
		return view('admin.doc')->with('news',$news->reverse())->with('count',$count);
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
		$filename = "Document".$nId.".".$extension;
		$move = $file->move($path,$filename);
		$news->file_path_name = $filename ;
		$news->news_type_id = '2' ;
		$news->save();

		$news = \App\News::where('news_type_id','=','2')->get();
		$count = 0 ;
		return redirect('news/document/');
	}

	public function show($id)
	{

	}

	public function edit(Request $request)
	{
		$file = $request->file('myfiles');
		$title = $request['cTitle'] ;
		$id = $request['hId'];
		$path = base_path('public/adminNewsFiles/') ;

		if(isset($file)){
			$extension = $file->getClientOriginalExtension();
			$filename = "Document".$id.".".$extension;
			$move = $file->move($path,$filename);
			$oldFile = DB::table('news')->where('id',$id)->first();
			\File::Delete($path.$oldFile->file_path_name);
			DB::table('news')->where('id',$id)->update(['title'=> $title , 'file_path_name' => $filename]) ;
		}else{
			DB::table('news')->where('id',$id)->update(['title'=> $title]) ;
		}

		$news = \App\News::where('news_type_id','=','2')->get();
		$count = 0 ;
		return redirect(url('news/document'))->with('news',$news->reverse())->with('count',$count);
	}






}
