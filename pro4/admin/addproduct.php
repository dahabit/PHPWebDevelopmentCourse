<?php
//TRUNCATE TABLE
include_once("includes/header.php");
?>
<br />
<?php
// pro_id pro_title pro_img pro_details pro_shortdesc pro_price pro_active pro_date pro_viewnum

if(isset($_POST['submit'])) {
	$pro_title=clean_text($_POST['pro_title']);
	$pro_img=clean_text($_POST['pro_img']);
	$pro_details=nl2br(addslashes($_POST['pro_details']));
	$pro_shortdesc=nl2br(addslashes($_POST['pro_shortdesc']));
	$pro_price=clean_text($_POST['pro_price']);
	$pro_date=$_POST['pro_date'];
	$pro_active=(int)$_POST['pro_active'];
	$cats_id=(int)$_POST['cats_id'];
	
	$q="INSERT INTO products (cats_id,pro_title,pro_img,pro_details,pro_shortdesc,pro_price,pro_active,pro_date) VALUES
	('".$cats_id."','".$pro_title."','".$pro_img."','".$pro_details."','".$pro_shortdesc."','".$pro_price."',".$pro_active.",'".$pro_date."')";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم إضافة المنتج بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addproduct.php'>";
	}
}else{
	?>

<form action="" id="signupForm" class="jNice cmxform" method="post">
	<h3>أضف منتج جديد</h3>
	<fieldset>
	<p><label for="pro_title">اسم المنتج :</label><input id="pro_title" type="text"  class="text-long pro_title" name="pro_title" /></p>
	<p><label for="pro_img">رابط صورة للمنتج :</label><input id="pro_img" type="text"  class="text-long pro_img" name="pro_img" /></p>
	<p><label for="pro_details">وصف للمنتج:</label><textarea id="pro_details" name="pro_details" class="pro_details" rows="5" cols="40"></textarea></p>
	<p><label for="pro_shortdesc">وصف مختصر للمنتج:</label><textarea id="pro_shortdesc" name="pro_shortdesc" class="pro_shortdesc" rows="5" cols="40"></textarea></p>
	<p><label for="pro_price">سعر المنتج :</label><input id="pro_price" type="text"  class="text-long pro_price" name="pro_price" /></p>
	<p><label for="cats_id">المنتج مندرج تحت قسم : </label>
    <select id="cats_id" name="cats_id">

			<?php
			$q="select cat_id,cat_name from cats where cat_active=1";
			$reuslt=$db->query($q) or die($db->error);
			if($reuslt){
				while($row=$reuslt->fetch_object()){
				?>
				<option value="<?php echo $row->cat_id ;?>"><?php echo $row->cat_name ;?></option>
				<?php 
				}
				
			}else{
			?>
			<option value="">لا يوجد اقسام حاليا</option>
			<?php
			}	
				?>
		</select>
    </p>
	<p><label for="pro_active">حالة التفعيل:</label><label class="label2" for="pro_active">نعم : </label><input id="pro_active" type="radio" name="pro_active" checked="checked" class="required" value="1" />&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="label2" for="noactive">لأ : </label><input id="noactive" type="radio" name="pro_active" value="0" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>أضف القسم</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
    <input type="text" name="pro_date" value="2010-12-23 10:20:30" />
	</fieldset>
</form>


	<?php
}
?>




<? include_once("includes/footer.php");?>