<?php
include_once("includes/config.php");
		$name= strip_tags($_POST['username']);
		$name= addslashes($name);
		$name= htmlspecialchars($name);
		
		
		$pass=strip_tags($_POST['password']);
		$pass=addslashes($pass);
		$pass=htmlspecialchars($pass);
		
		
		$q="select * from users where name='".$name."' and pass='".$pass."' ";
		$result=$db->query($q) or die($db->error);
		if ($result->num_rows ==1)
			{
			header("Location: main.php");
			}else{
			header("Location: login.php");
			}
?>