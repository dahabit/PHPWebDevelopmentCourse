<?php
 include_once 'includes/header.php' ;
?>







<?
$sql = "SELECT   *  FROM photo ";

$page_result =$db->query($sql);

$eltotal= $page_result->size();

 $kam = 12;
 If (isset($_GET['page'])) 
 {
	 $page = (int) $_GET['page'];
	 
	 }
else 
{
$page = 0;
}


  


$sql = "SELECT   *  FROM photo ORDER BY id LIMIT  ".$page.",".$kam;


			$result = $db->query($sql);
			
			if ($result->size() > 0) {
				
 $photo_no=1;
 	
			?>
			
			<br><br><br>
			<table  border="1" align="center" bordercolor=#000000  cellspacing="4" cellpadding="4" id="bookstbl">
			<tr>
			
			
			<?
			
			while ($row = $result->fetch()) {
			
			
			?>
						
				
			
			<td valign="top" id="photocel">
								
								<div class="img-dec">
									<a href="del_p.php?id=<?echo $row['id'];?> " >
									
									<?
									if($row["img"]!="")
									
									{
									?>
									
									<img  src="phpThumb.php?src=../gallery/<?echo $row['img']; ?>&w=100&h=130&amp;iar=1" alt="<?=$row["des"]?>" border="0">
								
								</div>
								
									<? 
									}
									else
									{
									
									?>
									<img src="../gallery/default.gif" width="50" height="70" border="0" alt="<?=$row["title"]?>" >
									<? 
									
									}
									?>
									
									</a>
									
									
									</td>
									
							<?
								if( $photo_no==4)
								{
								echo "</tr><tr>";
								$photo_no=0;
								}
							    $photo_no=$photo_no+1;
						  ?>
			
						  					
					
			<?		
			
			}
			echo "</tr> </table>"."<br>"."<br>" ;
			
			}
			
			
########## start pager
if($page > 0){
$tali = $page -12;
?>
 &nbsp;&nbsp;&nbsp;&nbsp;
<a href="?page=<?php echo $tali; ?>">

 <<<&nbsp; Back
 

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

Next &nbsp;>>>

</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <br>
 
 <br>
 
<?
} 

###### end pager
				
					
		
			else
			{
			?>
<br><br><br>
<div align="center">
	<table border="0" width="350" cellspacing="0" cellpadding="0" dir="ltr" id="cellnews">
		<tr>
			<td dir="rtl" align="center" id="cellnews">
			
			<div id="error">

			</div>
			
			</td>
		</tr>
	</table>
</div>
<br>

<?
}

?>
	
	




<?
 include_once 'includes/footer.php' ; 
 
?>