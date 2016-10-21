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

class AdvisorAnnoucementController extends Controller
{
    public function index()
	{
    $news = \App\News::where('news_type_id','=','1')->where('end_date','=','0000-00-00')->orWhere('end_date','>=',date('Y-m-d'))->get();

    $expired = \App\News::where('news_type_id','=','1')->where('end_date','<=',date('Y-m-d'))->where('end_date','!=','0000-00-00')->get();

    $count = 0 ;

		return view('advisor.advAnnounce')->with('news',$news->reverse())->with('count',$count);
	}



}
