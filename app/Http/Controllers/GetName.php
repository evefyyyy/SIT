<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class GetName extends Controller
{
    public function getNameStudent(){
    	$ds = $ds = ldap_connect("ldap://10.4.51.15")
        or die("Could not connect to LDAP server.");
        // $std = array();
    	if($ds){
    		for($i = 56130500001; $i<=56130500300; $i++){
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
            $success = 'sucess';
    	} else {
            echo "Fail";
        }
        return view('getname', compact('success'));
    }
    public function getNameAdvisor(){
        $ds = $ds = ldap_connect("ldap://10.4.51.15")
        or die("Could not connect to LDAP server.");
        if($ds){
            $i ='ekapong';
            $sr = ldap_search($ds, "ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$i);
            $info = ldap_get_entries($ds, $sr);
            $getname = array_pull($info[0], 'cn');
            dd($getname);

            ldap_close($ds);
        }
    }
}
