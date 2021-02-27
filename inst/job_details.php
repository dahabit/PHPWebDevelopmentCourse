<? include_once("includes/header.php");


 ?><br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		

<?
$job_id=intval($_GET['job_id']) ;

	

$sql = "SELECT  jobs_cat.j_cat_id, jobs_cat.j_cat_name, jobs_cat.j_cat_des, jobs.j_id, 
  jobs.j_cat_id, jobs.j_title, jobs.j_details, jobs.j_company, jobs.j_require, 
  jobs.j_exp_require, jobs.j_contract_time, jobs.j_learn_require, jobs.j_salary, 
  jobs.j_add_date, jobs.j_end_date, jobs.j_w_gender, jobs.j_rems, jobs.j_start_date
FROM  jobs , jobs_cat
WHERE  j_active=1 AND j_id=".$job_id." AND jobs_cat.j_cat_id=jobs.j_cat_id";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {

?>
	
<div align="right">
	<table border="0" width="100%" dir="rtl" cellspacing="5" cellpadding="0" id="catstbl">
		<tr>
			<td width="30%" height="30" id="cellcatstbl">إسم الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_title'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">كود الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_code'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">الشركة</td>
			<td  id="cellcatstbl"><? echo $row['j_company'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">تفاصيل الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_details'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">سنوات الخبرة المطلوبة</td>
			<td  id="cellcatstbl"><? echo $row['j_exp_require'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">مدة العقد</td>
			<td  id="cellcatstbl"><? echo $row['j_contract_time'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">الراتب</td>
			<td  id="cellcatstbl"><? echo $row['j_salary'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">المؤهل العلمي المطلوب</td>
			<td  id="cellcatstbl"><? echo $row['j_learn_require'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">نوع الموظف</td>
			<td  id="cellcatstbl"><? 
			
			if ( $row['j_w_gender']=="male")
			{
			echo"ذكر" ;
			}
			
			else
			{
			
			echo "أنثى" ;
			
			}
			
			?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">تاريخ بدء الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_start_date'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">تاريخ إنتهاء الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_end_date'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">تاريخ إضافة الوظيفة</td>
			<td  id="cellcatstbl"><? echo $row['j_add_date'];?></td>
		</tr>
		<tr>
			<td width="30%" height="30" id="cellcatstbl">ملاحظات</td>
			<td  id="cellcatstbl"><? echo $row['j_rems'];?></td>
		</tr>
		
	</table>
</div>
<?

$_SESSION['j_cat_id']=$row['j_cat_id'];

$_SESSION['j_id']=$row['j_id'];



if (isset($_SESSION['w_id']))
{

?>
<br>
<div id="arttitle">
<a href="fill.php?id=<?echo $row['j_id'] ;?>" target="_self">

يمكنك التقدم لهذه الوظيفة من خلال الضغط هنا

</a>
</div>
<?


}
else


{
?>
<br>
<div id="texetall">
لا يمكنك التقدم لهذه الوظيفة لأحد الأسباب التاليه
</div>
<br>
<br>
<div id="texetall">
1- لم تقم بتسجيل الدخول لتسجيل الدخول
</div>
<div id="arttitle">
<a href="worker_login.php" target="_self">
إضغط هنا
</a>
</div>

<br>
<br>
<div id="texetall">
2- لم تقم بالتسجيل في الموقع للتسجيل
</div>
<div id="arttitle">
<a href="w_registration.php" target="_self">
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
			عفوا الوظيفة التي حددتها غير موجوده
			
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