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

class StudentDocumentController extends Controller
{
    public function index()
	{
		$news = \App\News::where('news_type_id','=','2')->get();
		$count = 0 ;
		return view('student.stdDoc')->with('news',$news->reverse())->with('count',$count);
	}

	

}
