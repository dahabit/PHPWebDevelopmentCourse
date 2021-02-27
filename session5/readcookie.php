<?php
error_reporting(E_ALL);
setcookie('id','my is amr',time()- (60*60*24*7*12));
$var=$_COOKIE['id'];
echo $var;	

