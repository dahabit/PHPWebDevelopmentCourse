<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once("includes/config.php");
if (isset($_POST['submit']) || !empty($_POST['username']) || !empty($_POST['password']) )
	{
	include_once ('includes/functions.php');
	
		$name= clean_text($_POST['username']);
		
		
		$pass=clean_text($_POST['password']);
	
		
		$q="select * from admin where username='".$name."' and password='".$pass."' ";
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
<input type="password" name="password" id="password">
<br />
<br />
<input type="submit" name="submit" value="Sing In" >
<input type="reset" name="reset" value=" Clear" >



</form>

</div>

<?php

}

?>