<? include_once("includes/header.php");
 


	
	

?>
<br>
<br>




<?php

$sql = "SELECT   *  FROM news ";
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


$sql = "SELECT   *  FROM news  ORDER BY id DESC LIMIT  ".$page.",".$kam;
$result = $db->query($sql);





	
			if ($result->size() > 0) {

				
				
				
				while ($row = $result->fetch()) {
					
					
					
					
					?>
					
		<a href="read_news.php?news_id=<?=$row["id"]?>">
				
					<div id="news">
			
				
				<b><?echo $row['title']; ?> </b><?
					echo "<br>";					echo "<br>";
					
					?>
					</div>
					
				</a>
				
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
			لا توجدأخبار في قسم الأخبار
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