<?php

$da=time();

echo date('D-M-Y h:M:m',$da);

//print_r($da);
if(isset($_POST['submit'])){
	$target="uploads/";
	$temp_dir= $_FILES['file']['tmp_name'];
	$file_name=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];

	try{
		if(!preg_match('/(gif|jpe?g|png)$/i',$file_name))
	 	{
	   	throw new Exception('إمتداد الملف الذي قمت بتحميلة غير مسموح');
	   	exit;
	   }
	   
	if(!preg_match('/image/i', $file_type))
	 	{
	   	throw new Exception('إمتداد الملف الذي قمت');
	   	exit;
	   }
	   
	  if($_FILES['file']['size'] > 3000){
	  	throw new Exception('حجم الملف');
	   	exit;
	  } 
		move_uploaded_file($temp_dir,$target.$file_name);
		$uploaded=TRUE;

	}
	catch(Exception $e){
		echo $e->getMessage();

	}

}else{
	?>
<form enctype="multipart/form-data" action="" method="POST"><input
	type="hidden" name="MAX_FILE_SIZE" value="300000" /> <input id="file"
	name="file" type="file" /><br />
<input type="submit" value="Upload File" name="submit" /></form>
	<?php
}

if(isset($uploaded)){

	echo "تم رفع الملف بنجاح";
}
