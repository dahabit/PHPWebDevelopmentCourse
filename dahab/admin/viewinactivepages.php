<?php
include_once("includes/header.php");
?>


<?php
	$q= "select * from pages where active=0 ";
	$result=$db->query($q);
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
				إسم الصفحة
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
				<?php echo $row->id;?>
				</td>
						<td>
				<?php echo $row->name ;?>
				</td>
						
							<td>
				<a href='editpage.php?id=<?php echo $row->id ;?>' > تعديل </a>
				</td>
					<td>
				<a href="deletepage.php?id=<?php echo $row->id ;?>"> حذف </a>
				</td>
				
				</tr>
					
		<?php
						}
						
					echo "</table>";
				}
	?>


