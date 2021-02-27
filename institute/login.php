<?php error_reporting(E_ALL);
include_once("header.php");
include_once ("includes/config.php"); 
include_once ('includes/functions.php');

 ?>
 <?php
 
 if (isset($_POST['submit']) || !empty($_POST['username']) || !empty($_POST['password']) )
	{
	
		$name= clean_text($_POST['username']);
		
		
		$pass=clean_text($_POST['password']);
	
		
		$q="select * from students where s_login='".$name."' and s_password='".$pass."' ";
		$result=$db->query($q) or die($db->error);
				if ($result->num_rows ==1)
					{
						$row=$result->fetch_object();
						$_SESSION['login'] =$name;
						$_SESSION['name'] =$row->s_name;
						$_SESSION['log'] ='1';
						$_SESSION['id'] =$row->s_id;
						
						//echo "welcome".$name;
						//header("Location: index.php");
						echo "<pre>";
						print_r($_SESSION);
						
						echo "</pre>";
						}else{
						
						echo "لم يتم العثور على اسم المستخدم";
					}
		
		
	}else{
?>
<br />
<br />
<div align="right" dir="rtl">
<form action="login.php" method="POST">
<label for="username"> إسم المستخدم </label>
<input type="text" name="username" id="username" >
<br />
<label for="password"> كلمة المرور </label>
<input type="password" name="password" id="password" >
<br />
<input type="submit" name="submit" value="تسجيل الدخول">

</form>
</div>

<?php

}

?>
 
 
 
 
 
 
 <?php include_once("footer.php");?>