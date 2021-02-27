<?php
include_once("header.php");?>
<br />

<?php

if (isset($_GET['course_id']))

{
	$course_id=(int)$_GET['course_id'];
	$q= "select c_view_num from courses where  c_id={$course_id} ";

	$result=$db->query($q) or die($db->error);
	$row=$result->fetch_object();
	$added = $row->c_view_num + 1 ;
	$q = "UPDATE courses
													SET 
													 c_view_num  ='".$added ."'  
													
																
																 WHERE c_id =".$_GET['course_id'];
	$result=$db->query($q) or die($db->error);

	$q= "select * from courses where  c_id={$course_id} ";
	$result=$db->query($q) or die($db->error);

	if($result->num_rows ==1)

	{
		$row=$result->fetch_object();
		?>



<div align="right">
<table border="0" width="100%" dir="rtl" cellspacing="10"
	cellpadding="0" id="catstbl">
	<tr>
		<td width="30%" height="30" id="cellcatstbl">إسم الدورة</td>
		<td id="cellcatstbl"><?php echo $row ->c_name;?></td>
	</tr>


	<tr>
		<td width="30%" height="30" id="cellcatstbl">نبذة عن الدورة</td>
		<td id="cellcatstbl"><?php echo  $row ->c_about;?></td>
	</tr>
	<tr>
		<td width="30%" height="30" id="cellcatstbl">تم رؤية هذه الصفحة</td>
		<td id="cellcatstbl"><?php echo  $row ->c_view_num;?></td>
	</tr>


</table>

		<?php
		if (isset($_SESSION['log']) && isset($_SESSION['name']) && isset($_SESSION['id'])){
			$var=(isset($_GET['course_id']))?$_GET['course_id'] :1;
			echo "<form method='post' action='register.php'>";
			echo "<input type='submit' name='submit' value='التسجيل في الكورس'>";
			echo "<input type='hidden' name='course_id' value=$var>";
			echo "</form>";
		}else{
			echo "لكي يمكنك التسجيل في الكور يجب أولا تسجيل الدخول للموقع";	
		}
			?></div>

			<?php





		}

	}else
	{
		echo "<br /> عفوا قم بتحديد كورس لإستعراضه ";

	}


	?>





	<?php include_once("footer.php");?>