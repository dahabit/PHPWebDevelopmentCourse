<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

function include_files($var){
if(file_exists($var)){
		include_once $var;
		}else{
		include_once 'home.php';	
		}
}

function isValidEmail($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}