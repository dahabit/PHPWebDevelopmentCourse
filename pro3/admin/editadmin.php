<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$user=clean_text($_POST['user']);
	$password=md5(md5(md5(md5(clean_text($_POST['password'])))));
	$confirm_password=md5(md5(md5(md5(clean_text($_POST['confirm_password'])))));
	$id=$_POST['id'];


$q="UPDATE admin SET
		name='".$user."',
		password='".$password."'
		WHERE id=".$id;	
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='2; url=addadmin.php'>";
	}else{
		echo "<h3>لم يتم حفظ التعديلات بنجاح</h3>";
	}
}else{
$id=(isset($_GET['id']))?(int)$_GET['id']:0;
	$q="SELECT * FROM admin WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
if($reuslt->num_rows==1){
	$rowadmin=$reuslt->fetch_object();
	?>
<form id="signupForm" action="" class="jNice cmxform" method="post">
	<h3>تعديل بيانات المدير</h3>
	<fieldset>
	<p><label for="user">اسم المستخدم :</label><input id="user" type="text"  class="text-long name" name="user" value="<?php echo $rowadmin->name; ?>" /></p>
	<p><label for="password">كلمة المرور :</label><input id="password" type="password"  class="text-long password" name="password" value="<?php echo $rowadmin->password; ?>" /></p>
	<p><label for="confirm_password">تأكيد كلمة المرور :</label><input id="confirm_password" type="password"  class="text-long confirm_password" name="confirm_password" value="<?php echo $rowadmin->password; ?>" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>حفظ التعديلات</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
    <input type="hidden" name="id" value="<?php echo $rowadmin->id;?>" />
	</fieldset>
</form>


				<?php
			}else{
				echo "<h3>لا يوجد مدير بهذا الاسم</h3>";
			}
}
			?>




			<?php include_once("includes/footer.php");?>