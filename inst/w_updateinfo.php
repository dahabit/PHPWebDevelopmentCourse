
تحديث المعلومات
<?
$sql="SELECT 
  `workers`.`w_id`,
  `workers`.`w_login`,
  `workers`.`w_password`,
  `workers`.`w_email`,
  `workers`.`w_name`,
  
FROM
  `workers`
  
  WHERE w_id=".$_SESSION['w_id']."";
  
  $result = $db->query($sql);
	if ($result->size() > 0) {		
	$result=$result->fetch();	
	extract($result);
	echo $w_college_country ;
	
	}else
	{
	echo "<div id=error> عفوا هناك خطأ في تسجيل الدخول يرجي الخروج وإعادة تسجيل الدخول مرة أخرى </div>";
	
	}
	

  ?>