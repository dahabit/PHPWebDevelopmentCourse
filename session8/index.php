<?php
include_once 'includes/config.php';
include_once 'includes/header.php';
include_once 'includes/functions.php';

$q="select * from gbook where active=1";
$reuslt=$db->query($q);

while($row=$reuslt->fetch_object()){
?>
<table dir="rtl" border="2" width="80%">
<tr>
<td>
الإسم
</td>
<td>
<?php echo clean_text($row->name);?>
</td>
</tr>
<tr>
<td>
الإيميل
</td>
<td>
<?php echo clean_text($row->email);?>
</td>
</tr>
<tr>
<td>
التعليق
</td>
<td>
<?php echo clean_text($row->message);?>
</td>
</tr>

</table>


<br /><br />
<?php
}
?>

<br /><br /><br />
<div id="comment">
<form action="" method="post">
<table dir="rtl">
<tr>
<td>
الإسم: <input type="text" name="name" />
</td>
</tr>
<tr>
<td>
email: <input type="text" name="email" />
</td>
</tr>
<tr>
<td>
التعليق: <textarea name="message" rows="10" cols="30" >

</textarea>
</td>
</tr>

</table>
<br />
<input type="submit" name="submit" value="أضف التعليق">
</form>
</div>


<?php 
if(isset($_POST['submit']) && !empty($_POST['name'])){
	//print_r($_POST);
	//die();
	$name=clean_text($_POST['name']);
	$email=clean_text($_POST['email']);
	$message=clean_text($_POST['message']);
	$active=1;
	$query="INSERT INTO gbook (name,email,message,active) VALUES ('".$name."','".$email."','".$message."',1)";
	$reuslt=$db->query($query);
	if($reuslt){
		echo "تم إرسال التعليق بنجاح";
	}else{
		echo "هناك خطأ ما";
	}
	
}

?>







<?php 
include_once 'includes/footer.php';
?>