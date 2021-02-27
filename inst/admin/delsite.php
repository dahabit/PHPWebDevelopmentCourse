<? include_once("includes/header.php");

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
<table width="500" id="addarticle">
<form  method=post >
<tr>
<td width="50%" id="addarticle">
رقم الموقع  المراد حذفه
</td>
<td id="addarticle">
<input type="text" name="id" size="10">
</td>
</tr>

<tr>

<td width="500" id="addarticle" colspan="2">


<input type="submit" value="إحذف" name="submit">
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
<br>

<?

}

else
{

$id=intval($_POST['id']);

if (isset($id))
{
$sql = "SELECT   *  FROM sites WHERE id=".$id;
$result =$db->query($sql);	
	
if ($result->size() > 0) {
	
	$sql = "DELETE FROM sites where id=".$id;

			$result = $db->query($sql);
			
			echo "<br>";
echo "<br>";
echo "<br>";
	echo "تم حذف الموقع بنجاح";
	echo "<br>";
echo "<br>";
echo "<br>";
}
else
{
	echo "<br>";
echo "<br>";
echo "<br>";
	echo "رقم الموقع الذي أدخلته غير موجود في قاعدة البيانات";
	echo "<br>";
echo "<br>";
echo "<br>";
}				
	
}


}	


?>












<? include_once("includes/footer.php");?>