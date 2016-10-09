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
}
