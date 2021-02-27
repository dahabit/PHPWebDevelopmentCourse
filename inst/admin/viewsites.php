<? include_once("includes/header.php");

?>



<?php

$sql = "SELECT   *  FROM sites ";
$page_result =$db->query($sql);
$eltotal= $page_result->size();

 $kam = 30;
 If (isset($_GET['page'])) 
 {
	 $page = (int) $_GET['page'];
	 
	 }
else 
{
$page = 0;
}


$sql = "SELECT   *  FROM sites   ORDER BY id DESC LIMIT  ".$page.",".$kam;
$result = $db->query($sql);





	
			if ($result->size() > 0) {

				
					echo "<br>";
					echo "<br>";
				
					
				?>
				
				<table width="500" dir="rtl"  CELLPADDING=5 CELLSPACING=5>
					<tr>
					<td width="10%" id="addarticle">
					الرقم
					</td>
					
					<td width="50%" id="addarticle">
					إسم الموقع 
					</td>
					
			<td width="10%" id="addarticle">		
			حذف
			</td>
			<td width="10%" id="addarticle">		
			تعديل
			</td>			
			</tr>
			
				
				<?
				while ($row = $result->fetch()) {
					
					
			
					
					?>
					
				<tr>
				<td id="addarticle">
				<?php echo $row['id'];?>
				</td>
				<td id="addarticle">
				<?php echo $row['name'];?>
				
				</td>
				
				<td id="addarticle">
									
		<a href="sitedel.php?site_id=<?=$row["id"]?>">
			حذف
			</a>	
			</td>	
				<td  id="addarticle">		
	<a href="editsite.php?site_id=<?=$row["id"]?>">
			تعديل
			</a>		
			</td>
			</tr>		
				<?
				
						
			}


			echo "</table>";
			
			echo "<br>";
					echo "<br>";
					echo "<br>";
					echo "<br>";
########## start pager
if($page > 0){
$tali = $page -1;
?>
 &nbsp;&nbsp;&nbsp;&nbsp;
<a href="?page=<?php echo $tali; ?>">

 <<<السابق
 

</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 
<?

} 
		
			
if($eltotal > $page + $kam)

	{
$tali = $page + $kam;



?>
 &nbsp;&nbsp;&nbsp;&nbsp;
<a href="?page=<?php echo $tali; ?>">

التالي>>>

</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
<?
} 

###### end pager



			?>
	
			<?php	
				
			}
			else
			{
			?>
			
			
<br><br><br>
<div align="center">
	<table border="0" width="350" cellspacing="0" cellpadding="0" dir="ltr" id="cellnews">
		<tr>
			<td dir="rtl" align="center" id="cellnews">
			
			<div id="error">
			لا توجد مواقع في المكتبة 
			</div>
			
			</td>
		</tr>
	</table>
</div>
<br>



<?
}

?>






<? include_once("includes/footer.php");?>