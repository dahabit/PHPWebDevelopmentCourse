<?php
include_once("includes/header.php");
?>
<?php
if (isset($_POST['submit']))

	{
	$name= clean_text($_POST['pagename']);
	$content= $_POST['pagecontent'];
	$active=$_POST['active'];
	$q = "UPDATE pages
				    SET 
					  name		='".$name."' 				
					, content	  	='".$content."' 
					, active 	 	='".$active."'  
					
								
								 WHERE id =".$_POST['pageid'];
	
	$res=$db->query($q) or die($db->error);
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم التعديل بنجاح";
	
	}else
	{
	
	
	$id=(int)$_GET['id'] ;
	$q= "select * from pages where id ={$id}";
	$resultpage=$db->query($q) or die($db->error);
				if($resultpage)
				{
				$rowpage=$resultpage->fetch_object();
				
				}else
				
				{
				
				echo " عفواً  لقد حددت  رقم خاطئ";
				
				}
	?>


<br />
<br />
<br />
<br />
<br />

<table width="700" id="addarticle">
<form  method=post >
<tr>
<td width="100" id="addarticle">
إسم الصفحة
</td>
<td width="600" id="addarticle">

<input type="text" name="pagename" size="50" value="<?php echo $rowpage->name;  ?>">
</td>
</tr>


<tr>
<td width="100" id="addarticle">
محتويات الصفحة
</td>
<td width="500" id="addarticle">

<textarea name="pagecontent" cols="60" rows="20" >
<?php echo $rowpage->content;  ?>
</textarea>
</td>
</tr>
<tr>
<td>
</td>
</tr>
<tr>

<td width="100" id="addarticle">
<b>
الصفحة مفعلة
</b>

</td>
<td width="500" id="addarticle">

نعم: 
<input type="radio" <? if ($rowpage->active==1) { echo 'checked="checked"' ; } ?> name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio"  <? if ($rowpage->active==0) { echo 'checked="checked"' ; } ?> name="active" value="0">
</td>
</tr>
<tr>

<td width="500" id="addarticle">
<input type="hidden" name="pageid" value="<?php echo $rowpage->id ;?>">

<input type="submit" value="حفظ التغيرات" name="submit">
</td>
</tr>





</form>
</table>



<?php

}
?>


























<? include_once("includes/footer.php");?>