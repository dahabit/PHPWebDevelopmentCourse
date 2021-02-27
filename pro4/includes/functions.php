<?php
function clean_text($text='') {
	$text=trim($text);
	$text=strip_tags($text);
	$text=addslashes($text);
	$text=htmlspecialchars($text);	
	return $text;
}

$q="SELECT * FROM main_setting";
$reuslt=$db->query($q) or die($db->error);
$rowsetting=$reuslt->fetch_object();

$sname = $rowsetting->sname;
$surl = $rowsetting->surl;
$smail = $rowsetting->smail;
$sdesc = $rowsetting->sdesc;
$stags = $rowsetting->stags;
$sclose = $rowsetting->sclose;
$stextclose = stripcslashes($rowsetting->stextclose);

if ($sclose == 1) {
	die("
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>الموقع مغلق - ".$sname."</title>
</head>

<body>
<center>".$stextclose."</center>

</body>
</html>
");
}
?>