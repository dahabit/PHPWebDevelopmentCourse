<?php
include_once("includes/header.php");
?>



<?php
	$q= "select * from  courses where c_active='1' ";
	$result=$db->query($q) or die($db->error);
	if($result)
	
				{
			
				?>
				<br />
				<br />
				<br />
				<table width='500' dir='rtl' id="addarticle">
				<tr>
				<td>
				الرقم 
				</td>
						<td id="addarticle">
			إسم الدورة
				</td>
						
							<td id="addarticle">
				تعديل 
				</td>
					<td id="addarticle">
				حذف
				</td>
				
				</tr>
				<?php
				while($row=$result->fetch_object())
					{
					?>
				<tr>
				<td>
				<?php echo $row->c_id;?>
				</td>
						<td>
				<?php echo $row->c_name ;?>
				</td>
						
							<td>
				<a href='editcourse.php?c_id=<?php echo $row->c_id ;?>' > تعديل </a>
				</td>
					<td>
				<a href="deletecourse.php?c_id=<?php echo $row->c_id ;?>"> حذف </a>
				</td>
				
				</tr>
					
		<?php
						}
						
					echo "</table>";
				}
	?>
























<? include_once("includes/footer.php");?>