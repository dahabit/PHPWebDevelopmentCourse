<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['article_id']) ;

IF (ISSET($id))
{
$sql = "DELETE  FROM articles  WHERE  id=".$id." ";
			$result = $db->query($sql);	
			
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "تم حذف المقالة بنجاح" ;
					

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
			echo "لم يتم حذف المقالة برجاء التأكد من رقم المقالة " ;
}
			
			
		



?>











<? include_once("includes/footer.php");?>