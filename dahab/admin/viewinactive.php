<?php
include_once ("includes/header.php");
include_once ("includes/config.php");
?>
<br />
<br />
<div align="right">
<h3> الردود غير المفعلة </h3>

</div>
<?php
		$result= $db->query('select * from guestbook where active=0') or die($db->error);
		if($result->num_rows >0 )
		{
		while ($row=$result->fetch_object())
		{

		$r[]= $row;

		}
?>
			<table width="500" dir="rtl" id="addarticle">
					<tr>
					<td width="10%" id="addarticle">
					الرقم
					</td>
					
					<td width="60%" id="addarticle">
					الرد
					</td>
					
			<td width="10%" id="addarticle">		
			حذف
			</td>
			
			<td width="10%" id="addarticle">		
			تعديل
			</td>
			</tr>
			
				<?php foreach($r as $row):?>
				
				<tr>
				<td id="addarticle">
				<?php echo $row->id ;?>
				</td>
				<td id="addarticle">
			<?php echo $row->message ;?>
				
				</td>
				
				<td id="addarticle">
									
		<a href="">
			حذف
			</a>	
			</td>	
			
			<td  id="addarticle">		
	<a href="">
			تعديل
			</a>		
			</td>	
			</tr>		
<?php endforeach;?>

			</table>

<?php

}else

{

echo "no active replays";

}

?>






















<?php
include_once ("includes/footer.php");
?>