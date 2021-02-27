<?php
   include_once ("includes/header.php");
  ?>

<br><TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	
<?

if(isset($_SESSION['s_id'])){


if (isset($_POST['ss'])){


if ($_SESSION['s_password'] == $_POST['old_pass']){


$new_pass=$_POST['new_pass'];
$new_email=$_POST['email'];
$new_pass=addslashes($new_pass);
$new_email=addslashes($new_email);

$sql = "UPDATE srudents
				    SET 	
					  s_password	  ='".$new_pass."' 
					, s_email 	  ='".$new_email."'  
					
								
								 WHERE s_id =".$_SESSION['s_id'];
								 
			$result = $db->query($sql);



if (!$db->isError()) {
	
	
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم تعديل الباسورد بنجاح';
echo "<br>";


} else {
echo 'حدث خطأ أثناء تغيير الباسورد من فضلك أعد المحاولة';
}
	
	







}
else

{
echo "<div id=error>";
echo "عفوا الباسورد التي أدخلتها غير متطابقة مع الباسورد القديمة من فضلك أعد المحاولة ";
echo "</div>";
}
}
else
{
?>
<?


$sql="SELECT *

FROM

  students
  
  WHERE s_id= '".$_SESSION['s_id']."'";
  
  $result = $db->query($sql);
  $result=$result->fetch();
  extract($result);
  ?>
  
<div align="center">
	<table border="0" width="100%" dir="rtl" cellspacing="10" cellpadding="0">
	<form name="s_login" method="POST" action="<?$PHP_SELF?>" >

		<tr>
			<td width="140" id="cellcatstbl"><span lang="ar-sa">الباسورد الحالية</span></td>
			<td><input type="password" name="old_pass" size="35"></td>
		</tr>
		<tr>
			<td width="140" id="cellcatstbl"><span lang="ar-sa">الباسورد الجديدة</span></td>
			<td><input type="password" name="new_pass" size="35"></td>
		</tr>
		<tr>
			<td width="140" id="cellcatstbl"><span lang="ar-sa">الإيميل</span></td>
			<td><input type="text" name="email" size="35" value="<? echo $s_email ;  ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><span lang="ar-sa">
			
			<input type="submit" value="موافق"  name="ss" >
			
			</span></td>
		</tr>
		</form>
	</table>
</div>



<?

}



$sql="SELECT *

FROM

  students
  
  WHERE s_id= '".$_SESSION['s_id']."'";
  
  $result = $db->query($sql);
	if ($result->size() > 0) {		
	$result=$result->fetch();	
	extract($result);
	
	
	}else
	{
	echo "<div id=error> عفوا هناك خطأ في تسجيل الدخول يرجي الخروج وإعادة تسجيل الدخول مرة أخرى </div>";
	
	}
	}
	else
	{
	echo "<div id=error> عفوا هناك خطأ في تسجيل الدخول يرجي الخروج وإعادة تسجيل الدخول مرة أخرى </div>";
	
	}

  ?>
  
  </td></tr></table>
  <?include_once("includes/footer.php"); ?>