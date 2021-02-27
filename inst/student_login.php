<?php
   include_once ("includes/header.php");
  ?>
<?



if (!empty($_POST['stu_name']) || ($_POST['stu_pass'])){
$username=strip_tags($_POST['stu_name']);
$password=strip_tags($_POST['stu_pass']);

$username=htmlspecialchars($username);
$password=htmlspecialchars($password);

$username=addslashes($username);
$password=addslashes($password);

	$sql=" SELECT    `students`.`s_id`,
  `students`.`s_login`,
  `students`.`s_password`,
  `students`.`s_email`,
  `students`.`s_name`
  

  FROM students WHERE s_login =  '".$username."' AND s_password = '".$password."' ";
	
	
	$result = $db->query($sql);
	if ($result->size() > 0) {		
				
	$result=$result->fetch();		
	
	if (is_array($result)){
	
	
	extract($result);
		//print_r ($result) ;
	$_SESSION['s_name']=$s_name;
	$_SESSION['s_id']=$s_id ;
	$_SESSION['s_login']=$username ;
$_SESSION['s_password']=$s_password	;

	
	if (isset($_SESSION['s_name'])){
	if (isset($_POST['from2'])){
	$ser= $_POST['from2'];
	
header("Location: $ser ");
exit;
	}

	}
	
	

}
	}
	
	else{
 


echo "<br>","<br>","<br>","<div align=center id=error>";

		echo ('إسم المتخدم أو كلمة المرور غير صحيحة');

		echo "</div>";
  

  
	}
	




	
	}
	
	if (!isset($_SESSION['s_name'])){
	?>
	
	
<br><TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=8>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">
<br>
<br>
<br>
<div align="center">
<form name="s_login" method="POST" action="<?$PHP_SELF?>" >
<table border="0" >
<tr>
<td>
إسم المستخدم:
</td>
<td> 
<input type="text" name="stu_name" size="30">
</td>
</tr>
<tr>
<td>

كلمة المرور : 

</td>
<td>
<input type="password" name="stu_pass" size="30" >
<input type=hidden name=from2 value="<?echo $_SERVER["HTTP_REFERER"]; ?>">
</td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="موافق"  name="s_login_ok" >
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