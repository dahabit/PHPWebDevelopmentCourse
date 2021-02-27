<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$cat_name=clean_text($_POST['cat_name']);
	$cat_des=nl2br(addslashes($_POST['cat_des']));
	$cat_img=$_POST['cat_img'];
	$cat_active=(int)$_POST['cat_active'];
	$catid=$_POST['catid'];
$q="UPDATE  cats SET
		cat_name='".$cat_name."',
		cat_des='".$cat_des."',
		cat_img='".$cat_img."',
		cat_active=".$cat_active."
		WHERE cat_id=".$catid;	
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addcat.php'>";
	}else{
		echo "<h3>لم يتم حفظ التعديلات بنجاح</h3>";
	}
}else{
$catid=(isset($_GET['cat']))? (int)$_GET['cat']: 0;	
$q="SELECT *  FROM cats WHERE cat_id=".$catid;
	$reusltcats=$db->query($q) or die($db->error);
if($reusltcats->num_rows==1){
	$rowcat=$reusltcats->fetch_object();
	?>


<form action="" id="signupForm" class="jNice cmxform" method="post">
	<h3>أضف قسم جديد</h3>
	<fieldset>
	<p><label for="cat_name">اسم القسم :</label><input id="cat_name" type="text"  class="text-long cat_name" name="cat_name" value="<?php echo $rowcat->cat_name ;?>" /></p>
	<p><label for="cat_des">وصف القسم:</label><textarea id="cat_des" name="cat_des" class="cat_des" rows="5" cols="40"><?php echo $rowcat->cat_des ;?></textarea></p>
	<p><label for="cat_img">رابط الصورة :</label><input value="<?php echo $rowcat->cat_img ;?>" id="cat_img" type="text"  class="text-long cat_img" name="cat_img" /></p>
	<p><label for="cat_active">حالة التفعيل:</label><label class="label2" for="cat_active">نعم : </label><input id="cat_active" type="radio" name="cat_active" <?php if($rowcat->cat_active==1) {echo "checked='checked'";} ?> class="required" value="1" />&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="label2" for="noactive">لأ : </label><input <?php if($rowcat->cat_active==0) {echo "checked='checked'";} ?> id="noactive" type="radio" name="cat_active" value="0" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>حفظ التعديلات</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
    <input type="hidden" name="catid" value="<?php echo $rowcat->cat_id;?>" />
	</fieldset>
</form>




				<?php
			}else{
				echo "لا يوجد قائمة بهذا الاسم";
			}
}
			?>




			<?php include_once("includes/footer.php");?>