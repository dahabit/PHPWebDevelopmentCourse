<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$title=clean_text($_POST['title']);
	$content=nl2br($_POST['content']);
	$active=(int)$_POST['active'];
	$id=$_POST['id'];
	$q="UPDATE  pages SET
		title='".$title."',
		content='".$content."',
		active=".$active."
		WHERE id=".$id;	
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم التعديل بنجاح";
		echo "<br />";
		
	}
}else{
$id=(isset($_GET['id']))?(int)$_GET['id']:0;	
	$q="SELECT * FROM pages WHERE id=".$id;
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows==1){
		while($row=$reuslt->fetch_object()){
?>
	
<br />
<form action="" method="post">
<table id="addarticle" width="600px">

	<tr>
		<td id="addarticle">العنوان :</td>

		<td id="addarticle"><input type="text" name="title" value="<?php echo $row->title;?> "></td>
	</tr>

	<tr>
		<td id="addarticle">المتحوى :</td>

		<td id="addarticle">
		<textarea name="content" rows="5" cols="20">
		
		<?php echo $row->content;?>
		</textarea>
		</td>
	</tr>
	<tr>
		<td id="addarticle">مفعلة :</td>

		<td id="addarticle">نعم : <input type="radio" name="active" value="1" <?php if($row->active==1) {echo "checked='checked'";} ?> >
		&nbsp;&nbsp;&nbsp;&nbsp; لا: <input type="radio" name="active"
			value="0" <?php if($row->active==0) {echo "checked='checked'";} ?>>
			
			<input type="hidden" name="id" value="<?php echo $row->id;?>">
			</td>
	</tr>
	<tr>
		<td id="addarticle"></td>
		<td id="addarticle"><input type="submit" name="submit"
			value="حفظ التعديلات"></td>
	</tr>


</table>

</form>
<?php 
}
}else{
	echo "الصفحة التي تريدها غير موجودة";
}
?>


	<?php
}
?>

<? include_once("includes/footer.php");?>