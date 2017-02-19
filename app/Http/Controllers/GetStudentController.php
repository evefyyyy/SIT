<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetStudentController extends Controller
{
    public function index(){

    	return view('admin.setStudent');
    }

    public function getStudentName(Request $request){
    	$firstnum = $request->firstnum;
    	$lastnum = $request->lastnum;
    	$ds = $ds = ldap_connect("ldap://10.4.51.15")
        or die("Could not connect to LDAP server.");
        // $std = array();
    	if($ds){
    		for($i = $firstnum; $i<=$lastnum; $i++){
    			$sr = ldap_search($ds, "ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$i);
    			$info = ldap_get_entries($ds, $sr);
    			if(isset($info[0]['cn'])){
                $getname = array_pull($info[0], 'cn');
    				DB::table('students')->insert(
                        ['student_id' => $i."", 'student_name' => $getname[0], 'user_type_id' => 3]
                        );
    			}
    		}
            ldap_close($ds);
          
    	} else {
            echo "Fail";
        }
        return Redirect::back()->with('message','Operation Successful !');
    }
}
