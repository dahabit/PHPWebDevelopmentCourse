<?php
include_once("includes/header.php");
?>
<br />
<br />


<table id="addarticle" width="600px">

	<tr>
		<td id="addarticle" width="5%">الرقم</td>
<td id="addarticle" width="55%">الإسم</td>

		<td id="addarticle" width="20%"> حذف</td>
		<td id="addarticle" width="20%">تعديل</td>
	</tr>
<?php 
$q="select * from topmenu where active=1";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		while($row=$reuslt->fetch_object()){
?>
<tr>
		<td id="addarticle" width="5%">
		
<?php echo $row->id;?>		</td>
<td id="addarticle" width="55%">

<?php echo $row->name;?>

</td>
		<td id="addarticle" width="20%">
<?php ?>
<a href="deletetopmenu.php?id=<?php echo $row->id;?>">
حذف
</a>
</td>
		<td id="addarticle" width="20%">
		
<a href="edittopmenu.php?id=<?php echo $row->id;?>">
تعديل
</a>		
		
		</td>
	</tr>

<?php } ?>

<?php 
}else{
	echo "لا توجد صفحات مفعلة";
}

?>

</table>





<? include_once("includes/footer.php");?>