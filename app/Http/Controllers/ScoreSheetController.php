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
use App\Year;
use Auth;

class ScoreSheetController extends Controller
{
    public function index()
    {
      $data['year'] = Year::all();
      return view ('admin.scoreSheet',$data);
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
      $temp = DB::table('templates')->get();
      $data['countTemp'] = count($temp)+1;

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

    public function manageTemplate()
    {
      $data['template'] = Template::all();
      $count = count($data['template']);
      $data['tempData'] = array_flatten($data['template']);

      for($i=0;$i<$count;$i++){
        $temp[$i] = $data['template'][$i]->id;
        $data['id'][$i] = $temp[$i];
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

    public function editTemplate($id)
    {
      $data['url'] = url('exam/managescore/template/'.$id);
      $data['method'] = "put";

      $data['mainCriteria'] = CriteriaMain::all();
      $data['subCriteria'] = CriteriaSub::all();
      $data['tempNum'] = DB::table('templates')->where('id',$id)->value('temp_num');

      $data['main'] = DB::table('templates_main')
              ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
              ->where('template_id',$id)->get();

      $data['sub'] = DB::table('templates_sub')
              ->join('templates_main','templates_main.id','=','template_main_id')
              ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
              ->where('template_id',$id)
              ->groupBy('criteria_sub_id')->get();

      return view('admin.editTemplate',$data);
    }

    public function updateTemplate(Request $request,$id)
    {
      $tempNum = DB::table('templates')->where('id',$id)->value('id');
      $mainId = DB::table('templates_main')
                ->join('templates','templates.id','=','template_id')
                ->where('template_id',$id)
                ->select('templates_main.id')->get();
      $countMainId = count($mainId);
      $main = $request['mainCriteria'];
      $countMain = count($main);
      if($countMain != null){
        if($countMainId == $countMain){
          for($i=0;$i<$countMainId;$i++){
            $id = $mainId[$i]->id;
            $obj = TemplateMain::find($id);
            $obj->round = $i+1;
            $obj->criteria_main_id = $main[$i];
            $obj->save();
          }
        }else{
          if($countMainId < $countMain){
            for($j=0;$j<$countMainId;$j++){
              $id = $mainId[$j]->id;
              $obj = TemplateMain::find($id);
              $obj->round = $j+1;
              $obj->criteria_main_id = $main[$j];
              $obj->save();
            }
            for($i=$countMainId;$i<$countMain;$i++){
              $obj = new TemplateMain();
              $obj->round = $i+1;
              $obj->criteria_main_id = $main[$i];
              $obj->template_id = $tempNum;
              $obj->save();
            }
          }else if($countMainId > $countMain){
            for($j=0;$j<$countMain;$j++){
              $id = $mainId[$j]->id;
              $obj = TemplateMain::find($id);
              $obj->round = $j+1;
              $obj->criteria_main_id = $main[$j];
              $obj->save();
            }
            for($i=$countMain;$i<$countMainId;$i++){
              $id = $mainId[$i]->id;
              $obj = TemplateMain::find($id);
              $obj->delete();
            }
          }
        }
      }

      if($countMain != null){
        $mainIdInput = DB::table('templates_main')->orderBy('id','asc')->take($countMain)->select('id')->get();
        $countMainInput = count($mainIdInput);
      }else{
        $mainIdInput = DB::table('templates_main')
                  ->join('templates','templates.id','=','template_id')
                  ->where('template_id',$id)
                  ->select('templates_main.id')->get();
        $countMainInput = count($mainId);
      }

      $sub = $request['subCriteria'];
      $countSub = count($sub);

      if($countSub != null){
        for ($i=0; $i < $countMainInput ; $i++) {
          $getMainId = $mainIdInput[$i]->id;
          $getSubId = DB::table('templates_sub')->where('template_main_id',$getMainId)->get();
          $countSubId = count($getSubId);
          if($countSub == $countSubId){
            for($j=0; $j<$countSub; $j++){
              for($k=0 ; $k<$countSubId; $k++){
                $subId = $getSubId[$j]->id;
                $obj = TemplateSub::find($subId);
                $obj->criteria_sub_id = $sub[$j];
                $obj->save();
              }
            }
          }else{
            if($countSub > $countSubId){
              for($j=0; $j<$countSubId; $j++){
                $subId = $getSubId[$j]->id;
                $obj = TemplateSub::find($subId);
                $obj->criteria_sub_id = $sub[$j];
                $obj->save();
              }
              for($k=$countSubId; $k<$countSub; $k++){
                $obj = new TemplateSub();
                $obj->template_main_id = $getMainId;
                $obj->criteria_sub_id = $sub[$k];
                $obj->save();
              }
            }else if($countSub < $countSubId){
              for($j=0; $j<$countSub; $j++){
                $subId = $getSubId[$j]->id;
                $obj = TemplateSub::find($subId);
                $obj->criteria_sub_id = $sub[$j];
                $obj->save();
              }
              for($k=$countSub; $k<$countSubId; $k++){
                $subId = $getSubId[$k]->id;
                $obj = TemplateSub::find($subId);
                $obj->delete();
              }
            }
          }
        }
      }

      return redirect(url('exam/managescore/template'));
    }

    public function viewScoreSheet()
    {
      $data['type'] = Type::all();
      $data['template'] = Template::all();
      return view('admin.manageScoreSheet',$data);
    }


}
