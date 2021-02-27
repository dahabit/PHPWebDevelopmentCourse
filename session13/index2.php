<?php 
if(isset($_POST['submit'])){
	foreach ($_FILES as $file):
	//print_r($file);
	if($file['error']==0){
	$target="uploads/";
	$file_name=$file['name'];
	$file_type=$file['type'];
	$tmp_name=$file['tmp_name'];
	
	try{
		
		if(!preg_match('/(gif|jpe?g|png|log)$/i',$file_name)){
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
		move_uploaded_file($tmp_name, $target.$file_name);
		$uploaded=TRUE;
	}catch(Exception $e){
		
		echo $e->getMessage();
	}
	}

	endforeach;
	
	
if(isset($uploaded) && $uploaded===TRUE){
		
		echo "File uploaded !..";
	}
	//print_r($_FILES);
	
}else{

?>

<form enctype="multipart/form-data" action="" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
	<input id="file" name="file" type="file" /><br />
	<input id="file1" name="file1" type="file" /><br />
	<input id="file2" name="file2" type="file" /><br />
	<input type="submit" value="Upload" name="submit" />
</form>

<?php 

}
?>




