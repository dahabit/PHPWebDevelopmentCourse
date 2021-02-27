<?


echo "<div id=arttitle>";
echo "مرحبا بك ","&nbsp;&nbsp;",$w_name;
echo "&nbsp;&nbsp;" ;
echo "في لوحة التحكم الخاصة بك" ;
echo "<br>";
echo "<br>";
?>
<div align="center">
	<table border="0" width="50%" dir="rtl" cellspacing="8" cellpadding="0">
		<tr>
			<td id="cellcatstbl">
			<?
			echo "<a href=w_update_pass.php>";
			
			?>
لتغيير الباسورد الخاصة بك

			</a>
			</td>
		</tr>
		
		<tr>
			<td id="cellcatstbl">
			<?echo "<a href=logout.php>";
echo "تسجيل الخروج" ;

?>		
			</td>
		</tr>
	</table>
</div>
