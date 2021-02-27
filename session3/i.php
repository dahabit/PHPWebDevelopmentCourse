<?php
$a=15;
$b=8;

if($a > $b &&$a!=10)
{
	echo " a larger than b";
}

echo "<br />";

$c="1";
echo gettype($c);
echo "<br />";
if($c==1){
	
	echo "c equal 1";
}

$d="1ddsd";
if(is_string($d)){	
}
echo 5+$d;