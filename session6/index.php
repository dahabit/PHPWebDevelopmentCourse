<?php
/*
echo "Hello";
echo "<br />";
//sleep(10);
//die('this is the End');
exit;
echo "ahmed";
*/
//$name='';
function sayhello($name){
	$var2="Welcome {$name}!";
	echo trim($var2);
}

$name='ahmed       ';
sayhello($name);
echo "<br />";
sayhello('Ali   ');

echo "<br />";
function salam($name){
	echo "Al Salam Alikom {$name}";
}

salam('Ibrahim');
