<?php
error_reporting(E_ALL);
include_once("header.php");?>



<?php
// pro_id pro_title pro_img pro_details pro_shortdesc pro_price pro_active pro_date pro_viewnum
$proid=(isset($_GET['pro']))?(int)$_GET['pro']:0;
if($proid==0){
	$q="select * from products where pro_active=1 ORDER BY pro_id ASC";
	$reuslt=$db->query($q) or die($db->error);
							
	while($row=$reuslt->fetch_object()){
	?>
	
    <h2><?php echo "<a href='products.php?pro={$row->pro_id}' title='{$row->pro_title}'>{$row->pro_title}</a>";?></h2>
    <img style="max-width:510px;" src="<?php echo $row->pro_img; ?>" alt="<?php echo $row->pro_title; ?>" title="<?php echo $row->pro_title; ?>"  />
    <br />
    <?php echo $row->pro_details; ?>
	
	<?php
	}
}else{
	$q="select * from products where pro_active=1 AND pro_id={$proid}";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows==1){
		while($row=$reuslt->fetch_object()){
			?>
            
<div class="post">
	<?php
	$pro_viewnum="UPDATE products SET pro_viewnum = pro_viewnum + 1 WHERE pro_id={$proid}";
	$pro_viewnum_r=$db->query($pro_viewnum) or die($db->error);
	?>

    <h2><?php echo $row->pro_title; ?></h2>
    <img style="max-width:510px;" src="<?php echo $row->pro_img; ?>" alt="<?php echo $row->pro_title; ?>" title="<?php echo $row->pro_title; ?>"  />
    
    <?php echo $row->pro_details; ?>
    <br />
    السعر : <?php echo $row->pro_price; ?><br />
    الزيارات : <?php echo $row->pro_viewnum; ?>

</div><!-- End post -->
			<?php
		}
	}else{
		echo "المنتج غير موجود";
	}

}

?>




<?php include_once("footer.php");?>