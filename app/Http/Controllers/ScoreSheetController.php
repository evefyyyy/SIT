<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use File;
use DB;
use Storage;
use App\Model\studentProfile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GroupProject;
use App\Student;
use App\Category;
use App\Type;
use App\Advisor;
use App\ProjectAdvisor;
use App\ProjectStudent;
use App\ProjectProposal;
use App\Proposal;
use App\ProjectDetail;
use App\Picture;
use App\CriteriaMain;
use App\CriteriaSub;
use App\Template;
use App\TemplateMain;
use App\TemplateSub;
use Auth;

class ScoreSheetController extends Controller
{
    public function index()
    {
      return view ('admin.scoreSheet');
    }

    public function createMainCriteria()
    {
      $data['url'] = url('exam/managescore/criteria/main');

      $mainCriteria = DB::table('criteria_mains')->select('criteria_main_name')->get();
      $count = count($mainCriteria);
      $data['count'] = $count;
      for($i=0;$i<$count;$i++){
        $data['mainCriteria'][$i] = $mainCriteria[$i]->criteria_main_name;
      }
      return view ('admin.mainCriteria',$data);
    }

    public function storeMainCriteria(Request $request)
    {
      $main = $request['mainfields'];
      $countMain = count($main);
      if($countMain != 1 && $main[0] != ""){
        $allMainCriteria = DB::table('criteria_mains')->select('id','criteria_main_name')->get();
        $countAllMain = count($allMainCriteria);
        for($i=0;$i<$countAllMain;$i++){
          $id[$i] = $allMainCriteria[$i]->id;
          $getMainName[$i] = $allMainCriteria[$i]->criteria_main_name;
          $obj = CriteriaMain::find($id[$i]);
          if($main[$i] != null){
            $obj->criteria_main_name = $main[$i];
            $obj->save();
          }else{
            $obj->delete();
          }
        }
        for($i = $countAllMain; $i < $countMain; $i++){
          if($main[$i] != null){
            $obj = new CriteriaMain();
            $obj->criteria_main_name = $main[$i];
            $obj->save();
          }
        }
      }
      return redirect(url('exam/managescore/criteria/main/create'));
    }

    public function createSubCriteria()
    {
      $data['url'] = url('exam/managescore/criteria/sub');

      $subCriteria = DB::table('criteria_subs')->select('criteria_sub_name')->get();
      $count = count($subCriteria);
      $data['count'] = $count;
      for($i=0;$i<$count;$i++){
        $data['subCriteria'][$i] = $subCriteria[$i]->criteria_sub_name;
      }
      return view ('admin.subCriteria',$data);
    }

    public function storeSubCriteria(Request $request)
    {
      $sub = $request['subfields'];
      $countSub = count($sub);
      if($countSub != 1 && $sub[0] != ""){
        $allSubCriteria = DB::table('criteria_subs')->select('id','criteria_sub_name')->get();
        $countAllSub = count($allSubCriteria);
        for($i=0;$i<$countAllSub;$i++){
          $id[$i] = $allSubCriteria[$i]->id;
          $getSubName[$i] = $allSubCriteria[$i]->criteria_sub_name;
          $obj = CriteriaSub::find($id[$i]);
          if($sub[$i] != null){
            $obj->criteria_sub_name = $sub[$i];
            $obj->save();
          }else{
            $obj->delete();
          }
        }
        for($i = $countAllSub; $i < $countSub; $i++){
          if($sub[$i] != null){
            $obj = new CriteriaSub();
            $obj->criteria_sub_name = $sub[$i];
            $obj->save();
          }
        }
      }
      return redirect(url('exam/managescore/criteria/sub/create'));
    }

    public function createTemplate()
    {
      $data['mainCriteria'] = CriteriaMain::all();
      $data['subCriteria'] = CriteriaSub::all();
      return view('admin.createTemplate',$data);
    }

    public function storeTemplate(Request $request)
    {
      $temp = DB::table('templates')->get();
      $countTemp = count($temp);
      $obj = new Template();
      $obj->temp_num = $countTemp+1;
      $obj->save();

      $main = $request['mainCriteria'];
      $countMain = count($main);
      $temp = DB::table('templates')->max('id');
      for($i=0;$i<$countMain;$i++){
        $obj = new TemplateMain();
        $obj->round = $i+1;
        $obj->criteria_main_id = $main[$i];
        $obj->template_id = $temp;
        $obj->save();
      }

      $sub = $request['subCriteria'];
      $countSub = count($sub);
      $rows = DB::table('templates_main')->orderBy('id','desc')->take($countMain)->select('id')->get();
      $countRows = count($rows);
      for($r=0;$r<$countRows;$r++){
        $id[$r] = $rows[$r]->id;
        for($i=0;$i<$countSub;$i++){
          $obj = new TemplateSub();
          $obj->template_main_id = $id[$r];
          $obj->criteria_sub_id = $sub[$i];
          $obj->save();
        }
      }
      return redirect(url('exam/managescore/template'));
    }

    public function editTemplate()
    {
      $data['mainCriteria'] = CriteriaMain::all();
      $data['subCriteria'] = CriteriaSub::all();
      return view('admin.editTemplate',$data);
    }

    public function manageTemplate()
    {
      $data['template'] = Template::all();
      $count = count($data['template']);
      $data['tempData'] = array_flatten($data['template']);

      for($i=0;$i<$count;$i++){
        $temp[$i] = $data['template'][$i]->id;

        $main[$i] = DB::table('templates_main')
                ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                ->where('template_id',$temp[$i])->get();
        $data['tempData'][$i]['main'] = $main[$i];

        $sub[$i] = DB::table('templates_sub')
                ->join('templates_main','templates_main.id','=','template_main_id')
                ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                ->where('template_id',$temp[$i])
                ->groupBy('criteria_sub_id')->get();
        $data['tempData'][$i]['sub'] = $sub[$i];
      }

      return view('admin.manageTemplate',$data);
    }

    public function viewScoreSheet()
    {
      $data['type'] = Type::all();
      return view('admin.manageScoreSheet',$data);
    }


}
