<? include_once("includes/header.php");


 ?>
 
<br>
<TABLE WIDTH=516  BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		

<?php

$sql = "SELECT   id  FROM branches ";
$page_result =$db->query($sql);
$eltotal= $page_result->size();

 $kam = 3;
 If (isset($_GET['page'])) 
 {
	 $page = (int) $_GET['page'];
	 
	 }
else 
{
$page = 0;
}


$sql = "SELECT   *  FROM  branches   ORDER BY id  LIMIT  ".$page.",".$kam;
$result = $db->query($sql);
			if ($result->size() > 0) {

				
				while ($row = $result->fetch()) {
					
					?>
					
		
					
	<table border="0" width="100%" dir="rtl" cellspacing="10" cellpadding="0">
		<tr>
			<td width="153" id="branches">
			إسم الفرع :
			
			</td>
			<td id="branches">

			<?php echo $row['name']; ?> 
			
			</td>
		</tr>
		<tr>
			<td width="153" id="branches">
			
			نبذه عن الفرع :
			</td>
			<td id="branches">
			<?php echo nl2br($row['desc']); ?>
			
			</td>
		</tr>
		<tr>
			<td width="153" id="branches">
			للإتصال بالفرع :
			
			</td>
			<td id="branches">
			
			<?php echo nl2br($row['contact']); ?>
			
			</td>
		</tr>
	</table>


<br>
<br>
<br>

				
				<?			
			}



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
عفوا لا توجد بيانات حاليا في قاعدة البيانات لكي يتم عرضها
			</div>
			
			</td>
		</tr>
	</table>
</div>
<br>



<?
}

?>

</td></tr></table>

<?include_once("includes/footer.php"); ?>