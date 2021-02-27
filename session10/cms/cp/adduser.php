<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])){
	$user=clean_text($_POST['user']);
	$password=md5(clean_text($_POST['password']));
	$password2=md5(clean_text($_POST['password2']));
	
	if($password != $password2){
		echo "wrong password";
	}else{
	$q="INSERT INTO admin (name,password) VALUES ('".$user."','".$password."')";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم إضافة المستخدم  بنجاح";
		echo "<br />";
		
	}
	}
}else{
	?>
<br />
<form action="" method="post">
<table id="addarticle" width="600px">

	<tr>
		<td id="addarticle">اسم المستخدم :</td>

		<td id="addarticle">
		<input type="text" name="user"></td>
	</tr>

	<tr>
		<td id="addarticle">كلمة المرور :</td>

		<td id="addarticle">
		<input type="password" name="password">
		</td>
	</tr>
	<tr>
		<td id="addarticle"> تأكيد كلمة المرور :</td>

		<td id="addarticle">
		<input type="password" name="password2">
		</td>
	</tr>
	<tr>
		<td id="addarticle"></td>
		<td id="addarticle"><input type="submit" name="submit"
			value="أضف المستخدم"></td>
	</tr>


</table>

</form>



	<?php
}
?>




<? include_once("includes/footer.php");?>