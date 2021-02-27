<? include_once("includes/header.php");
 include_once("functions.php")
?>
<?php

$submit=$_POST['submit'];
if (!isset($submit))
{
	?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="500"  CELLPADDING=5 CELLSPACING=5>
<form  method=post >
<tr>
<td width="120" id="addarticle">
إسم الموقع 
</td>
<td width="500" id="addarticle">

<input type="text" name="sitename" size="50">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
وصف الموقع 
</td>
<td width="500" id="addarticle">

<textarea name="sitebrief" cols=50 rows=5>

</textarea>
</td>
</tr>

<tr>
<td width="120" id="addarticle">
عنوان الموقع 
</td>
<td width="500" id="addarticle">

<input type="text" name="sitelink" size="50">
</td>
</tr>
<tr>

<td width="500" id="addarticle">


<input type="submit" value="أضف الموقع " name="submit">
</td>
</tr>





</form>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?

}

else
{
	
$sitename=$_POST['sitename'];
$sitbrief=$_POST['sitebrief'];
$sitlink =$_POST['sitelink'];


$sitename=addslashes($sitename);	
$sitbrief=addslashes($sitbrief);




$sql = "INSERT INTO sites
			  (name,about,link) 
			  		VALUES
			  		 ('$sitename','$sitbrief','$sitlink') ";
			
					 $result = $db->query($sql);
	
if (!$db->isError()) {
	
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم إضافة الموقع بنجاح';
echo "<br>";
echo 'رقم الموقع الذي تم ادخاله ' . $result->insertID();
} else {
echo 'هناك خطأ في ادخال الموقع برجاء العودة للخلف';
}
	
	
}


?>












<? include_once("includes/footer.php");?>