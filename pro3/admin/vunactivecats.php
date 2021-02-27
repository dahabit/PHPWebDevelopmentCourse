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
    $q="select * from cats where cat_active=0";
        $reuslt=$db->query($q) or die($db->error);
        if($reuslt){
            while($row=$reuslt->fetch_object()){
    ?>
	<tr>
		<td width="5%">
			<?php echo $row->cat_id;?>
        </td>
        <td width="55%">
			<?php echo $row->cat_name;?>
        </td>
		<td class="action" width="20%">
            <a class="delete" href="deletecat.php?cat=<?php echo $row->cat_id;?>" onclick="return confirm('هل انت متاكد من حذف القسم ؟')">حذف</a>
        </td>
		<td class="action" width="20%">
        	<a class="edit" href="editcat.php?cat=<?php echo $row->cat_id;?>">تعديل</a>
		</td>
	</tr>

	<?php } ?>
    
    <?php 
    }else{
        echo "<h3>لا توجد اقسام مفعلة</h3>";
    }
	?>

</table>
</div>
<? include_once("includes/footer.php");?>