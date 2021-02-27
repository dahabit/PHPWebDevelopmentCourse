<?php
include_once("includes/header.php");
?>

<br>
<br>
<?php

$id=(int)$_GET['id'] ;
$q= "select * from rightmenu where id ={$id}";
	$resultmenu=$db->query($q) or die($db->error);
				if($resultmenu)
				{
				$rowmenu=$resultmenu->fetch_object();
				
				}else
				
				{
				
				echo " عفواً  لقد حددت  رقم خاطئ";
				
				}
				
				
?>
<br />
<br />
<br />

<?php
if (isset($_POST['submit']))

	{
	$name= clean_text($_POST['rtmname']);
	$title= clean_text($_POST['rtmtitle']);
	$link=$_POST['pagesid_list'];
	
	$q = "UPDATE rightmenu
				    SET 
					  name		='".$name."' 				
					, title	  	='".$title."' 
					, link 	 	='".$link."'  
					
								
								 WHERE id =".$_POST['rtmenuid'];
	
	$res=$db->query($q) or die($db->error);
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم تعديل القائمة بنجاح";
	}else
	{
	?>
	
<table width="500" id="addarticle">
<form  method=post >
<tr>
<td width="120" id="addarticle">
إسم القائمة
</td>
<td width="500" id="addarticle">

<input type="text" name="rtmname" size="50" value="<?php echo $rowmenu->name; ?>">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
العنوان
</td>
<td width="500" id="addarticle">
<input type="text" name="rtmtitle" size="25" value="<?php echo $rowmenu->title; ?>" >
</td>
</tr>
<tr>
<td width="100" id="addarticle">
رابط الصفحة
</td>
<td width="500" id="addarticle">
<select name="pagesid_list">
<?php
	$q= "select * from pages where active=1";
	$result=$db->query($q) or die($db->error);
				if($result)
				
					{
							
							while($row=$result->fetch_object())
							{
							?>
							<option value="<?php echo $row->id; ?>" <?php if($row->id==$rowmenu->id) echo "selected='selected'"; ?> > <?php echo $row->name; ?></option> 
							<?php
							}
			
					}


?>

</select>
</td>
</tr>
<tr>
<td width="500" id="addarticle">

<input type="hidden" name="rtmenuid" value="<?php echo $rowmenu->id ;?>">

<input type="submit" value="إحفظ التعديلات" name="submit">
</td>
</tr>
</form>
</table>
<?php

}

?>

<? include_once("includes/footer.php");?>