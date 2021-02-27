<? include_once("includes/header.php");


 ?><br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		

<?
$course_id=intval($_GET['c_id']) ;

	

$sql = "SELECT  courses_cat.c_cat_id, courses_cat.c_cat_name, courses_cat.c_cat_des, courses.c_id, 
  courses.c_cat_id, courses.c_name, courses.c_about, courses.c_time,courses.c_require, 
   courses.c_have, courses.c_targets,courses.c_content,courses.c_place,courses.c_code,courses.c_rems
FROM  courses , courses_cat
WHERE  c_active=1 AND c_id=".$course_id." AND courses_cat.c_cat_id=courses.c_cat_id";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {

?>
	
<div align="right">
	<table border="0" width="100%" dir="rtl" cellspacing="10" cellpadding="0" id="catstbl">
		<tr>
			<td width="30%" height="30" id="cellcatstbl">إسم الدورة</td>
			<td  id="cellcatstbl"><? echo $row['c_name'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">كود الدورة</td>
			<td  id="cellcatstbl"><? echo $row['c_code'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">مدة الدورة</td>
			<td  id="cellcatstbl"><? echo $row['c_time'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">نبذة عن الدورة</td>
			<td  id="cellcatstbl"><? echo nl2br($row['c_about']);?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">متطلبات الدورة</td>
			<td  id="cellcatstbl"><? echo $row['c_require'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">المستفيدون من الدورة</td>
			<td  id="cellcatstbl"><? echo nl2br($row['c_have']);?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">أهداف الدورة</td>
			<td  id="cellcatstbl"><? echo nl2br($row['c_targets']);?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">محتويات الدورة</td>
			<td  id="cellcatstbl"><? echo nl2br($row['c_content']);?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">مكان إنعقاد الدورة</td>
			<td  id="cellcatstbl">
			<? echo $row['c_place'];?>
			</td>
		</tr>
		
		<tr>
			<td width="30%" height="30" id="cellcatstbl">ملاحظات</td>
			<td  id="cellcatstbl"><? echo nl2br($row['c_rems']);?></td>
		</tr>
		
	</table>
</div>
<?

$_SESSION['c_cat_id']=$row['c_cat_id'];

$_SESSION['c_id']=$row['c_id'];



if (isset($_SESSION['s_id']))
{

?>
<br>
<div id="arttitle">
<a href="fill_c.php?id=<?echo $row['c_id'] ;?>" target="_self">

يمكنك التقدم لهذه الدورة من خلال الضغط هنا

</a>
</div>
<?


}
else


{
?>
<br>
<div id="texetall">
لا يمكنك التقدم لهذه الدورة لأحد الأسباب التالية

</div>
<br>
<br>
<div id="texetall">
1- لم تقم بتسجيل الدخول لتسجيل الدخول
</div>
<div id="arttitle">
<a href="student_login.php" target="_self">
إضغط هنا
</a>
</div>

<br>
<br>
<div id="texetall">
2- لم تقم بالتسجيل في الموقع للتسجيل
</div>
<div id="arttitle">
<a href="s_registration.php" target="_self">
إضغط هنا
</a>
</div>


<?


}




?>
<br>
<div id="arttitle">
<a href="javascript: history.go(-1)">للعودة إلي الصفحة السابقة</a>
</div>

<?
}
}
else
{
?>
<br>
<div align="center">
	<table border="0" width="350" cellspacing="0" cellpadding="0" dir="ltr" id="cellnews">
		<tr>
			<td dir="rtl" align="center" id="cellnews">
			
			<div id="error">
			عفوا الدورة التي حددتها غير موجودة
			</div>
			
			</td>
		</tr>
	</table>
</div>
<br>

<?
}
?>
		
</td></tr></table>

<?include_once("includes/footer.php"); ?>