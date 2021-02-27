<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once("includes/config.php");
if (isset($_POST['submit']) || !empty($_POST['username']) || !empty($_POST['password']) )
	{
		$name= strip_tags($_POST['username']);
		$name= addslashes($name);
		$name= htmlspecialchars($name);
		
		
		$pass=strip_tags($_POST['password']);
		$pass=addslashes($pass);
		$pass=htmlspecialchars($pass);
		
		
		
		
		$q="select * from admin where name='".$name."' and password='".$pass."' ";
		$result=$db->query($q) or die($db->error);
				if ($result->num_rows ==1)
					{
						$_SESSION['login'] ='1';
						header("Location: index.php");
						}else{
						
						header("Location: login.php");
					}
		
		
	}else{
?>
<br />
<br />
<div align="center">
<form method="POST" action="">
<input type="text" name="username" id="username">
<br />
<br />
<br />
<input type="text" name="password" id="password">
<br />
<br />
<input type="submit" name="submit" value="Sing In" >
<input type="reset" name="reset" value=" Clear" >



</form>

</div>

<?php

}

?>