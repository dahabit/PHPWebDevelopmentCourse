<? include_once("includes/header.php");


 ?><br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	





<?
$sql = "SELECT  * FROM  courses_cat ";
		
			$result = $db->query($sql);
			
			if ($result->size() > 0) {
				
 $cat_no=1;
 	
			?>
			
			
			<table align="center" bordercolor=#000000  cellspacing="15" cellpadding="2" id="catstbl" width="100%">
			<tr>
			
			
			<?
			
			while ($row = $result->fetch()) {
			
			
			?>
						
				
			
			<td valign="top" id="cellcatstbl" width="50%" height="30" id="cellcatstbl">
								
								
									<a href="view_courses.php?cat_id=<?=$row["c_cat_id"]?>">
									<div id="cat_name">
									<?=$row["c_cat_name"]?>		
				</div>
									</a>
									
									<br>
<div id="des_cat">
					<?=$row["c_cat_des"]?>	
</div>	
									
									</td>
									
							<?
								if($cat_no==2)
								{
								echo "</tr><tr>";$cat_no=0 ;
								}
							    $cat_no= $cat_no+1;
						  ?>
			
						  					
					
			<?		
			
			}
			echo "</tr> </table>"."<br>"."<br>" ;
			
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
			لا توجد أقسام يمكن عرضها
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