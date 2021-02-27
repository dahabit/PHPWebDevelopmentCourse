<?php include_once 'includes/config.php';?>
<?php include_once("header.php");?>

<?php
$pageid=(isset($_GET['p']))?(int)$_GET['p']:1;
if($pageid==0){
	echo "الصفحة غير موجوده";
}else{
	$q="select * from pages where active=1 AND id={$pageid}";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows==1){
		while($row=$reuslt->fetch_object()){
			?>
<h3><?php echo $row->title;?></h3>
<br />
			<?php echo $row->content ;?>
			<?php
		}
	}else{
		echo "لم يتم العثور على الصفحة";
	}

}

?>



<br />
<br />
<br />
<br />











<?php include_once("footer.php");?>