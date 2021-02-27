<? include_once("includes/header.php");


 ?>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	
<?$sql = "SELECT  * FROM  admin_word ";
		
			 $main = $db->query($sql);
 //$main=$main->fetch();
 // extract($main); 
?>  
<br><br>
<br><br>
<br><br>
<? //echo nl2br($main['word']); ?>
كلمة مدير المعهد
<br><br>
<br><br>
		
</td></tr></table>

<?include_once("includes/footer.php"); ?>