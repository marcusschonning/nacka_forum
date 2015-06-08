<?php 
define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS", "");
define ("DB_NAME", "nacka");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->set_charset("utf8");

if($db->connect_errno){
	die("We have some database problems");
}


?>