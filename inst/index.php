<?
include_once("includes/header.php");
$p=0;
?>


<div align="center">
	<table border="0" width="516" cellspacing="0" cellpadding="0" dir="ltr" >
		<tr>
			<td>

<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=34 COLSPAN=6>
			<IMG SRC="images/news/art_01.gif" WIDTH=516 HEIGHT=34 ALT=""></TD>
	</TR>
	<TR>
		<TD WIDTH=303 HEIGHT=16 COLSPAN=3>
			<IMG SRC="images/news/art_02.gif" WIDTH=303 HEIGHT=16 ALT=""></TD>
		<TD WIDTH=37 HEIGHT=35 ROWSPAN=2 bgcolor="#F5F5F5">
			<IMG SRC="images/news/art_03.gif" WIDTH=37 HEIGHT=35 ALT=""></TD>
		<TD WIDTH=176 HEIGHT=35 COLSPAN=2 ROWSPAN=2 >
			<IMG SRC="images/news/art_04.gif" WIDTH=176 HEIGHT=35 ALT=""></TD>
	</TR>
	<TR>
		<TD WIDTH=3 HEIGHT=194 ROWSPAN=2>
			<IMG SRC="images/news/art_05.gif" WIDTH=3 HEIGHT=194 ALT=""></TD>
			
		<TD WIDTH=300 HEIGHT=19 COLSPAN=2 id="headlatsal">
		
		
		
		</TD>
	</TR>
	<TR>
		<TD WIDTH="175" HEIGHT="160" id="photo" align="center">
		<?
			$sql = "SELECT   *  FROM news WHERE active=1 LIMIT 1  ";
			$result = $db->query($sql);
			
			if ($result->size() > 0) {
			while ($row = $result->fetch()) {
			

?>
		<!--<img border="0" src="images/news/photo.gif" width="130" height="130"> -->
		
		<img border="0" src="phpThumb.php?src=./images/news/<?if (is_null($row['img']))		
		{
		echo "defualt.gif"	;	
		
		}
		else
		{
				echo $row['img'];
		}	
		?>&w=150&h=150&amp;iar=1">	
			
		
			</TD>
			
			
		<TD WIDTH=335 HEIGHT=175 COLSPAN=3 id="latsal" dir="rtl">
		<br>
			<div id="arttitle">
	
	<a href="read_news.php?news_id=<?=$row['id'] ?>"> <?echo  $row['title'] ;?>  </a>
	</div>
	<br>
	<div id="artbody">
	<?
	 
	echo  $row['brief'] ;?>
	</div>
	<br>
	<br>
	
	<div id="artmore">
	<a href="read_news.php?news_id=<?=$row['id'] ?>">  التفاصيل  </a>

	
	</div>
	<?		
	}
			
	}		
			
			?>	
			
			</TD>
		<TD WIDTH=3 HEIGHT=175>
			<IMG SRC="images/news/art_09.gif" WIDTH=3 HEIGHT=175 ALT=""></TD>
	</TR>
	<TR>
		<TD WIDTH=516 HEIGHT=18 COLSPAN=6>
			<IMG SRC="images/news/art_10.gif" WIDTH=516 HEIGHT=18 ALT=""></TD>
	</TR>
	<TR>
		<TD WIDTH=3 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=3 HEIGHT=1 ALT=""></TD>
		<TD WIDTH=175 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=175 HEIGHT=1 ALT=""></TD>
		<TD WIDTH=125 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=125 HEIGHT=1 ALT=""></TD>
		<TD WIDTH=37 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=37 HEIGHT=1 ALT=""></TD>
		<TD WIDTH=173 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=173 HEIGHT=1 ALT=""></TD>
		<TD WIDTH=3 HEIGHT=1>
			<IMG SRC="images/news/spacer.gif" WIDTH=3 HEIGHT=1 ALT=""></TD>
	</TR>
</TABLE>
<!-- End ImageReady Slices -->
</td>
		</tr>
	</table>
</div>
<br>
<div align="center">			
<br><TABLE  WIDTH=516 BORDER=0 CELLPADDING=0 CELLSPACING=0 align="center" valign="top">
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		
		<?$sql = "SELECT  * FROM  main_page ";
		
			 $main = $db->query($sql);
 $main=$main->fetch();
  extract($main);
			
			?>
<div id="arttitle">
<? echo $main['main_title']; ?>

 
 </div>
 <br>

 <div id="artbody">
 <? echo nl2br($main['main_body']); ?>
  
 
 </div>
<br>

		
</td></tr></table>

	</div>	
				

			
				
				
				
				
<? include_once("includes/footer.php");?>