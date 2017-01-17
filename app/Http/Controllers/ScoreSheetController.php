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
use App\MainScore;
use App\SubScore;
use Auth;

class ScoreSheetController extends Controller
{
    public function index()
    {
      $data['year'] = DB::table('years')->orderBy('year','desc')->get();
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
      // $obj->save();

      $main = $request['mainCriteria'];
      dd($main);
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
      for($i=0; $i<$count; $i++){
        $temp[$i] = $data['template'][$i]->id;

      }
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
        $editButton = DB::table('main_templates_score')
                              ->join('templates_main','templates_main.id','=','template_main_id')
                              ->where('template_id',$temp[$i])->value('template_id');
        $data['tempData'][$i]['button'] = $editButton;
      }
      // dd($data['tempData']);

      return view('admin.manageTemplate',$data);
    }

    public function editTemplate($id)
    {
      $data['url'] = url('exam/managescore/template/'.$id);
      $data['method'] = "put";

      $data['mainCriteria'] = CriteriaMain::all();
      $data['subCriteria'] = CriteriaSub::all();
      $data['tempNum'] = DB::table('templates')->where('id',$id)->value('temp_num');

      $data['mainId'] = DB::table('templates_main')
                        ->join('templates','templates.id','=','template_id')
                        ->where('template_id',$id)
                        ->select('criteria_main_id')->get();
      $data['subId'] = DB::table('templates_sub')
                      ->join('templates_main','templates_main.id','=','template_main_id')
                      ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                      ->where('template_id',$id)
                      ->groupBy('criteria_sub_id')
                      ->select('criteria_sub_id')->get();

      return view('admin.editTemplate',$data);
    }

    public function updateTemplate(Request $request,$id)
    {
      $tempNum = DB::table('templates')->where('id',$id)->value('id');
      $mainId = DB::table('templates_main')
                ->join('templates','templates.id','=','template_id')
                ->where('template_id',$tempNum)
                ->select('templates_main.id')->get();
      $countMainId = count($mainId);

      $main = $request['mainCriteria'];
      $countMain = count($main);

      if($countMain != null){
        if($countMainId == $countMain){
          for($i=0;$i<$countMainId;$i++){
            $getid = $mainId[$i]->id;
            $obj = TemplateMain::find($getid);
            $obj->round = $i+1;
            $obj->criteria_main_id = $main[$i];
            $obj->save();
          }
        }else{
          if($countMainId < $countMain){
            for($j=0;$j<$countMainId;$j++){
              $getid = $mainId[$j]->id;
              $obj = TemplateMain::find($getid);
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
              $getid = $mainId[$j]->id;
              $obj = TemplateMain::find($getid);
              $obj->round = $j+1;
              $obj->criteria_main_id = $main[$j];
              $obj->save();
            }
            for($i=$countMain;$i<$countMainId;$i++){
              $getid = $mainId[$i]->id;
              $delSub = DB::table('templates_sub')
                        ->where('template_main_id',$getid)
                        ->get();
              $countDelSub = count($delSub);
              for($j=0; $j<$countDelSub; $j++){
                $delSubId = $delSub[$j]->id;
                $obj = TemplateSub::find($delSubId);
                $obj->delete();
              }
              $obj = TemplateMain::find($getid);
              $obj->delete();
            }
          }
        }
      }

      if($countMain != null){
        $mainIdInput = DB::table('templates_main')->where('template_id',$tempNum)->orderBy('id','asc')->take($countMain)->select('id')->get();
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

    public function viewScoreSheet($id){
      $data['typeName'] = DB::table('types')->where('type_name','!=','others')->get();
      $data['types'] = DB::table('types')->where('type_name','!=','others')->get();
      $types = $data['types'];
      $year = DB::table('years')->where('year',$id)->value('id');
      $data['year'] = $id;

      for($i=0; $i<count($data['types']); $i++){
        $typeId = $data['types'][$i]->id;
        $data['types'][$i] = DB::table('main_templates_score')
                            ->join('templates_main','templates_main.id','=','template_main_id')
                            ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                            ->where('type_id',$typeId)
                            ->where('year_id',$year)
                            ->select('main_templates_score.id','round','criteria_main_name','template_main_id','score','type_id')
                            ->get();
        for ($j=0; $j <count($data['types'][$i]) ; $j++) {
          $mainScoreId = $data['types'][$i][$j]->id;
          $subScore = DB::table('sub_templates_score')
                      ->join('main_templates_score','main_templates_score.id','=','main_template_score_id')
                      ->join('templates_sub','templates_sub.id','=','template_sub_id')
                      ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
                      ->where('main_template_score_id',$mainScoreId)
                      ->select('criteria_sub_name','sub_templates_score.score')
                      ->get();
          $data['types'][$i][$j]->subScore =  $subScore;
        }
      }
// check button create or edit
      $useTypes = DB::table('main_templates_score')->where('year_id',$year)->select('type_id')->groupBy('type_id')->get();
      if($useTypes != null){
        foreach($useTypes as $use){
          $useType[] = $use->type_id;
        }
        $allTypes = DB::table('types')->where('type_name','!=','others')->get();
        foreach($allTypes as $all){
          $allType[] = $all->id;
        }
        $buttons = array_diff($allType,$useType);
        if($buttons != null){
          foreach($buttons as $but){
            $data['button'][] = $but;
          }
        }else{
          $data['button'][] = 0;
        }
      }else{
        $allTypes = DB::table('types')->where('type_name','!=','others')->get();
        foreach($allTypes as $all){
          $data['button'][] = $all->id;
        }
      }
      // dd($data['button']);

      return view('admin.viewScoreSheet',$data);
    }
    public function editMainScore($year,$id)
    {
      $data['url'] = url('exam/managescore/'.$year.'/'.'mainscore/'.$id);
      $data['method'] = 'put';
      $data['year'] = $year;
      $data['id'] = $id;
      $data['template'] = Template::all();
      $data['type'] = DB::table('types')->where('id',$id)->value('type_name');

      $countTemp = count($data['template']);
      for($i=0; $i<$countTemp; $i++){
        $id = $data['template'][$i]->id;
        $main = DB::table('templates_main')
                ->join('templates','templates.id','=','template_id')
                ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                ->where('template_id',$id)
                ->select('criteria_main_name','round','templates_main.id')->get();
        $data['template'][$i]['main'] = $main;
        $mainScore = DB::table('templates_main')
                      ->join('main_templates_score','template_main_id','=','templates_main.id')
                      ->where('template_id',$id)
                      ->get();
        $data['template'][$i]['score'] = $mainScore;
        $data['template'][$i]['count'] = $i;
      }
      return view('admin.manageScoreSheet',$data);
    }

    public function updateMainScore(Request $request,$year,$id)
    {
      $type = $id;
      $temp = $request['selectTemp'];
      $mainScore = $request['mainScore'];
      $filter = array_filter($mainScore,function($a){
        return $a != null;
      });
      $score = [];
      foreach ($filter as $key) {
        array_push($score,$key);
      }

      $yearId = DB::table('years')->where('year',$year)->value('id');

      $main = DB::table('templates_main')
              ->join('templates','templates.id','=','template_id')
              ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
              ->where('template_id',$temp)
              ->select('templates_main.id','criteria_main_id','template_id')
              ->get();
      $countMain = count($main);

      for($i=0; $i<$countMain; $i++){
        $mainId = $main[$i]->id;
        $mainTemp = DB::table('main_templates_score')
                    ->where('template_main_id',$mainId)
                    ->where('type_id',$type)
                    ->where('year_id',$yearId)
                    ->get();
        if($mainTemp == null){
          $obj = new MainScore();
          $obj->score = $score[$i];
          $obj->template_main_id = $mainId;
          $obj->year_id = $yearId;
          $obj->type_id = $type;
          $obj->save();
      }else{
          for($j=0; $j<count($mainTemp); $j++){
            $mainScoreId = $mainTemp[$j]->id;
            $obj = MainScore::find($mainScoreId);
            $obj->score = $mainScore[$i];
            $obj->save();
          }
        }
      }
      $checkTemp = DB::table('main_templates_score')
                  ->join('templates_main','templates_main.id','=','template_main_id')
                  ->where('type_id',$type)
                  ->where('template_id','!=',$temp)
                  ->where('year_id',$yearId)
                  ->select('main_templates_score.id')
                  ->get();
      for($i=0; $i<count($checkTemp); $i++){
        $getMainId[$i] = $checkTemp[$i]->id;
        $subScore = DB::table('sub_templates_score')->where('main_template_score_id',$getMainId[$i])->get();
        for($j=0; $j<count($subScore); $j++){
          $subScoreId[$j] = $subScore[$j]->id;
          $obj = SubScore::find($subScoreId[$j]);
          $obj->delete();
        }
        $obj = MainScore::find($getMainId[$i]);
        $obj->delete();
      }

      return redirect(url('exam/managescore/'.$year.'/'.'subscore/'.$id));
    }

    public function editSubScore($year,$id)
    {
      $data['url'] = url('exam/managescore/'.$year.'/'.'subscore/'.$id);
      $data['method'] = 'put';
      $data['type'] = $id;
      $data['year'] = $year;
      $yearId = DB::table('years')->where('year',$year)->value('id');
      $data['tempNum'] = DB::table('main_templates_score')
                          ->join('templates_main','templates_main.id','=','template_main_id')
                          ->join('templates','templates.id','=','template_id')
                          ->where('type_id',$id)
                          ->where('year_id',$yearId)
                          ->value('temp_num');

      $data['selectTemp'] = MainScore::where('type_id',$id)
                            ->where('year_id',$yearId)
                            ->get();

      for($i=0; $i<count($data['selectTemp']); $i++){
        $mainId[$i] = $data['selectTemp'][$i]->template_main_id;
        $main = DB::table('templates_main')
                ->join('criteria_mains','criteria_mains.id','=','criteria_main_id')
                ->where('templates_main.id',$mainId[$i])
                ->select('round','criteria_main_name','template_id','templates_main.id')->get();
        $data['selectTemp'][$i]['main']=$main;
        $sub = DB::table('templates_sub')
              ->join('criteria_subs','criteria_subs.id','=','criteria_sub_id')
              ->join('templates_main','templates_main.id','=','template_main_id')
              ->where('template_main_id',$mainId[$i])
              ->select('criteria_sub_name')->get();
        $data['selectTemp'][$i]['sub']=$sub;
        $data['selectTemp'][$i]['count'] = $i;
      }
      return view('admin.manageScoreSheet2',$data);
    }

    public function updateSubScore(Request $request,$year,$id)
    {
      $subScore = $request['subScore'];
      $type = $id;
      $yearId = DB::table('years')->where('year',$year)->value('id');

      $main = DB::table('templates_main')
              ->join('main_templates_score','template_main_id','=','templates_main.id')
              ->where('type_id',$id)
              ->where('year_id',$yearId)
              ->select('templates_main.id')->get();
      for($i=0; $i<count($main); $i++){
        $mainId[$i] = $main[$i]->id;
        $sub[$i] = DB::table('templates_sub')
                    ->join('main_templates_score','main_templates_score.template_main_id','=','templates_sub.template_main_id')
                    ->where('templates_sub.template_main_id',$mainId[$i])
                    ->where('type_id',$id)
                    ->where('year_id',$yearId)
                    ->select('templates_sub.id','main_templates_score.id AS main_score_id')
                    ->get();
      }
      $flatten = array_flatten($sub);
      for($i=0; $i<count($flatten); $i++){
        $mainScoreId = $flatten[$i]->main_score_id;
        $subId = $flatten[$i]->id;
        $score = DB::table('sub_templates_score')
                  ->where('main_template_score_id',$mainScoreId)
                  ->where('template_sub_id',$subId)
                  ->get();
        if($score == null){
          $obj = new SubScore();
          $obj->score = $subScore[$i];
          $obj->main_template_score_id = $flatten[$i]->main_score_id;
          $obj->template_sub_id = $flatten[$i]->id;
          $obj->save();
        }else{
          $scoreId = $score[0]->id;
          $obj = SubScore::find($scoreId);
          $obj->score = $subScore[$i];
          $obj->save();
        }
      }
      return redirect(url('exam/managescore/'.$year));
    }
}
