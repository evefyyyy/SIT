<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests;
// use Illuminate\Contracts\Auth\Authenticatable;
use App\User;
use App\Student;
use DB;


class LdapLoginController extends Controller
{
	public function getIndex(){
		if(Auth::check()){
			return redirect('/home');
		}else{
			return view('/home');
		}
	}

	public function Login(Request $request){
		$username  = $request->username;
		$ldaprdn  = "uid=".$username.",ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th";
		$ldappass = $request->password;
		$base="";
		$attributes_ad = array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");
		//$ds = ldap_connect("ldap://10.4.52.17/")
		$ds = ldap_connect("ldap://ldap-pj.sit.kmutt.ac.th/")
		or die("Could not connect to LDAP server.");
		$student = Student::all();
		//$test = DB::table('users')->where('name', $username)->first();
		//dd($test);

		if ($ds) {
			if (@ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)==0) echo "Failed to set protocol version to 3";
			/*try{
				$ldapbind = ldap_bind($ds, $ldaprdn, $ldappass);
				$justthese = array("uid", "cn", "gecos", "mail");
				$sr=ldap_search($ds, "ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				$info = ldap_get_entries($ds, $sr);
				//$info = ldap_pull($info[0], 'uid');
				
				//print_r($info[0]);

				echo "success";
			}catch(Exception $e){
				echo "Incorrect Password or Something when wrong";
			}*/
			$ldapbind = ldap_bind($ds, $ldaprdn, $ldappass);
			if($ldapbind){
				$justthese = array("uid", "cn", "gecos", "mail");
				$sr=ldap_search($ds, "ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				$info = ldap_get_entries($ds, $sr);
				$info = array_pull($info[0], 'uid');
				if(DB::table('users')->where('name', $username)->first()===null){
					DB::table('users')->insert(
						['name' => $username, 'password' => $ldappass, 'student_pkid' => (DB::table('students')->where('student_id', $username)->first())->id]
						);
				} 
				if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
					return redirect('/home');
				} else {
					return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				}
				//$info2 = array_pull($info[0], 'cn');
				//print_r($info[0]);



			}

			ldap_close($ds);
		}
	}
	public function getLogout(){
		Auth::logout();
		return redirect('/');
	}
}