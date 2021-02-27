<?php
//TRUNCATE TABLE
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])){
	$user=clean_text($_POST['user']);
	$password=md5(md5(md5(md5(clean_text($_POST['password'])))));
	$confirm_password=md5(md5(md5(md5(clean_text($_POST['confirm_password'])))));
	
	if($password != $confirm_password){
		echo "wrong password";
	}else{
	$q="INSERT INTO admin (name,password) VALUES ('".$user."','".$password."')";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم إضافة المستخدم بنجاح";
		echo "<br />";
		echo "
		<meta http-equiv='Refresh' content='2; url=addadmin.php'>";
		echo "رقم المستخدم التي قمت بإدخاله هو :",$db->insert_id;
	}
	}
}else{
	?>
<form action="" id="signupForm" class="jNice cmxform" method="post">
	<h3>أضف مدير جديد</h3>
	<fieldset>
	<p><label for="user">اسم المستخدم :</label><input id="user" type="text"  class="text-long user" name="user" /></p>
	<p><label for="password">كلمة المرور :</label><input id="password" type="password"  class="text-long password" name="password" /></p>
	<p><label for="confirm_password">تأكيد كلمة المرور :</label><input id="confirm_password" type="password"  class="text-long confirm_password" name="confirm_password" /></p>
    <button class="" type="submit" name="submit" value=""><span><span>أضف المستخدم</span></span></button>
    <button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>
	</fieldset>
</form>


	<?php
}
?>




<? include_once("includes/footer.php");?>