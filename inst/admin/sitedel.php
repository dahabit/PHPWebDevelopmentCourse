<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['site_id']) ;

IF (isset($id))
{
$sql = "DELETE  FROM sites  WHERE  id=".$id." ";
			$result = $db->query($sql);	
			
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "تم حذف الموقع بنجاح" ;
					

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
			echo "لم يتم حذف الموقع برجاء التأكد من رقم المقالة " ;
}
			
			
		



?>











<? include_once("includes/footer.php");?>