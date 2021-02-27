<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php include_once 'config.php';
$q="select * from names";
$reuslt=$db->query($q) or die($db->error);
$perpage=3;
$totalpages=ceil($reuslt->num_rows/$perpage);

$pagenum=(isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1;

$startfrom=($pagenum -1) * $perpage;

$q="select * from names limit ".$startfrom.",".$perpage;
$reuslt=$db->query($q) or die($db->error);

if($reuslt->num_rows>=1){
	while($row=$reuslt->fetch_object()){
		echo "id: ",$row->id;
		echo " Name:",$row->name;
		echo "<br />";
	}
}else{

	echo "No Data";
}

echo "<br /><br />";
echo "<div class='pagination'>";
for($r=1;$r<=$totalpages;$r++){
	if ($r != $pagenum) {
		echo "<a href=index.php?page=$r>$r</a>";
	} else {
		echo  "<span class='current'><u>$r</u></span> ";
	}

}
echo "</div>";
?>

</body>
</html>
