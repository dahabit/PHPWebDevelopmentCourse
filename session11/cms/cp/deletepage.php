<?php
include_once("includes/header.php");
?>

<?php
$id=(isset($_GET['id']))?(int)$_GET['id']:0;

if($id==0){
	echo "error";
}else{
	
	$q="SELECT id FROM pages WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows ==1){
	$q="DELETE FROM pages WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم حذف الصفحة بنجاح";
		echo "<br />";
		//echo "رقم القائمة التي قمت بإدخالها هو :",$db->insert_id;
	}else{
	echo "لم يتم حذف الصفحة";
}

	}else{
		echo "الصفحة التي تريد حذفها غير موجودة";
	}
}

?>




<?php include_once("includes/footer.php");?>