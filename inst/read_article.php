<? include_once("includes/header.php");
   require_once ("lib/mysql.php");
   require_once ("config/conn.php");
    require_once ("config/config.php");
?>

<?

$id=intval($_GET['article_id']) ;

$sql = "SELECT   viewnum  FROM articles  WHERE  id=".$id." ";
			$result = $db->query($sql);
			if ($result->size() > 0) {
			
			while ($row = $result->fetch()) {



$nums=$row['viewnum'];
 
 
}
			
			
			$nums++;
			
			
			$sql = "UPDATE articles SET  viewnum = ".$nums."  WHERE id=".$id." ";
			$result = $db->query($sql);
			
			}


$sql = "SELECT   *  FROM articles WHERE active=1 AND id=".$id." ";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {

//./images/hebo/books/		

?>
<br>

<br>
<div align="center">
	<table  width="500" dir="rtl" cellspacing="0" cellpadding="0" id="cellall">
	<tr>
		<td width="250">
		<p align="center"><span lang="ar-eg" ><?echo  $row['title'] ;?></span></td>
		<td width="250"><span lang="ar-eg" >   «·ﬂ« »: <?echo  $row['author'] ;?> </span></td>
	</table>
</div> 
<br>
<a href="./images/hebo/articles/<?=$row['img'] ?>" border=0 ALT="<?echo $row['title']?>">  
<img border="0" src="phpThumb.php?src=./images/hebo/articles/<?echo $row['img']; ?>&w=300&h=300&amp;iar=1">
</a>
<br>


	
	
	</div>
	
	<br>
<div align="center">
	<table  width="300" dir="rtl" cellspacing="0" cellpadding="0" id="cellall">
	<tr>
		
		<td width=50%><span lang="ar-eg" >⁄œœ «·ﬁ—«¡« : <?=$row['viewnum'] ?></span></td>
		<td width=50%>
		<p align="center"><span lang="ar-eg">
		
			<a href="<? echo  $row['remlink']; ?>" target="_new">
		
		
«·–Â«» «·Ì «· ⁄·Ìﬁ«  


		</a>
		
	
		
		
		
		
		
		
		</span></td>
	</tr>
</table>
</div> 



	<br>
	<br>

	<div id="det_body">
	
	
	<?echo nl2br($row['details']) ;?>
	
	</div>
	<br>
	<br>

<div id="arttext">

	 „ﬁ«·«  ¬Œ—Ì

	
	</div>



			<br>
	<?	
	}
	
	$sql = "SELECT   *  FROM articles  WHERE active=1 AND id<>".$id." ORDER BY id LIMIT 10";
			$result = $db->query($sql);
			if ($result->size() > 0) {

			
			while ($row = $result->fetch()) {
			
			?>
		<div id="arttext"><b>
			<a href="read_article.php?article_id=<?=$row['id'] ?>" > <?echo  $row['title'] ;?>  </a><b>
			</div>									
			<?
			
		echo "<br>" ;
			
			}			?>								<p align="center">
		
			<a href="./articles.php" >
		
		
·—ƒÌ… «·„“Ìœ „‰ «·„ﬁ«·«  »—Ã«¡ «·÷€ÿ Â‰« 


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
			·„ Ì „ «·⁄ÀÊ— ⁄·Ì „ﬁ«·«  ›Ì Â–« «·ﬁ”„
			
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