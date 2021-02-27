<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['w_id']) ;

IF (isset($id))
{
$sql = "DELETE  FROM wantwife  WHERE  id=".$id." ";
			$result = $db->query($sql);	
			
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "تم حذف بيانات المتقدم بالطلب بنجاح" ;
					

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
			echo "لم يتم حذف بيانات مقدم الطلب برجاء التأكد من رقم المقالة " ;
}
			
			
		



?>











<? include_once("includes/footer.php");?>