<?php error_reporting($_ALL);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>شركة دهب</title>
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
		include_once ("includes/config.php");
		$q="select * from nav ";
		$result=$db->query($q) or die($db->error);
		if($result)
		
		{
		while ($row = $result->fetch_object())
				{
				echo "<li><a href='index.php?id={$row->pageid}' class='selected' title='{$row->title}'>{$row->name}</a></li>";
				}
				
		}
		
		?>
			
		
			
		</ul>
		<form action="#" method="get">
			<p>
				<input type="text" name="q" value="Search..." />
				<input type="submit" value="Go" class="button" />
			</p>
		</form>
	</div>
	<div id="content">
		<div id="page">
	