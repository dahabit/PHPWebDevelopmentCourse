<? include_once("includes/header.php");
 include_once("functions.php")
?>
<?php
$id=intval($_GET['site_id']) ;
$submit=$_POST['submit'];
if (!isset($submit))
{
	

$sql = "SELECT   *  FROM sites WHERE id=".$id;
$result =$db->query($sql);	
	
if ($result->size() > 0) {
	while ($row = $result->fetch())
	
								{
		
	
	?>
	
<br>
<br>
<table width="500" CELLPADDING=5 CELLSPACING=5>
<form  method=post >
<tr>
<td width="120" id="addarticle">
إسم الموقع 
</td>
<td width="500" id="addarticle">

<input type="text" name="sitename" size="50" value="<?php echo $row['name']; ?>">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
وصف الموقع 
</td>
<td width="500" id="addarticle">

<textarea name="sitebrief" cols=50 rows=5>
<?php echo $row['about']; ?>
</textarea>
</td>
</tr>

<tr>
<td width="120" id="addarticle">
عنوان الموقع 
</td>
<td width="500" id="addarticle">

<input type="text" name="sitelink" size="50" value="<?php echo $row['link']; ?>">
</td>
</tr>
<tr>

<td width="500" id="addarticle">


<input type="hidden" name="idgo" value="<?php echo $row['id']?>" >

<input type="submit" value="إحفظ التعديلات" name="submit">


</td>
</tr>





</form>
</table>
<br>
<br>
<br>
<br>









<?
								}
	
				}

}

else
{
$sitename=$_POST['sitename'];
$sitebrief=$_POST['sitebrief'];
$sitelink =$_POST['sitelink'];


$sitename=addslashes($sitename);	
$sitebrief=addslashes($sitebrief);






$sql = "UPDATE sites
				    SET 	
					  name	  	  	 ='".$sitename."' 
					, about 	 		 ='".$sitebrief."'  
					, link    		 ='".$sitelink."' 
										
								 WHERE id =".$_POST['idgo'];
								 
			$result = $db->query($sql);
	
if (!$db->isError()) {
	
	
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم تعديل الموقع بنجاح';
echo "<br>";


} 

else
	{
	
echo 'هناك خطأ في تعديل الموقع برجاء العودة للخلف';
}
	
	
}


?>












<? include_once("includes/footer.php");?>