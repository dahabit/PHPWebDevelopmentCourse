<?php 
error_reporting(E_ALL);
include_once("header.php");?>
<?php
	include_once ("includes/config.php");
	/*if ($_GET['id']!=''){
	$page=$_GET['id'];
	
	}else{
	
	$page=1;
	}
	*/
	$page=(isset($_GET['id']))?(int)$_GET['id'] : 1;
	$q= "select * from pages where active=1 and id={$page}";
	$result=$db->query($q);
	if($result->num_rows ==1)
	
				{
					$row=$result->fetch_object();
			
						echo "<br/>";
						echo "<h2>{$row->name}</h2>";
							echo "<br/>";
							echo "<br/>";
							echo "<br/>";
						echo $row->content;
						
						
						
				}else{
				
				echo "عفواً الصفحة التي قمت بطلبها غير موجوده";
				}
	?>



<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />














<?php include_once("footer.php");?>