<?include_once("includes/header.php");


 ?>
<br><TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		
		
		
		<?
		if (isset($_SESSION['w_id'])){
		
		$page=$_GET['p'];
		switch ($page)
		{
		
		case "home":
		@include ('w_cp_home.php');
				break;
				
		case "update_pass":
		
		@include ('w_update_pass.php');
		break;
		
		
		
		
		
		
		
		default:
		@include ('w_cp_home.php');
		}
		
		
		}
		
		else
		{
		echo "<div id=error>";
		echo "عفوا لم تقم بتسجيل الدخول وغير مسموح لك الدخول الي هذه المنطقة" ;
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		
		echo "<a href=worker_login.php>
		لتسجيل الدخول إضغط هنا 
		
		</a>";
		
		}
		
		
		
		?>
		
		
	
</td></tr></table>

<?include_once("includes/footer.php"); ?>