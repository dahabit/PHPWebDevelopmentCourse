<?php
include_once("includes/header.php");
?>
<br />
<?php
if(isset($_POST['submit'])){
	$name=clean_text($_POST['name']);
	$title=clean_text($_POST['title']);
	$link=(int)$_POST['pages'];
	$active=(int)$_POST['active'];
	
	$q="INSERT INTO topmenu (name,title,link,active) VALUES ('".$name."','".$title."',".$link.",".$active.")";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		echo "<br /><br /><br /><br />";
		echo "تم إضافة القائمة بنجاح";
		echo "<br />";
		//echo "رقم القائمة التي قمت بإدخالها هو :",$db->insert_id;
	}
}else{
	?>
<br />
<form action="" method="post">
<table id="addarticle" width="600px">
	<tr>
		<td id="addarticle">الإسم :</td>

		<td id="addarticle"><input type="text" name="name"></td>
	</tr>
	<tr>
		<td id="addarticle">العنوان :</td>

		<td id="addarticle"><input type="text" name="title"></td>
	</tr>

	<tr>
		<td id="addarticle">الصفحة :</td>

		<td id="addarticle"><select name="pages">

			
			<?php
			$q="select id,title from pages where active=1";
			$reuslt=$db->query($q) or die($db->error);
			if($reuslt){
				while($row=$reuslt->fetch_object()){
				?>
				<option value="<?php echo $row->id ;?>"><?php echo $row->title ;?></option>
				<?php 
				}
				
			}else{
			?>
			<option value="">لا يوجد صفحات</option>
			<?php
			}	
				?>
		</select></td>
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