<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['book_id']) ;

$sql = "SELECT   id  FROM books  WHERE  id=".$id." ";
			$result = $db->query($sql);
			
			
			if ($result->size() > 0) {
				
		$sql = "UPDATE   books SET active=1 WHERE  id=".$id." ";
			
		$result = $db->query($sql);		
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "تم تفعيل الكتاب للعرض في الموقع بنجاح" ;
				
			}
			
			else
			{
			
echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
echo "لم يتم تفعيل الكتاب بنجاح برجاء العودة للخلف ";

echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
 
 
}




?>











<? include_once("includes/footer.php");?>