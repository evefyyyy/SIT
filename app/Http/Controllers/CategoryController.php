<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
  public function index()
 {
     $category = Category::select("Category_name")->get();

     return View::make("createProject")->with("Category", $category);
 }
}
