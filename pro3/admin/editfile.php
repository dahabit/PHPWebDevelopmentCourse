<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$url = $_POST['url'];
	$alt = clean_text($_POST['alt']);
	$imgid=$_POST['imgid'];


$q="UPDATE upload SET
		url='".$url."',
		alt='".$alt."'
		WHERE imgid=".$imgid;	
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=upload.php'>";
	}else{
		echo "<h3>لم يتم حفظ التعديلات بنجاح</h3>";
	}
}else{
$imgid=(isset($_GET['imgid']))?(int)$_GET['imgid']:0;
	$q="SELECT * FROM upload WHERE imgid=".$imgid;
	$reuslt=$db->query($q) or die($db->error);
if($reuslt->num_rows==1){
	$row=$reuslt->fetch_object();
	?>
<form id="signupForm" action="" class="jNice cmxform" method="post">
	<h3>تعديل بيانات الصورة</h3>
	<fieldset>
	<p><label for="url">رابط الصورة :</label><input id="url" type="text"  class="text-long" name="url" value="<?php echo $row->url; ?>" /></p>
	<p><label for="alt">عنوان الصورة :</label><input id="alt" type="text"  class="text-long alt" name="alt" value="<?php echo $row->alt; ?>" /></p>

    <button class="" type="submit" name="submit" value=""><span><span>حفظ التعديلات</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
    <input type="hidden" name="imgid" value="<?php echo $row->imgid;?>" />
	</fieldset>
</form>


				<?php
			}else{
				echo "<h3>لا يوجد مدير بهذا الاسم</h3>";
			}
}
			?>




			<?php include_once("includes/footer.php");?>