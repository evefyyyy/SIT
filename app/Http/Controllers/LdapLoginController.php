<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Http\Requests;

class LdapLoginController extends Controller
{
	public function Login(Request $request){
		$username  = $request->username;
		$ldaprdn  = "uid=".$username.",ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th";
		$ldappass = $request->password;
		$base="";
		$attributes_ad = array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");
		$ldapconn = ldap_connect("ldap://10.4.52.17/")
		or die("Could not connect to LDAP server.");

		if ($ldapconn) {
			if (@ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)==0) echo "Failed to set protocol version to 3";
			try{
				$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			
				echo "LDAP Success";
			}catch(Exception $e){
				echo "Incorrect Password or Something when wrong";
			}

		}
		ldap_close($ldapconn);
	}
}
