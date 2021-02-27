<?php
   include_once ("includes/header.php");
  ?>


<?
if (!empty($_POST['worker_name']) || ($_POST['worker_pass'])){
$username=strip_tags($_POST['worker_name']);
$password=strip_tags($_POST['worker_pass']);

$username=htmlspecialchars($username);
$password=htmlspecialchars($password);

$username=addslashes($username);
$password=addslashes($password);

	$sql=" SELECT    `workers`.`w_id`,
  `workers`.`w_login`,
  `workers`.`w_password`,
  `workers`.`w_email`,
  `workers`.`w_name`
  

  FROM workers WHERE w_login =  '".$username."' AND w_password = '".$password."' ";
	
	
	$result = $db->query($sql);
	if ($result->size() > 0) {		
				
	$result=$result->fetch();		
	
	if (is_array($result)){
	
	
	extract($result);
		
	$_SESSION['w_name']=$w_name;
	$_SESSION['w_id']=$w_id ;
	$_SESSION['w_login']=$username ;
	$_SESSION['w_password']=$w_password	;
	
	
	$ser= $_POST['from'];
	
header("Location: $ser ");
}
	}
	
	else{


echo "<br>","<br>","<br>","<div align=center id=error>";

		echo ('إسم المتخدم أو كلمة المرور غير صحيحة');
		echo "</div>";
  
	}
	




	
	}
	
	?>
	<?
	if (!isset($_SESSION['w_name'])){
	?>
	
<br><TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=8>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">
<br>
<br>
<br>
<div align="center">
<form name="w_login" method="POST" action="<?$PHP_SELF?>" >
<table border="0" >
<tr>
<td>
إسم المستخدم:
</td>
<td> 
<input type="text" name="worker_name" size="30">
</td>
</tr>
<tr>
<td>

كلمة المرور : 

</td>
<td>
<input type="password" name="worker_pass" size="30" >
<input type=hidden name=from value="<?echo $_SERVER["HTTP_REFERER"]; ?>">
</td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="موافق"  name="w_login_ok" >
</td>
</tr>
</table>
</form>
</div>
</td></tr></table>
<?
}
?>
<?include_once("includes/footer.php"); ?>