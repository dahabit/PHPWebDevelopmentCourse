<?php
include_once("includes/header.php");
?>
<?php
if (isset($_POST['submit']))

	{
	$name= clean_text($_POST['pagename']);
	$content= $_POST['pagecontent'];
	$active=$_POST['active'];
	$q="insert into pages values ('','".$name."','".$content."','".$active."')";
	$res=$db->query($q) or die($db->error);
	if ($res){
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "تم إضافة الصفحة بنجاح رقم الصفحة الذي أضفتها هو  " .$db->insert_id;
			}
	}else
	{
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

<input type="text" name="pagename" size="50">
</td>
</tr>


<tr>
<td width="100" id="addarticle">
محتويات الصفحة
</td>
<td width="500" id="addarticle">

<textarea name="pagecontent" cols="60" rows="20" >

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
<input type="radio" checked="checked" name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio" name="active" value="0">
</td>
</tr>
<tr>

<td width="500" id="addarticle">


<input type="submit" value="أضف الصفحة" name="submit">
</td>
</tr>





</form>
</table>



<?php

}
?>







<? include_once("includes/footer.php");?>