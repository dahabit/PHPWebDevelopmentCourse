<?php

if(isset($_POST['submit']) ){
	
	$target="uploads/";
	$file_name=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$img=getimagesize($tmp_name);
	

	try{

		if(!preg_match('/(gif|jpe?g|png)$/i',$file_name)){
			throw new Exception('file extension not allowed');
			exit;
		}

		if(!preg_match('/image/i',$file_type)){
			throw new Exception('file type wrong');
			exit;
		}
		if($_FILES['file']['size']>300000){
			throw new Exception('file is big!');
			exit;
		}

		if(!(int)$img[0] || !(int)$img[1]){
			
			throw new Exception('file is not allowed!');
			exit;
		}else{
			$var=md5(rand(1,10000000));
			move_uploaded_file($tmp_name, $target.$var.$file_name);
			$uploaded=TRUE;	
		}
			
		
		

	}catch(Exception $e){
		echo $e->getMessage();
	}
	if(isset($uploaded) && $uploaded===TRUE){

		echo "File uploaded !..";
	}
}else{

	?>
<div id="content">file allowed is (jpg & jpeg & gif & png)</div>
<form enctype="multipart/form-data" action="" method="post"><input
	type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <input id="file"
	name="file" type="file" /><br />

<input type="submit" value="Upload" name="submit" /></form>

	<?php

}
?>