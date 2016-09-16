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

class examRoomController extends Controller
{
    public function index()
    {

      return view('admin.manageRoom');
    }

    public function create()
    {
      
      return view('admin.addRoom');
    }

    public function store()
    {
      return view('admin.addRoom');
    }
}
