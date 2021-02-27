<?php

if (isset($_POST['submit'])) {
	$target = "uploads/";
	$temp_dir = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	try
	{
	   if(!preg_match('/(gif|jpe?g|png)$/i', $file_name) || 
	      !preg_match('/image/i', $file_type) ||
	      $_FILES['file']['size'] > 300000)
	   {
	   	throw new Exception('Not right, buddy!');
	   	exit;
	   }
		move_uploaded_file($temp_dir, $target . $file_name);
		$status = 1;
	}
	
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
				
} // end if isset

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div id="container">

<form enctype="multipart/form-data" action="" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
	<label for="file">Choose a file to upload:</label> 
	
	<input id="file" name="file" type="file" /><br />
	<input type="submit" value="Upload File" name="submit" />
</form>

<?php 
if(isset($status))
	
{
$path = $target . $file_name;
echo "Success. <a href=\"$path\">View your image.</a>";
}

?>

</div><!--end container-->



</body>
</html>