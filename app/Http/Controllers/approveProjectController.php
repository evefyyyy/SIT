<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class approveProjectController extends Controller
{
    public function index()
    {
      return view('approveProject');
    }
}
