<?php session_start(); ?>
<?php
error_reporting(E_ALL);
include_once ("includes/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<title>دهب للتعليم والتدريب</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
</head>
<body>
<div id="wrap">
<div id="header">
<h1><a href="#">دهب للتعليم والتدريب</a></h1>
<h2>معانا مش هتقدر تغمض عنيك - وهنعلمك الي محدش علمهولك</h2>
<h3></h3>
</div>

<div id="top"> </div>
<div id="contentt">
<div id="headermenu"> 
<div class="headerm">
<ul>
<li><a href="index.php">الرئيسية</a></li> 
<li><a href="#">نبذه عنا</a></li> 
<li><a href="#">خدماتنا</a></li> 
<li><a href="courses_cats.php">الدورات التدريبية</a></li>
<li><a href="#">إتصل بنا</a></li> 

</ul>
</div>
</div>

<div class="left">
<h2>أقسام الدورات</h2>
<ul>

<?php


$q= "select * from courses_cat where c_cat_active='1'";
	$result=$db->query($q) or die($db->error);
	if($result)
	
				{
					while($r=$result->fetch_object())
					
						{
						echo "<li><a href='view_courses.php?cat_id={$r->c_cat_id}' class='selected' title='{$r->c_cat_des}'>{$r->c_cat_name}</a></li>";
					
						}
				}
	
	?>




</ul>

<h2>آخر الدورات المضافة </h2>
<ul>

<?php


$q= "select * from courses where c_active='1' order by c_id desc LIMIT 3";
	$result=$db->query($q) or die($db->error);
	if($result)
	
				{
					while($r=$result->fetch_object())
					
						{
						
						echo "<li><a href='course_detials.php?course_id={$r->c_id}' class='selected'>{$r->c_name}</a></li>";
					
						}
				}
	
	?>


</ul>

<br />
<?php
if (isset($_SESSION['log']))

{
echo "<h2>لوحة التحكم</h2>";
echo "مرحباً بك يا"."<br />";
echo $_SESSION['name'];
echo "<br />";
//echo "<a href="logout.php" > تسجيل الخروج </a>";
echo "<form method='POST' action='logout.php'>";
echo "<input type='submit' name='submit' value='تسجيل الخروج'>";
echo "</form>";

		}else{
?>
<h2>تسجيل الدخول</h2>
<div align="center" dir="rtl">
<form action="login.php" method="POST">
<label for="username"> إسم المستخدم </label>
<input type="text" name="username" id="username" >
<br />
<label for="password"> كلمة المرور </label>
<input type="password" name="password" id="password" >
<br />
<input type="submit" name="submit" value="تسجيل الدخول">

</form>
</div>

		<?php

		}
		?>
</div>

<div class="middle">