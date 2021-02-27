<?php
$var=array(1,4,5,6);
$var2="ahmed mohamed mahmoud";
$var3="ahmed,mohamed,mahmoud";

echo gettype($var3);
echo $var3;
echo '<br />';
//echo implode('  ', $var);
$var3=explode(',', $var3);
echo gettype($var3);
echo '<br />';
print_r($var3);
