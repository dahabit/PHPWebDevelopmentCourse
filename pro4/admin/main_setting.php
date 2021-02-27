<?php include_once("includes/header.php"); ?>
<br />

<?php

//TABLE main_setting = sname,surl,smail,sdesc,stags,sclose,stextclose
$q = "SELECT * FROM main_setting";	
$reuslt = $db->query($q) or die($db->error);
$row = $reuslt->fetch_object();

if (isset($_POST['setting']) && $_POST['setting'] == 'save') {
	$sname = clean_text($_POST['sname']);
	$surl = clean_text($_POST['surl']);
	$smail = clean_text($_POST['smail']);
	$sdesc = clean_text($_POST['sdesc']);
	$stags = clean_text($_POST['stags']);
	$sclose = clean_text($_POST['sclose']);
	$stextclose = addslashes($_POST['stextclose']);
	
	
	$update = "UPDATE main_setting SET
		sname='".$sname."',
		surl='".$surl."',
		smail='".$smail."',
		sdesc='".$sdesc."',
		stags='".$stags."',
		sclose='".$sclose."',
		stextclose='".$stextclose."'";	
	$reuslt=$db->query($update) or die($db->error);
	if (isset($reuslt)) {
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='1; url=main_setting.php'>";
	}

}
?>

<form id='signupForm' class='jNice cmxform' action='' method='post'>
	<h3>تعديلا الموقع الاساسية</h3>
	<fieldset>
	<p><label for='sname'>اسم الموقع :</label><input id='sname' type='text' class='text-long sname' name='sname' value='<?php echo $row->sname ?>' /></p>
	<p><label for='surl'>رابط الموقع :</label><input id='surl' type='text' class='text-long surl' name='surl' value='<?php echo $row->surl ?>' /></p>
	<p><label for='smail'>بريد الموقع :</label><input id='smail' type='smail' class='text-long smail' name='smail' value='<?php echo $row->smail ?>' /></p>
	<p><label for='sdesc'>وصف الموقع :</label><textarea id='sdesc' name='sdesc' rows='5' cols=''><?php echo $row->sdesc ?></textarea></p>
	<p><label for='stags'>الكلمات الدليلة :</label><textarea id='stags' name='stags' rows='5' cols=''><?php echo $row->stags ?></textarea></p>
	<p><label for='sclose'>حالة الموقع :</label><label class="label2" for='sclose'>نعم : </label><input id='sclose' type="radio" name='sclose' class='required' value='1' <?php if($row->sclose==1) {echo "checked='checked'";} ?> />&nbsp;&nbsp;&nbsp;&nbsp;
    <label class='label2' for='nosclose'>لأ : </label><input <?php if($row->sclose==0) {echo "checked='checked'";} ?> id='nosclose' type='radio' name='sclose' value='0' /></p>
	<p><label for='stextclose'>رسالة الاغلاق :</label><textarea id='stextclose' name='stextclose' rows='5' cols=''><?php echo stripcslashes($row->stextclose) ?></textarea></p>
    <button class='' type='submit' name='do' value='upload'><span><span>حفظ الاعدادات</span></span></button>
    <button class='' type="reset" name='reset' value=''><span><span>استعادة</span></span></button>
	<input type="hidden" name='setting' value='save'>
    </fieldset>
</form>
<?php include_once("includes/footer.php");?>