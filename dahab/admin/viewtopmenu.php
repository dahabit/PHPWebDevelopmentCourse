<?php
include_once("includes/header.php");
?>
<?php
	include_once ("includes/config.php");
	$q= "select * from topmenu ";
	$result=$db->query($q);
	if($result)
	
				{
				?>
				<br />
				<br />
				<br />
				<table width='500' dir='rtl' id="addarticle">
				<tr>
				<td id="addarticle">
				الرقم 
				</td>
						<td id="addarticle">
				الإسم
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
				<td id="addarticle">
				<?php echo $row->id;?>
				</td>
						<td>
				<?php echo $row->name ;?>
				</td>
						
							<td>
				<a href='editmenu.php?id=<?php echo $row->id ;?>' > تعديل </a>
				</td>
					<td>
				<a href="deletemenu.php?id=<?php echo $row->id ;?>"> حذف </a>
				</td>
				
				</tr>
					
		<?php
						}
						
					echo "</table>";
				}
	?>


















<? include_once("includes/footer.php");?>