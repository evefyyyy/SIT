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
use App\MainTemplate;
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
      $temp = DB::table('templates')->groupBy('template_number')->get();
      $countTemp = count($temp);

      $main = $request['mainCriteria'];
      $countMain = count($main);

      $sub = $request['subCriteria'];
      $countSub = count($sub);

      for($m=0;$m<$countMain;$m++){
        for($s=0;$s<$countSub;$s++){
          $obj = new Template();
          $obj->template_number = $countTemp+1;
          $obj->round = $m+1;
          $obj->criteria_main_id = $main[$m];
          $obj->criteria_sub_id = $sub[$s];
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
      $data['template'] = DB::table('templates')->groupBy('template_number')->get();
      $count = count($data['template']);
      $data['count'] = $count;

      for($i=0;$i<$count;$i++){
        $data['mainCriteria'] = DB::table('templates')
                            ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                            ->select('criteria_main_name')->groupBy('template_number','criteria_main_id')
                            ->having('template_number','=',$i+1)->get();

        $data['subCriteria'] = DB::table('templates')
                              ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                              ->select('criteria_sub_name')->groupBy('template_number','round','criteria_main_id','criteria_sub_id')
                              ->having('template_number','=',$i+1)->get();
      }


                          //
                          // dd($data['subCriteria']);

      return view('admin.manageTemplate',$data);
    }

    public function viewScoreSheet()
    {
      $data['type'] = Type::all();
      return view('admin.manageScoreSheet',$data);
    }


}
