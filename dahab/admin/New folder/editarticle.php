<? include_once("includes/header.php");
?>
<?php
$id=intval($_GET['article_id']) ;
$submit=$_POST['submit'];
if (!isset($submit))
{
	

$sql = "SELECT   *  FROM articles WHERE id=".$id."";
$result =$db->query($sql);	
	
if ($result->size() > 0) {
	while ($row = $result->fetch())
	
								{
		
	
	?>
	<br>
<br>

<div id="addarticle">
<table width="500" id="addarticle">
<form  method="post">
<tr>
<td width="120" id="addarticle">
<b>
عنوان المقالة
</b>
</td>
<td width="500" id="addarticle">

<input type="text" name="arttitle" size="50" value="<?php echo $row['title']; ?>">
</td>
</tr>
<tr>
<td width="100" id="addarticle">
<b>
إسم الصورة
</b>
</td>
<td width="500" id="addarticle">

<input type="text" name="artimg" size="15"  value="<?php echo $row['img']; ?>">
<b>
ضع اسم الصورة فقط مثلexample.gif
&nbsp;
أو إتركها defualt.gif
</b>
</td>
</tr>

<tr>
<td width="100" id="addarticle">

<br><br>

<b>
نبذه مختصرة 
تظهر  في حالة إختيار المقالة ضمن الأقسام التي تظهر  في الصفحة الرئيسية

</b>
</td>
<td width="500" id="addarticle">

<textarea name="artbrief" cols="50" rows="15">
<?php echo $row['brief']; ?>
</textarea>
</td>
</tr>

<tr>
<td width="100" id="addarticle">
<br><br><br><br><br><br><br><br>

<b>
نص المقالة

</b>
</td>
<td width="500" id="addarticle">

<textarea name="artdetails" cols="50" rows="25" >
<?php echo $row['details'];?>
</textarea>
</td>
</tr>

<tr>
<td width="100" id="addarticle">
<b>
إسم الكاتب
</b>
</td>
<td width="500" id="addarticle">

<input type="text" name="artauthor" size="25"  value="<?php echo $row['author']; ?>">
</td>
</tr>

<tr>
<div id="addarticle">
<td width="100" id="addarticle">
<b>
المقالة مفعلة
</b>
</td>
<td width="500" id="addarticle">

نعم: 
<input type="radio" <? if ($row['active']==1) { echo 'checked="checked"' ; } ?> name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio"  <? if ($row['active']==0) { echo 'checked="checked"' ; } ?> name="active" value="0">
</td>
</tr>
</div>
<tr>
<td width="100" id="addarticle">
<b>
القسم 

</b>
</td>

<td width="500" id="addarticle">
<?
$cat_id =$row['cat_id'];
//echo $cat_id ;
?>
<select name="cats_list">
<?php


$sql3= "SELECT  * FROM  cats WHERE cat_id =".$cat_id;
		
			$result3 = $db->query($sql3);
			
			if ($result3->size() > 0) {
			while ($row3 = $result3->fetch()) {
			
			echo "<option value=\"$row3[cat_id]\">$row3[cat_name]</option>\n"; 
$cat_id= $row3[cat_id];
}
}

?>


<?php

$sql5= "SELECT  * FROM  cats WHERE cat_id != ".$cat_id;
		
			$result5 = $db->query($sql5);
			
			if ($result5->size() > 0) {
			while ($row5 = $result5->fetch()) {
			
			echo "<option value=\"$row5[cat_id]\">$row5[cat_name]</option>\n"; 

}
}

?>
</select>

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

</div>



<?
								}
	
				}

}

else
{


$arttitle=$_POST['arttitle'];
$artimg=$_POST['artimg'];
$artbrief=$_POST['artbrief'];
$artdetails=$_POST['artdetails'];
$artauthor=$_POST['artauthor'];
$cats_list=$_POST['cats_list'];
$active=$_POST['active'];

	
$arttitle=addslashes($arttitle);	
$artimg=addslashes($artimg);
$artbrief=addslashes($artbrief);

$html=$artdetails;
html2text($html);
$artdetails=$html;


$artauthor=addslashes($artauthor);
		
$sql = "UPDATE articles
				    SET 
					cat_id		='".$cats_list."' 				
					, title	  	='".$arttitle."' 
					, img 	 	='".$artimg."'  
					, brief     ='".$artbrief."' 
					, details   ='".$artdetails."' 
					, author 	  ='".$artauthor."' 
					, active 	  ='".$active."'	
								
								 WHERE id =".$_POST['idgo'];
			$result = $db->query($sql);
	
if (!$db->isError()) {
	
	
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم تعديل المقالة بنجاح';
echo "<br>";


} else {
echo 'هناك خطأ في ادخال المقالة برجاء العودة للخلف';
}
	
	
}


?>












<? include_once("includes/footer.php");?>