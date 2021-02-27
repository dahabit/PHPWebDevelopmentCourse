<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$pro_title=clean_text($_POST['pro_title']);
	$pro_img=clean_text($_POST['pro_img']);
	$pro_details=nl2br(addslashes($_POST['pro_details']));
	$pro_shortdesc=nl2br(addslashes($_POST['pro_shortdesc']));
	$pro_price=clean_text($_POST['pro_price']);
	$pro_date=$_POST['pro_date'];
	$pro_active=(int)$_POST['pro_active'];
	$cats_id=(int)$_POST['cats_id'];
	$pro_id=(int)$_POST['pro_id'];

$q="UPDATE  products SET
		pro_title='".$pro_title."',
		pro_img='".$pro_img."',
		pro_details='".$pro_details."',
		pro_shortdesc='".$pro_shortdesc."',
		pro_price='".$pro_price."',
		pro_date='".$pro_date."',
		pro_active=".$pro_active.",
		cats_id=".$cats_id."
		WHERE pro_id=".$pro_id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addproduct.php'>";
	}else{
		echo "<h3>لم يتم حفظ التعديلات بنجاح</h3>";
	}
}else{
$proid=(isset($_GET['pro']))? (int)$_GET['pro']: 0;	
$q="SELECT *  FROM products WHERE pro_id=".$proid;
	$reusltpro=$db->query($q) or die($db->error);
if($reusltpro->num_rows==1){
	$rowpro=$reusltpro->fetch_object();
	?>



<form action="" id="signupForm" class="jNice cmxform" method="post">
	<h3>تعديل المنتجات</h3>
	<fieldset>
	<p><label for="pro_title">اسم المنتج :</label><input id="pro_title" type="text"  class="text-long pro_title" name="pro_title" value="<?php echo $rowpro->pro_title; ?>" /></p>
	<p><label for="pro_img">رابط صورة للمنتج :</label><input value="<?php echo $rowpro->pro_img; ?>" id="pro_img" type="text"  class="text-long pro_img" name="pro_img" /></p>
	<p><label for="pro_details">وصف للمنتج:</label><textarea id="pro_details" name="pro_details" class="pro_details" rows="5" cols="40"><?php echo $rowpro->pro_details; ?></textarea></p>
	<p><label for="pro_shortdesc">وصف مختصر للمنتج:</label><textarea id="pro_shortdesc" name="pro_shortdesc" class="pro_shortdesc" rows="5" cols="40"><?php echo $rowpro->pro_shortdesc; ?></textarea></p>
	<p><label for="pro_price">سعر المنتج :</label><input value="<?php echo $rowpro->pro_price; ?>" id="pro_price" type="text"  class="text-long pro_price" name="pro_price" /></p>
	<p><label for="cats_id">المنتج مندرج تحت قسم : </label>
    <select id="cats_id" name="cats_id">

			<?php
			$q="select cat_id,cat_name from cats where cat_active=1";
			$reuslt=$db->query($q) or die($db->error);
			if($reuslt){
				while($row=$reuslt->fetch_object()){
				?>
				<option value="<?php echo $row->cat_id ;?>" <?php if($rowpro->cats_id==$row->cat_id) {echo "selected='selected'";}?>><?php echo $row->cat_name ;?></option>
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
	<p><label for="pro_active">حالة التفعيل:</label><label class="label2" for="pro_active">نعم : </label><input id="pro_active" type="radio" name="pro_active" <?php if($rowpro->pro_active==1) {echo "checked='checked'";} ?> class="required" value="1" />&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="label2" for="noactive">لأ : </label><input id="noactive" <?php if($rowpro->pro_active==0) {echo "checked='checked'";} ?> type="radio" name="pro_active" value="0" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>أضف القسم</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
    <input type="hidden" name="pro_date" value="<?php date("d / m - h : i"); ?>" />
    <input type="hidden" name="pro_id" value="<?php echo $rowpro->pro_id;?>" />
	</fieldset>
</form>

				<?php
			}else{
				echo "لا يوجد منتج بهذا الاسم";
			}
}
			?>

<?php include_once("includes/footer.php");?>