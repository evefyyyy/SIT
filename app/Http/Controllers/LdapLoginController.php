<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests;
// use Illuminate\Contracts\Auth\Authenticatable;
use App\User;
use App\Student;
use App\UserStudent;
use DB;
use App\Http\Requests\LoginRequest;


class LdapLoginController extends Controller
{
	public function getIndex(){
		if(Auth::check()){
			return redirect('/showproject');
		}else{
			return view('auth.login');
		}
	}

	public function Login(LoginRequest $request){

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

			$ldapbindstudent = @ldap_bind($ds, $ldaprdn, $ldappass);
			$ldapbindstaff = @ldap_bind($ds, $ldapsta, $ldappass);
			if($ldapbindstudent){
				// $justthese = array("uid", "cn", "gecos", "mail");
				// $srstu=ldap_search($ds, "ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				// $srsta=ldap_search($ds, "ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				// $info = ldap_get_entries($ds, $sr);
				// $info = array_pull($info[0], 'dn');
				// $firststu = ldap_first_entry($ds, $srstu);
				// $firststa = ldap_first_entry($ds, $srsta);
				// $datastu = ldap_get_dn($ds, $firststu);
				// $checkstu = str_is('*ou=st*', $datastu);
				$studentid = DB::table('students')->where('student_id', $username)->first()->id;
				if(DB::table('users')->where('name', $username)->first()===null){
					DB::table('users')->insert(
						['name' => $username, 'password' => bcrypt($request->password), 'user_type_id' => 3]
						);
					$user_id = DB::table('users')->where('name', $username)->first()->id;
					DB::table('user_student')->insert(
						['student_pkid' => $studentid, 'user_id' => $user_id]
						);
				}
				if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
					return redirect()->intended('/home');
				} else {
					return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				}
			} else if($ldapbindstaff){
				$justthese = array("uid", "cn", "gecos", "mail");
				$sr=ldap_search($ds, "ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				$info = ldap_get_entries($ds, $sr);
				$info = array_pull($info[0], 'cn');
				$adv_profile = DB::table('advisors')->where('advisor_name', $info[0])->first();
				$staff_profile = DB::table('staff')->where('name', $info[0])->first();
				if(DB::table('users')->where('name', $username)->first()===null){
					if($adv_profile != null){
						$checkadv = DB::table('advisors')->where('advisor_name', $adv_profile->advisor_name)->first();
					} else if($staff_profile != null){
						$checkstaff = DB::table('staff')->where('name', $staff_profile->name)->first();
					}
					if($checkadv != null){
						DB::table('users')->insert(
							['name' => $username, 'password' => bcrypt($request->password), 'user_type_id' => 1]
							);
						$user_id = DB::table('users')->where('name', $username)->first()->id;
						DB::table('user_advisor')->insert(
							['advisor_id' => $adv_profile->id, 'user_id' => $user_id]
							);
					} else if($checkstaff != null){
						DB::table('users')->insert(
							['name' => $username, 'password' => bcrypt($request->password), 'user_type_id' => 2]
							);
						$user_id = DB::table('users')->where('name', $username)->first()->id;
						DB::table('user_advisor')->insert(
							['staff_id' => $staff_profile->id, 'user_id' => $user_id]
							);
					} else {
						dd('fail');
					}
				}
				if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
					return redirect()->intended('/home');
				} else {
					return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				}
			} else {
				return redirect('/relogin')->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
			}
			ldap_close($ds);
				//if(auth()->guard('admins')->attempt(['admin_username' => $username, 'admin_password' => $ldappass]))
				//$info = ldap_pull($info[0], 'uid');
				//print_r($info[0]);
			// }catch(Exception $e){
				// $ldapbind = ldap_bind($ds, $ldapsta, $ldappass);
				// $justthese = array("uid", "cn", "gecos", "mail");
				// $sr=ldap_search($ds, "ou=People,ou=staff,dc=sit,dc=kmutt,dc=ac,dc=th", "uid=".$username."",$justthese);
				// $info = ldap_get_entries($ds, $sr);
				// dd($info);
				// $adv_name = DB::table('students')->where('student_id', $username)->first()->id;
				// if(DB::table('users')->where('name', $username)->first()===null){
				// 	DB::table('users')->insert(
				// 		['name' => $username, 'password' => bcrypt($request->password), 'student_pkid' => $studentid]
				// 		);
				// }
				// if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
				// 	return redirect()->intended('/home');
				// } else {
				// 	return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
				// }
		// if(Auth::attempt(['name' => $username, 'password' => $ldappass])){
		// 	 return redirect()->intended('/home');

		// } else {
		// 	return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
		// }

		}
	}
	public function getLogout(){
		Auth::logout();
		return redirect('/');
	}
}
