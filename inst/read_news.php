<? include_once("includes/header.php");
?>

<?

$id=intval($_GET['news_id']) ;

$sql = "SELECT   viewnum  FROM news  WHERE  id=".$id." ";
			$result = $db->query($sql);
			if ($result->size() > 0) {
			
			while ($row = $result->fetch()) {



$nums=$row['viewnum'];
 
 
}
			
			
			$nums++;
			
			
			$sql = "UPDATE news SET  viewnum = ".$nums."  WHERE id=".$id." ";
			$result = $db->query($sql);
			
			}


$sql = "SELECT   *  FROM news WHERE active=1 AND id=".$id." ";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {

	

?>
<br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	
<br>
<div align="center">
	<table  width="80%" dir="rtl" cellspacing="0" cellpadding="0" id="cellall">
	<tr>
		<td width="80%" align="center" height="20">
		<?echo  $row['title'] ;?></td>
		</tr>
		
		
	</table>
</div> 
<br>
<div align="center">
<a href="" border=0 ALT="<?echo $row['title']?>">  
<img border="0" src="phpThumb.php?src=./images/news/<?if (is_null($row['img']))		
		{
		echo "defualt.gif"	;	
		
		}
		else
		{
				echo $row['img'];
		}	
		?>&w=200&h=200&amp;iar=1">
</a>
<br>


	
	
	</div>
	
	<br>
<div align="center">
	<table  width="300" dir="rtl" cellspacing="0" cellpadding="0" id="cellall">
	<tr>
		
		<td width=50%><span lang="ar-eg" >عدد القراءات: <?=$row['viewnum'] ?></span></td>
		
	</tr>
</table>
</div> 



	<br>
	<br>

	<div id="artbody">
	
	
	<?echo nl2br($row['details']) ;?>
	
	</div>
	</td></tr></table>
	<br>
	<br>

<div id="arttext">

	أخبار أخري

	
	</div>



			<br>
	<?	
	}
	
	$sql = "SELECT   *  FROM news  WHERE active=1 AND id<>".$id." ORDER BY id LIMIT 10";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {
			
			?>
		<div id="arttext"><b>
			<a href="read_news.php?news_id=<?=$row['id'] ?>" > <?echo  $row['title'] ;?>  </a><b>
			</div>									
			<?
			
		echo "<br>" ;
			
			}			?>								<p align="center">
		
			<a href="./news.php" >
		
		
لرؤية المزيد من الأخبار من فضلك إضغط هنا

		</a>
		
		</p>		<br>			<?
		}	
}
else
{
?>
<br>
<div align="center">
	<table border="0" width="350" cellspacing="0" cellpadding="0" dir="ltr" id="cellnews">
		<tr>
			<td dir="rtl" align="center" id="cellnews">
			
			<div id="error">
لم يتم العثور علي أخبار في هذا القسم			
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