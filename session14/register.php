<?php
session_start();
include_once ("includes/config.php");
if(isset($_SESSION['log']) && isset($_SESSION['name']) && isset($_SESSION['id'])){
	
	$user_id=$_SESSION['id'];
	$course_id=$_POST['course_id'];
	
	$q="insert into  courses_fill (c_id,s_id)  values ('".$course_id."','".$user_id."')";
	$result=$db->query($q) or die($db->error);
	if($result){
		echo "تم التسجيل في الكورس بنجاح";
		
		//$to="ahmed@dahabit.com";
		//mail($to, $subject, $message);
	}
	
}

