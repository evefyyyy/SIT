<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use File;
use DB;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Room;
use App\RoomExam;
use App\RoomAdvisor;
use App\GroupProject;
use App\Advisor;

class examRoomController extends Controller
{
    public function index()
    {

      return view('admin.manageRoom');
    }

    public function create()
    {
      $obj['rooms'] = Room::all();
      $obj['advisor'] = Advisor::all();

      return view('admin.addRoom',$obj);
    }

    public function genGroup(Request $request)
    {
      $test = $request['selectroom'];
      $adv[] = $request->get('selectAdv[]');
      dd($adv);
      $adv = DB::table('advisors')->where('id',$test)->value('id');


      return view('admin.editRoom');
    }
}
