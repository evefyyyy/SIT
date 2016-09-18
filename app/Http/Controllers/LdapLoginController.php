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
			return redirect('/showproject');
		}else{
			return view('/');
		}
	}

	public function Login(Request $request){

		// DB::table('users')
		// ->where('name', $request->name)
		// ->update(['password' => bcrypt($request->password)]);

		$username  = $request->name;
		$ldaprdn  = "uid=".$username.",ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th";
		$ldapsta  = "uid=".$username.",ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th";
		$ldappass = $request->password;
		$base="";
		$attributes_ad = array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");
		//$ds = ldap_connect("ldap://10.4.52.17/")
		$ds = ldap_connect("ldap://ldap-pj.sit.kmutt.ac.th/")
		or die("Could not connect to LDAP server.");
		//$test = DB::table('users')->where('name', $username)->first();
		//dd($test);
		//dd($username);


		if ($ds) {
			if (@ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)==0) echo "Failed to set protocol version to 3";
			try{
				$ldapbind = ldap_bind($ds, $ldaprdn, $ldappass);
				// $justthese = array("uid", "cn", "gecos", "mail");
				// $sr=ldap_search($ds, "ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				// $info = ldap_get_entries($ds, $sr);
				$studentid = DB::table('students')->where('student_id', $username)->first()->id;
				if(DB::table('users')->where('name', $username)->first()===null){
					DB::table('users')->insert(
						['name' => $username, 'password' => bcrypt($request->password), 'student_pkid' => $studentid]
						);
				}
				if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
					return redirect()->intended('/home');
				} else {
					return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				}
				//$info = ldap_pull($info[0], 'uid');
				//print_r($info[0]);
			}catch(Exception $e){
				$ldapbind = ldap_bind($ds, $ldapsta, $ldappass);
				$justthese = array("uid", "cn", "gecos", "mail");
				$sr=ldap_search($ds, "ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				$info = ldap_get_entries($ds, $sr);
				dd($info);
				$adv_name = DB::table('students')->where('student_id', $username)->first()->id;
				if(DB::table('users')->where('name', $username)->first()===null){
					DB::table('users')->insert(
						['name' => $username, 'password' => bcrypt($request->password), 'student_pkid' => $studentid]
						);
				}
				if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
					return redirect()->intended('/home');
				} else {
					return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				}
			}catch(Exception $f){
				echo "Incorrect Password or Something when wrong";
			}
			/*$ldapbind = ldap_bind($ds, $ldaprdn, $ldappass);
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
			 return redirect()->intended('/home');

		} else {
			return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
		}
				//$info2 = array_pull($info[0], 'cn');
				//print_r($info[0]);



			}
			*/
			ldap_close($ds);
		}
		// if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
		// 	 return redirect()->intended('/home');

		// } else {
		// 	return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
		// }

	}
	public function getLogout(){
		Auth::logout();
		return redirect('/home');
	}
}
