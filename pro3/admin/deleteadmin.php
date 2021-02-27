<?php
include_once("includes/header.php");
?>
<?php
$id=(isset($_GET['id']))?(int)$_GET['id']:0;

if($id==0){
	echo "<h3>المدير الذى تريد حذفه غير موجود</h3>";
}else{
	
	$q="SELECT id FROM admin WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows ==1){
	$q="DELETE FROM admin WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم حذف المدير بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addadmin.php'>";
		
	}else{
	echo "<h3>لم يتم حذف المدير</h3>";
}

	}else{
		echo "<h3>المدير الذى تريد حذفه غير موجود</h3>";
	}
}

?>



<?php include_once("includes/footer.php");?>