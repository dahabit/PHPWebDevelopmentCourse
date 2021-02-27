<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$title=clean_text($_POST['title']);
	$content=clean_text($_POST['content']);
	$active=(int)$_POST['active'];
	
	//print_r($_POST);
	//die();
	$q="INSERT INTO pages (title,content,active) VALUES ('".$title."','".$content."',".$active.")";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم إضافة الصفحة بنجاح";
		echo "<br />";
		//echo "رقم القائمة التي قمت بإدخالها هو :",$db->insert_id;
	}
}else{
	?>
<br />
<form action="" method="post">
<table id="addarticle" width="600px">

	<tr>
		<td id="addarticle">العنوان :</td>

		<td id="addarticle"><input type="text" name="title"></td>
	</tr>

	<tr>
		<td id="addarticle">المتحوى :</td>

		<td id="addarticle">
		<textarea name="content" rows="10" cols="30">
		
		
		</textarea>
		</td>
	</tr>
	<tr>
		<td id="addarticle">مفعلة :</td>

		<td id="addarticle">نعم : <input type="radio" name="active" value="1">
		&nbsp;&nbsp;&nbsp;&nbsp; لا: <input type="radio" name="active"
			value="0"></td>
	</tr>
	<tr>
		<td id="addarticle"></td>
		<td id="addarticle"><input type="submit" name="submit"
			value="أضف القائمة"></td>
	</tr>


</table>

</form>



	<?php
}
?>




<? include_once("includes/footer.php");?>