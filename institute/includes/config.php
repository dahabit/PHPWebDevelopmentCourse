<?php
	$host="localhost";
	$user="root";
	$password="";
	$dbname="learn";
	$db= new mysqli($host,$user,$password,$dbname)or die('can not conenct') ;
	$db->set_charset("utf8");
?>