<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['id']) ;

IF (isset($id))
{
$sql = "DELETE  FROM photo  WHERE  id=".$id." ";
			$result = $db->query($sql);	
			
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "photo deleted ";
					

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