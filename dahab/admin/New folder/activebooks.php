<? include_once("includes/header.php");

?>



<?php

$sql = "SELECT   *  FROM books WHERE active= 1";

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


$sql = "SELECT   *  FROM books WHERE active=1  ORDER BY id DESC LIMIT  ".$page.",".$kam;

$result = $db->query($sql);





	
			if ($result->size() > 0) {

				
					echo "<br>";
					echo "<br>";
					echo "<br>";
					echo "<br>";
					
				?>
				
				<table width="500" dirt="rtl" id="addarticle">
					<tr>
					<td width="10%" id="addarticle">
					الرقم
					</td>
					
					<td width="50%" id="addarticle">
					عنوان الكتاب
					</td>
					<td width="20%" id="addarticle">
					الحالة
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
				<?php echo $row['title'];?>
				
				</td>
				<td id="addarticle">
									
		<a href="binactive.php?book_id=<?=$row["id"]?>">
			عدم تفعيل
			</a>	
			</td>
				<td id="addarticle">
									
		<a href="bdel.php?book_id=<?=$row["id"]?>">
			حذف
			</a>	
			</td>	
				<td  id="addarticle">		
	<a href="editbook.php?book_id=<?=$row["id"]?>">
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
			لا توجد كتب في مكتبة الكتب
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