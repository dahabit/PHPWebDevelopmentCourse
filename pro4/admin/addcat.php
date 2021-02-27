<?php
//TRUNCATE TABLE
include_once("includes/header.php");
?>
<br />
<?php

if(isset($_POST['submit'])) {
	$cat_name=clean_text($_POST['cat_name']);
	$cat_des=nl2br(addslashes($_POST['cat_des']));
	$cat_img=$_POST['cat_img'];
	$cat_active=(int)$_POST['cat_active'];
	
	$q="INSERT INTO cats (cat_name,cat_des,cat_img,cat_active) VALUES
	('".$cat_name."','".$cat_des."','".$cat_img."',".$cat_active.")";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم إضافة القسم بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addcat.php'>";
	}
}else{
	?>

<form action="" id="signupForm" class="jNice cmxform" method="post">
	<h3>أضف قسم جديد</h3>
	<fieldset>
	<p><label for="cat_name">اسم القسم :</label><input id="cat_name" type="text"  class="text-long cat_name" name="cat_name" /></p>
	<p><label for="cat_des">وصف القسم:</label><textarea id="cat_des" name="cat_des" class="cat_des" rows="5" cols="40"></textarea></p>
	<p><label for="cat_img">رابط الصورة :</label><input id="cat_img" type="text"  class="text-long cat_img" name="cat_img" /></p>
	<p><label for="cat_active">حالة التفعيل:</label><label class="label2" for="cat_active">نعم : </label><input id="cat_active" type="radio" name="cat_active" checked="checked" class="required" value="1" />&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="label2" for="noactive">لأ : </label><input id="noactive" type="radio" name="cat_active" value="0" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>أضف القسم</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
	</fieldset>
</form>


	<?php
}
?>




<? include_once("includes/footer.php");?>