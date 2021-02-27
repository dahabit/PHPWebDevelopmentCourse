<?php
include_once("includes/header.php");
?>



<?php
	$q= "select * from  courses_cat where c_cat_active='1' ";
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
				إسم القسم
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
				<?php echo $row->c_cat_id;?>
				</td>
						<td>
				<?php echo $row->c_cat_name ;?>
				</td>
						
							<td>
				<a href='editcat.php?cat_id=<?php echo $row->c_cat_id ;?>' > تعديل </a>
				</td>
					<td>
				<a href="deletecat.php?cat_id=<?php echo $row->c_cat_id ;?>"> حذف </a>
				</td>
				
				</tr>
					
		<?php
						}
						
					echo "</table>";
				}
	?>
























<? include_once("includes/footer.php");?>