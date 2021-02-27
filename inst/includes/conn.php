<?
include_once ('mysql.php');
$db = &new MySQL("localhost", "root", "", "institute");


$sql = "SET character_set_client=utf8";
$page =$db->query($sql);


$sql = "SET character_set_connection=utf8";
$page =$db->query($sql);

$sql = "SET character_set_database=utf8";
$page =$db->query($sql);

$sql = "SET character_set_results=utf8";
$page =$db->query($sql);

$sql = "SET character_set_server=utf8";
$page =$db->query($sql);

?>