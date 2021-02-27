<?php include_once("header.php");?>

<?php

if (isset($_GET['cat_id']))

{
	$cat_id=(int)$_GET['cat_id'] ;


	$q= "select * from courses where  c_cat_id={$cat_id} ";
	$result=$db->query($q) or die($db->error);
	if($result->num_rows >=1)

	{
			
		?>



<div align="center">

<table align="center" bordercolor=#000000 cellspacing="8"
	cellpadding="3" id="catstbl" width="100%">


	<?php
	while($row=$result->fetch_object())
	{
			
			
			
		?>

	<tr>

		<td valign="top" id="cellcatstbl" width="50%" height="30"
			id="cellcatstbl"><a
			href="course_detials.php?course_id=<?php echo $row->c_id;?>">

		<div id="job_name"><b><?php echo $row->c_name;?> </b><?
		echo "<br>";
			
			
		?></div>

		</a></td>

	</tr>

	<?php


	}
	?>
</table>
<br>
<br>
</div>
<br />
<br />


	<?php
	}

	else{

		echo "لا توجد دورات داخل هذا القسم ";
	}
}else

{
	?>



	<?php
	$sql = "SELECT * FROM  courses_cat ";

	$result = $db->query($sql);
		
	if ($result->num_rows > 0) {

		$cat_no=1;

		?>


<table align="center" bordercolor=#000000 cellspacing="15"
	cellpadding="2" id="catstbl" width="100%">
	<tr>


	<?php

	while ($row = $result->fetch_object()) {
			
			
		?>



		<td valign="top" id="cellcatstbl" width="50%" height="30"
			id="cellcatstbl"><a
			href="view_courses.php?cat_id=<?php echo $row->c_cat_id;?>">
		<div id="cat_name"><?php echo $row->c_cat_name;?></div>
		</a> <br>
		<div id="des_cat"><?php echo $row->c_cat_des;?></div>

		</td>

		<?php
		if($cat_no==2)
		{
			echo "</tr><tr>";

			
			$cat_no=0 ;
		}
		$cat_no+=1;
		?>



		<?php
			
	}
	echo "</tr> </table>"."<br>"."<br>" ;

	}
}
?>


		<br />
		<br />
		<br />
		<br />
		<br />
		<br />














		<?php include_once("footer.php");?>