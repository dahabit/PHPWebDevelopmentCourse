
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
$pageid=(isset($_GET['p']))?(int)$_GET['p']:1;
if($pageid==0){
	echo "الصفحة غير موجوده";
}else{
	$q="select * from pages where active=1 AND id={$pageid}";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows==1){
		while($row=$reuslt->fetch_object()){
			echo $row->title;
		}
	}
}
?>
</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="container">
<div id="header">
<h1>شركة دهب للبرمجيات</h1>
<p>معنا البرمجة متعه</p>
</div>
<div id="nav">
<ul>
	<?php
		$q="select * from topmenu where active=1 ORDER BY id ASC";
		$reuslt=$db->query($q) or die($db->error);
		
		while($row=$reuslt->fetch_object()){
		echo "<li><a href='index.php?p={$row->link}' class='selected' title='{$row->title}'>{$row->name}</a>
		</li>";
		}
	?>
	<li><a href="cotactus.php" title='title'>إتصل بنا</a> </li>


</ul>

</div>
<div id="content">
<div id="page">