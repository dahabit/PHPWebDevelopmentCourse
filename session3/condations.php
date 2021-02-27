<?php

$b="home";

switch ($b){
	case 'home':
		echo "this is home page";
	break;
	case 6:
		echo "b equal 6";
		break;
	default:
		echo "dd";
}

function kareem($d=''){
	if($d==''){
		echo "please enter text";
	}
	echo str_ireplace("ahmed", "**", $d);
	
	 
}
$b="my name is ahmed";
kareem();


$c=10;
function asd($c){
	global $c;
	$c=20;
}
asd($c);
echo $c;






