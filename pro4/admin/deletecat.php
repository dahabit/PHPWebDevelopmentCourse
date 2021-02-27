<?php
include_once("includes/header.php");
?>
<?php
$catid=(isset($_GET['cat']))?(int)$_GET['cat']:0;
if($catid==0){
	echo "<h3>القسم التي تريد حذفه غير موجود</h3>";
}else{
	
	$q="SELECT cat_id FROM cats WHERE cat_id=".$catid;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows ==1){
	$q="DELETE FROM cats WHERE cat_id=".$catid;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم حذف القسم بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addcat.php'>";
		
	}else{
	echo "<h3>لم يتم حذف القسم</h3>";
}

	}else{
		echo "<h3>القسم التي تريد حذفه غير موجود</h3>";
	}
}

?>



<?php include_once("includes/footer.php");?>