<?php
include_once("includes/header.php");
?>




<br />
<br />
<br />
<br />
<br />
<br />

<?php

if (isset($_POST['submit']))

	{
	$catdesc= clean_text($_POST['catdesc']);
	$name= clean_text($_POST['catname']);
	
	$active=$_POST['active'];
	
	$q="insert into  courses_cat values ('','".$name."','".$active."','".$catdesc."')";
	$result=$db->query($q) or die($db->error);
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم إضافة القسم بنجاح"." رقم القسم-".$db->insert_id;

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

<input type="text" name="catname" size="50" value="">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
وصف القسم
</td>
<td width="500" id="addarticle">
<textarea name="catdesc" >
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
<input type="radio" checked="checked" name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio" name="active" value="0">
</td>
</tr>
<tr>
<td width="500" id="addarticle">

<input type="submit" value="أضف البيانات" name="submit">
</td>
</tr>
</form>
</table>

<?php

}

?>




<br />
<br />
<br />
<br />
<br />
<br />












<? include_once("includes/footer.php");?>