<? include_once("includes/header.php");


 ?><br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	


		
		


<?
$cat_id=intval($_GET['cat_id']) ;


//$sql = "SELECT   *  FROM jobs WHERE j_active=1 AND j_cat_id=".$cat_id."";
$sql = "SELECT   *  FROM jobs WHERE j_active=1 ";
$page_result =$db->query($sql);
$eltotal= $page_result->size();

 $kam = 15;
 If (isset($_GET['page'])) 
 {
	 $page = (int) $_GET['page'];
	 
	 }
else 
{
$page = 0;
}


//$sql = "SELECT   *  FROM jobs  WHERE j_cat_id=".$cat_id." AND j_active=1 ORDER BY j_id DESC LIMIT  ".$page.",".$kam;
$sql = "SELECT   *  FROM jobs  WHERE  j_active=1 ORDER BY j_id DESC LIMIT  ".$page.",".$kam;
$result = $db->query($sql);





	
			if ($result->size() > 0) {
?>
				
				
				<table align="center" bordercolor=#000000  cellspacing="8" cellpadding="3" id="catstbl" width="100%">
			
			
			<?
				while ($row = $result->fetch()) {
					
					
					
					
					?>
					
					<tr>
					
					<td valign="top" id="cellcatstbl" width="50%" height="30" id="cellcatstbl"  >
		<a href="job_details.php?job_id=<?=$row["j_id"]?>">
				
					<div id="job_name">
			
				
				<b><?=$row["j_title"]?> </b><?
					echo "<br>";
					
					
					?>
					</div>
					
				</a>
				</td>
				
				</tr> 
				
				<?
				
						
			}
?>
</table><br><br>
<?


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
			عفوا لاتوجد وظائف في القسم الذي إخترته
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