<?php
include_once("includes/header.php");
?>
<?php
$imgid=(isset($_GET['imgid']))?(int)$_GET['imgid']:0;

if($imgid==0){
	echo "<h3>الملف الذى تريد حذفه غير موجود</h3>";
}else{
	
	$q="SELECT imgid FROM upload WHERE imgid=".$imgid;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows ==1){
	$q="DELETE FROM upload WHERE imgid=".$imgid;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم حذف الملف بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=upload.php'>";
		
	}else{
	echo "<h3>لم يتم حذف الملف</h3>";
}

	}else{
		echo "<h3>الملف الذى تريد حذفه غير موجود</h3>";
	}
}

?>



<?php include_once("includes/footer.php");?>