<? include_once("includes/header.php");
 include_once("functions.php")
?>
<?php
$id=intval($_GET['book_id']) ;
$submit=$_POST['submit'];
if (!isset($submit))
{
	

$sql = "SELECT   *  FROM books WHERE id=".$id;
$result =$db->query($sql);	
	
if ($result->size() > 0) {
	while ($row = $result->fetch())
	
								{
		
	
	?>
	<br>
<br>

<table width="500" id="addarticle">
<form  method=post >
<tr>
<td width="120" id="addarticle">
عنوان الكتاب
</td>
<td width="500" id="addarticle">

<input type="text" name="btitle" size="50" value="<?php echo $row['title']; ?>">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
إسم الصورة
</td>
<td width="500" id="addarticle">

<input type="text" name="bimg" size="15" value="<?php echo $row['img']; ?>">
ضع اسم الصورة فقط مثلexample.gif
</td>
</tr>

<tr>
<td width="100" id="addarticle">
نبذه مختصرة
</td>
<td width="500" id="addarticle">

<textarea name="bbrief" cols=50 rows=5>
<?php echo $row['brief']; ?>
</textarea>
</td>
</tr>

<tr>
<td width="100" id="addarticle">
نص الكتاب
</td>
<td width="500" id="addarticle">

<textarea name=bdetails cols=50 rows=10 >
<?php echo $row['details']; ?>
</textarea>
</td>
</tr>

<tr>
<td width="100" id="addarticle">
إسم الكاتب
</td>
<td width="500" id="addarticle">



<input type="text" name="bauthor" size="25" value="<?php echo $row['author']; ?>" >
</td>
</tr>
<tr>
<td width="100" id="addarticle">
لنك التحميل
</td>
<td width="500" id="addarticle">



<input type="text" name="bdownlink" size="25" value="<?php echo $row['downlink']; ?>">
</td>
</tr>
<tr>

<td width="500" id="addarticle">

<input type="hidden" name="idgo" value="<?php echo $row['id']?>">

<input type="submit" value="إحفظ التعديلات" name="submit">
</td>
</tr>





</form>
</table>



<?
								}
	
				}

}

else
{
$btitle=$_POST['btitle'];
$bimg=$_POST['bimg'];
$bbrief=$_POST['bbrief'];
$bdetails=$_POST['bdetails'];
$bauthor=$_POST['bauthor'];
$bdownlink=$_POST['bdownlink'];

	
$btitle=addslashes($btitle);	
$bimg=addslashes($bimg);
$bbrief=addslashes($bbrief);

$html=$bdetails;
html2text($html);
$bdetails=$html;


$bauthor=addslashes($bauthor);


//$sql = "UPDATE articles SET articles  (title,img,brief,details,author) VALUES ('$arttitle','$artimg','$artbrief','$artdetails','$artauthor')   ";

$sql = "UPDATE books
				    SET 	
					  title	  	  	 ='".$btitle."' 
					, img 	 		 ='".$bimg."'  
					, brief    		 ='".$bbrief."' 
					, details  		 ='".$bdetails."' 
					, author 		 ='".$bauthor."' 	
					, downlink 		 ='".$bdownlink."' 			
					
								 WHERE id =".$_POST['idgo'];
								 
			$result = $db->query($sql);
	
if (!$db->isError()) {
	
	
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم تعديل الكتاب بنجاح';
echo "<br>";


} 

else
	{
	
echo 'هناك خطأ في ادخال الكتاب برجاء العودة للخلف';
}
	
	
}


?>












<? include_once("includes/footer.php");?>