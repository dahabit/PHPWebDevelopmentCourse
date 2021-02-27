<? include_once("includes/header.php");

?>

<?

$id=intval($_GET['article_id']) ;

$sql = "SELECT   id  FROM articles  WHERE  id=".$id." ";
			$result = $db->query($sql);
			
			
			if ($result->size() > 0) {
				
		$sql = "UPDATE   articles SET active=1 WHERE  id=".$id." ";
			$result = $db->query($sql);		
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "تم تفعيل المقالة بنجاح وستظهر في القسم الخاص" ;
				
			}
			
			else
			{
			

echo "لم يتم تفعيل المقالة بنجاح برجاء العودة إلي الخلف";


 
 
}




?>











<? include_once("includes/footer.php");?>