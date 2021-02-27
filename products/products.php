<?php include_once("header.php");?>
<br />
<br />
<?php

if (isset($_GET['cat_id']))

	{
		$cat_id=(int)$_GET['cat_id'] ;

		
		$q= "select * from products where active=1 and cat_id={$cat_id}";
		$result=$db->query($q) or die($db->error);
		if($result->num_rows >=1)
		
				{
					while($row=$result->fetch_object())
					{
					?>
					
					
					
				<div align="center">
					<table border="0" width="500" height="120" align="right" dir="ltr">
					<tr>
						<td height="110" width="123" rowspan="3">
						
						
						<a href="<?php echo $row->img;  ?>" rel="lightbox"><img src="<?php echo $row->img;  ?>" width="100" height="100" alt="<?php echo $row->shortdesc ; ?>" /></a>
						
						
						</td>
						<td height="30" width="377" dir="rtl">
						
						
						<a href="product_details.php?p_id=<?php echo $row->product_id; ?>" title="<?php echo $row->details ; ?>"><?php echo $row->title;  ?> </a>
						
						
						</td>
					</tr>
					<tr>
						<td height="100" width="377" dir="rtl" valign="top">
						<?php echo $row->shortdesc ; ?>
						
						</td>
					</tr>
				</table>
				</div>	
					<br />
					<br />
					
					
					<?php
					}
						
				}else{
				
				echo "لا توجد منتجات داخل هذا القسم ";
				}
	}else
	
	{
	?>
	<h2>أقسام الموقع</h2>
<ul>

<?php


$q= "select cat_id,cat_name,cat_des from cats ";
	$result=$db->query($q) or die($db->error);
	if($result)
	
				{
					while($r=$result->fetch_object())
					
						{
						
						echo "<li><a href='products.php?cat_id={$r->cat_id}' class='selected' title='{$r->cat_des}'>{$r->cat_name}</a></li>";
					
						}
				}
	
	?>




</ul>
	
	
	<?php
	
	
	}
	
	?>
	
	
<br />
<br />
<br />
<br />
<br />
<br />














<?php include_once("footer.php");?>