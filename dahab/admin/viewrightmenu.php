<?php
include_once("includes/header.php");
?>
<?php
	$q= "select * from rightmenu ";
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
				<td>
				<?php echo $row->id;?>
				</td>
						<td>
				<?php echo $row->name ;?>
				</td>
						
							<td>
				<a href='editmenu2.php?id=<?php echo $row->id ;?>' > تعديل </a>
				</td>
					<td>
				<a href="deletemenu2.php?id=<?php echo $row->id ;?>"> حذف </a>
				</td>
				
				</tr>
					
		<?php
						}
						
					echo "</table>";
				}
	?>


















<? include_once("includes/footer.php");?>