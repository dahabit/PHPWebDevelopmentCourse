<?php
include_once 'config.php';
$q="select * from ahmed";
$reuslt=$db->query($q);

while($row=$reuslt->fetch_object()){
	echo "id: ".$row->id." ";
	echo "name: ".$row->name." ";
	echo "age: ".$row->age." ";
	echo '<br />';
}
echo "<br /><br /><br />";
$q="select * from teachers";
$reuslt=$db->query($q);
while($row=$reuslt->fetch_object()){
	echo "id: ".$row->id." ";
	echo "name: ".$row->name." ";
	echo "age: ".$row->age." ";
	echo "speciality: ".$row->speciality;
	echo '<br />';
}


