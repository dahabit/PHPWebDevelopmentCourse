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
<table width="500" CELLPADDING=5 CELLSPACING=5>
<form  method=post >
<tr>
<td width="120" id="addarticle">
إسم الصورة 
</td>
<td width="500" id="addarticle" align="left">

<input type="text" name="photoname" size="60">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
وصف مختصر للصورة
</td>
<td width="500" id="addarticle">

<textarea name="des" cols=40 rows=8>

</textarea>
</td>
</tr>

<tr>

<td width="500" id="addarticle">


<input type="submit" value="أضف الصورة" name="submit">
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
	
$photoname=$_POST['photoname'];

$des =$_POST['des'];


$photoname=addslashes($photoname);	
$des=addslashes($des);




$sql = "INSERT INTO photo
			  (img,des) 
			  		VALUES
			  		 ('$photoname','$des') ";
			
					 $result = $db->query($sql);
	
if (!$db->isError()) {
	
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'Photo Add Success';
echo "<br>";
echo 'Photo Number is ' . $result->insertID();
} else {
echo 'Error Please Click Back';
}
	
	
}


?>


<? include_once("includes/footer.php");?>