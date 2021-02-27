<?php
include_once("includes/header.php");
?>

<br />
<br />
<br />

<?php

if (isset($_POST['submit']))

	{
	$name= clean_text($_POST['rtmname']);
	$title= clean_text($_POST['rtmtitle']);
	$link=$_REQUEST['pid'];
	
	$q="insert into rightmenu values ('','".$name."','".$title."','".$link."')";
	$res=$db->query($q) or die($db->error);
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم إضافة القائمة بنجاح رقم القائمة الذي تم إدخاله"." -".$db->insert_id;
	
	
	}else
	{
	?>
	
<table width="500" id="addarticle">
<form  name="addrightmenuform" method="post" action="" >
<tr>
<td width="120" id="addarticle">
إسم القائمة
</td>
<td width="500" id="addarticle">

<input type="text" name="rtmname" size="50" value="">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
العنوان
</td>
<td width="500" id="addarticle">
<input type="text" name="rtmtitle" size="50" value="" >
</td>
</tr>
<tr>
<td width="100" id="addarticle">
رابط الصفحة
</td>
<td width="500" id="addarticle">
<select name="pid">
<?php
	$q= "select * from pages where active=1";
	$result=$db->query($q) or die($db->error);
				if($result)
				
					{
							
							while($row=$result->fetch_object())
							{
							?>
<option value="<?php echo $row->id; ?>" > <?php echo $row->name; ?></option> 
							<?php
							}
			
							}else{
							echo "لا توجد صفحات";
							
							}


							?>

</select>
</td>
</tr>
<tr>
<td width="500" id="addarticle">

<input type="submit" value="إحفظ التعديلات" name="submit">
</td>
</tr>
</form>
</table>
			<?php

			}

			?>

<? include_once("includes/footer.php");?>