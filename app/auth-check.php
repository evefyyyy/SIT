<?php

// using ldap bind
$username  = $_POST['uid'];
$ldaprdn  = "uid=".$username.",ou=People,ou=st,dc=sit,dc=kmutt,dc=ac,dc=th";
// ldap rdn or dn
$ldappass = $_POST['password'];  // associated password

// connect to ldap server
$ldapconn = ldap_connect("ldap://ldap-pj.sit.kmutt.ac.th/")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {
    // check protocol version 3
    if (@ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3)==0) echo "Failed to set protocol version to 3";
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }

}
// close ldap connection
ldap_close($ldapconn);

?>

