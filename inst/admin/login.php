<?php
   require_once ("lib/mysql.php");
   require_once ("conn.php");
?>

<html dir="rtl">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="copyright" content="Developed and Designed By ahmed abu_eldahab Copyright &copy; dahabit@gmail.com development" />

<title>معهد الجبيل الثقافي</title>

</head>



<body  LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 >
<?
if (isset($_POST['submit'])){

$username=strip_tags($_POST['username']);
$password=strip_tags($_POST['password']);

$username=htmlspecialchars($username);
$password=htmlspecialchars($password);

$username=addslashes($username);
$password=addslashes($password);

	$sql=" SELECT  *  FROM admin WHERE username =  '".$username."' AND password = '".$password."' ";
	
	
	$result = $db->query($sql);
			
				
	$result=$result->fetch();		
	
	if (is_array($result)){
		
$ses=md5(microtime());
		setcookie('ses',$ses);
header ("Location: index.php");


	}else{


echo "<br>","<br>","<br>","<div align=center>";

		echo ('إسم المتخدم أو كلمة المرور غير صحيحة');
  
		echo "</div>";
  
	}
	
}

?>
<br>
<br>
<br>
<br>
<br>
<div align="center">
<form name="login" method="POST">
<table border="1" style="border-style: dotted; 	border-color:Navy;">
<tr>
<td>
username :
</td>
<td> 
<input type="text" name="username" >
</td>
</tr>
<tr>
<td>

password : 

</td>
<td>
<input type="password" name="password" >
</td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="submit"  name="submit" >
</td>
</tr>
</table>
</form>
</div>
</body>
</html>