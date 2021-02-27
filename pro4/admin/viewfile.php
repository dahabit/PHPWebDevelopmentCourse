<?php
include_once("includes/header.php");
?>
<br />
<br />
<div id="main2">
<table width="600px">
	<tr class="odd">
		<td width="10%">الرقم</td>
		<td width="50%">الاسم</td>
		<td width="20%"> حذف</td>
		<td width="20%">تعديل</td>
	</tr>
	<?php 
    $q="select * from upload ORDER BY imgid ASC";
        $reuslt=$db->query($q) or die($db->error);
        if($reuslt){
            while($row=$reuslt->fetch_object()){
    ?>
	<tr>
		<td width="5%">
			<?php echo $row->imgid;?>
        </td>
        <td width="55%">
        	<a href="<?php echo $row->url;?>"><img class="img_r2" title="<?php echo $row->alt;?>" alt="<?php echo $row->alt;?>" src="<?php echo $row->url;?>" /></a>
        </td>
		<td class="action" width="20%">
            <a class="delete" href="deletefile.php?imgid=<?php echo $row->imgid;?>" onclick="return confirm('هل انت متاكد من حذف الصورة ؟')">حذف</a>
        </td>
		<td class="action" width="20%">
        	<a class="edit" href="editfile.php?imgid=<?php echo $row->imgid;?>">تعديل</a>
		</td>
	</tr>

	<?php } ?>
    
    <?php 
    }else{
        echo "<h3>لا صور مرفوعه حاليا</h3>";
    }
	?>

</table>
</div>
<?php include_once("includes/footer.php");?>