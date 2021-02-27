<?php include_once("includes/header.php");?><br><br>
<?php

$sql = "SELECT   id  FROM sites";
$page_result =$db->query($sql);
$eltotal= $page_result->size();

 $kam = 4;
 If (isset($_GET['page'])) 
 {
	 $page = (int) $_GET['page'];
	 
	 }
else 
{
$page = 0;
}


$sql = "SELECT   *  FROM  sites   ORDER BY id  LIMIT  ".$page.",".$kam;
$result = $db->query($sql);
			if ($result->size() > 0) {

				
				
				
				while ($row = $result->fetch()) {
					
					?>
					
					
					<table id="vedio" width="500" align="center" id="sites" >
				
					<tr>
					<td bgcolor="#d6d6d6" height="35" width="500" colspan="2" id="sites"> 
					
					<div id="arttitle">
				<?php echo $row['name']; ?>
					</div>
					
					</td>
					</tr>
					<tr>
					<td height="100%" width="500" align="center" colspan="2" id="sites">
					<div id="artbody">
					<?php echo $row['about']; ?>
					
					</div>
					</td>
					</tr>
					<tr>
					<td width="500" bgcolor="#d6d6d6" colspan="2" align="left" id="sites" height="35">
					<div id="arttitle">
<a href="<?php echo $row['link']?>" target="_blank ">
للذهاب إلي الموقع من فضلك إضغط هنا
					
	</a>			
		</div>			
			</td>
			
					</tr>
				
					</table>
					
					
<br><br><br>
				
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
			لا توجدمواقع في الدليل 
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