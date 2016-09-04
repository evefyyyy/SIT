<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LdapTestController extends Controller
{
    public function ldapTest(){
   		$ldapconn = ldap_connect("ldap://10.4.52.17/");
   		$dn        = 'ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th';
     	$justthese = array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");


     	$sr = ldap_search($ldapconn, $dn, $justthese);

     var_dump(ldap_count_entries($ds, $sr));
     return view('ldaptest', $sr);
    }
}
