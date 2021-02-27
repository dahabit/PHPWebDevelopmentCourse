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
    $q="select * from admin";
        $reuslt=$db->query($q) or die($db->error);
        if($reuslt){
            while($row=$reuslt->fetch_object()){
    ?>
	<tr>
		<td width="5%">
			<?php echo $row->id;?>
        </td>
        <td width="55%">
			<?php echo $row->name;?>
        </td>
		<td class="action" width="20%">
            <a class="delete" href="deleteadmin.php?id=<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد من حذف المدير ؟')">حذف</a>
        </td>
		<td class="action" width="20%">
        	<a class="edit" href="editadmin.php?id=<?php echo $row->id;?>">تعديل</a>
		</td>
	</tr>

	<?php } ?>
    
    <?php 
    }else{
        echo "<h3>لا توجد مدراء للموقع مفعلة</h3>";
    }
	?>

</table>
</div>
<? include_once("includes/footer.php");?>