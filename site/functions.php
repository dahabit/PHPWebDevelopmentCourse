<?php
header('Content-Type: text/html; charset=utf-8');
function include_files($var){
if(file_exists($var)){
		include_once $var;
		}else{
		include_once 'home.php';	
		}
}