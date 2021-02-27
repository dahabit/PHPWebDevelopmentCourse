<?php
error_reporting(E_ALL);
include_once("header.php");?>



<?php

$catid=(isset($_GET['cat']))?(int)$_GET['cat']:0;
if($catid==0){
	$q="select * from cats where cat_active=1 ORDER BY cat_id ASC";
	$reuslt=$db->query($q) or die($db->error);
							
	while($row=$reuslt->fetch_object()){
	?>
	
    <h2><?php echo "<a href='categories.php?cat={$row->cat_id}' title='{$row->cat_name}'>{$row->cat_name}</a>";?></h2>
    <img style="max-width:510px;" src="<?php echo $row->cat_img; ?>" alt="<?php echo $row->cat_name; ?>" title="<?php echo $row->cat_name; ?>"  />
    <br />
    <?php echo $row->cat_des; ?>
	
	<?php
	}
}else{
	$q="select * from cats where cat_active=1 AND cat_id={$catid}";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt->num_rows==1){
		while($row=$reuslt->fetch_object()){
			?>
            
<div class="post">

    <h2><?php echo $row->cat_name; ?></h2>
    <img style="max-width:510px;" src="<?php echo $row->cat_img; ?>" alt="<?php echo $row->cat_name; ?>" title="<?php echo $row->cat_name; ?>"  />
    
    <p><?php echo $row->cat_des; ?></p>

</div><!-- End post -->
			<?php
		}
	}else{
		echo "القسم غير موجود";
	}

}

?>




<?php include_once("footer.php");?>