<?php
include_once("includes/header.php");
?>

<?php

$id=(int)$_GET['cat_id'] ;

$q= "select * from  courses_cat where 	c_cat_id={$id}";
	$resultcat=$db->query($q) or die($db->error);
				if($resultcat)
				{
				$rowcat=$resultcat->fetch_object();
				
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
	
	$name= clean_text($_POST['catname']);
	$catdesc= clean_text($_POST['catdesc']);
	//$catid=$_POST['catid'];
	$active=$_POST['active'];
	$q = "UPDATE courses_cat
				    SET 
					  c_cat_name		='".$name."' 				
					, c_cat_active	  	='".$active."' 
					, c_cat_des 	 	='".$catdesc."'  
					
								
								 WHERE c_cat_id =".$_POST['catid'];
	
	$res=$db->query($q) or die($db->error);
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم تعديل القسم بنجاح";
	
	
	}else
	{
	?>
	<table width="500" id="addarticle">
<form  name="addcatform" method="POST" action="" >
<tr>
<td width="120" id="addarticle">
إسم القسم
</td>
<td width="500" id="addarticle">

<input type="text" name="catname" size="50" value="<?php echo $rowcat->c_cat_name;?>">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
وصف القسم
</td>
<td width="500" id="addarticle">
<textarea name="catdesc" >

<?php echo $rowcat->c_cat_des;?>
</textarea>

</td>
</tr>
<tr>

<td width="100" id="addarticle">
<b>
القسم مفعل
</b>

</td>
<td width="500" id="addarticle">

نعم: 
<input type="radio" <?php if($rowcat->c_cat_active =='1') echo "checked=\"checked\"";?> name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio" name="active" <?php if($rowcat->c_cat_active =='0') echo "checked=\"checked\"";?> value="0">
</td>
</tr>
<tr>
<td width="500" id="addarticle">
<input type="hidden" name="catid" value="<?php echo $rowcat->c_cat_id;?>">
<input type="submit" value="حفظ التعديلات" name="submit">
</td>
</tr>
</form>
</table>

<?php

}

?>




















<? include_once("includes/footer.php");?>