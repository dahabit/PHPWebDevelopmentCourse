<?php 
error_reporting(E_ALL);
include_once("includes/header.php");
include_once("includes/config.php");?>

<?php
$catid=(int)$_GET['cat_id'];

$q= "select * from courses_cat where c_cat_id={$catid}";
$result=$db->query($q) or die($db->error);
		if ($result->num_rows ==1)
		{
		$q= "delete  from courses_cat where c_cat_id={$catid}";
		$result=$db->query($q)or die($db->error);
		echo "<br /><br /><br /><br /><br /><br /><br /><br /> ";
		echo " تم الحذف بنجاح";

		}else{
		echo "<br /><br /><br /><br /><br /><br /><br /><br /> ";
		echo "الرقم الذي أدخلته غير صحيح برجاء المحاولة مرة أخرى";
		
		}

	
	
	
	?>
	
	
	
	
	
	
	
	

<?php include_once("includes/footer.php");?>