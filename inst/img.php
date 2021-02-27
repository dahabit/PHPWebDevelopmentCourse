<? include_once("includes/header.php");

?>

<?

$img=$_GET['img'] ;

IF (isset($img))
{
	
?>
<br>
<br>

<div align="center">
<table width="550" height="100%" border="0" align="center">
<tr>
<td align="center" width="550">
<div class="img-dec" >

<img  src="phpThumb.php?src=./gallery/<?echo $img; ?>&w=500&amp;&fltr[]=wmt|www.valleyofpalmtrees.com|18|BR||50&amp;f=jpg&iar=1"  border="0">
</div>	
</td>
</tr>
</table>
</div>	

<?
					

}
else
{
	echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
		echo " there are an error please click back";
}
			
			
		



?>











<? include_once("includes/footer.php");?>