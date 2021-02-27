<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ترقيم الصفحات</title>

</head>
<body>
<?php
include_once ('includes/config.php');

$q= "select * from names";
$result=$db->query($q) or die($db->error);
$perpage=3;

$totalrows=$result->num_rows;

//echo $totalrows;
echo "<br />";
$numofpages=ceil($totalrows/$perpage);
//echo $numofpages;

$pagenum= (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
//$pagenum=($pagenum==0)? 1:$pagenum;
$startfrom= ($pagenum-1) * $perpage;
$q= "select * from names limit $startfrom,$perpage";
$result=$db->query($q) or die($db->error);
	
while($row=$result->fetch_object())
					{
					
					echo "<strong>id:</strong>&nbsp;".$row->id;
					echo "&nbsp;<strong>Name:</strong>&nbsp;".$row->name;
					echo "<br />";
					echo "<br />";
					}
					echo "<div class='pagination'>";
					
					for ($i=1; $i<=$numofpages; $i++) 
					
					{
					
					if ($i != $pagenum) {
					echo "<a href=codes.php?page=$i>$i</a>";
					} else {
					echo  "<span class='current'><u>$i</u></span> ";
					}


					
					}
					
					echo "</div>";
					
?>

</body>
</html>
