<?php 
error_reporting(E_ALL);
include_once("includes/header.php");
include_once("includes/config.php");?>

<?php
$menuid=$_GET['id'];
$q= "select * from rightmenu where id={$menuid}";
$result=$db->query($q) or die($db->error);
		if ($result->num_rows ==1)
		{
		$q= "delete  from rightmenu where id={$menuid}";
		$result=$db->query($q)or die($db->error);
		echo "<br /><br /><br /><br /><br /><br /><br /><br /> ";
		echo " تم الحذف بنجاح";

		}else{
		echo "<br /><br /><br /><br /><br /><br /><br /><br /> ";
		echo "الرقم الذي أدخلته غير صحيح برجاء المحاولة مرة أخرى";
		
		}

	
	
	
	?>
	
	
	
	
	
	
	
	

<?php include_once("includes/footer.php");?>