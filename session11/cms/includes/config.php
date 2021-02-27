<?php
	$host="localhost";
	$user="demophp_test";
	$password="c#Fh89p75D)}";
	$dbname="demophp_test2";
	$db= new mysqli($host,$user,$password,$dbname)or die('can not conenct') ;
	$db->set_charset("utf8");
?>