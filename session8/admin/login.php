<?php
session_start();
include_once 'includes/config.php';
include_once 'includes/functions.php';
if(isset($_POST['submit'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		
		$user=clean_text($_POST['username']);
		$pass=clean_text($_POST['password']);

		$q="select id from users where name='".$user."' and password='".$pass." ' ";
		$r=$db->query($q);
		if($r->num_rows==1){
			$_SESSION['login']='1';
			header("Location: index.php");
			exit;
		}else{
			header("Location: login.php");
			exit;
		}

	}else{
		//echo "empty username or password";
		header("Location: login.php");
		//
		exit;
	}




	//echo "logedin";
}else{

	?>
<br />
<br />
<br />
<br />
<br />
<div align="center">
<form action="" method="post">Username: <input type="text"
	name="username"> <br />
Password: <input type="text" name="password"> <br />

<input type="submit" name="submit" value="login"></form>

</div>
	<?php
}
?>

