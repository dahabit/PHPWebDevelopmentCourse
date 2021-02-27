<?php include_once("includes/header.php"); ?>
<br />

<?php

//TABLE main_setting = sname,surl,smail,sdesc,stags,sclose,stextclose
$q = "SELECT maxsize FROM main_setting";	
$reuslt = $db->query($q) or die($db->error);
$row = $reuslt->fetch_object();

if (isset($_POST['setting_upload']) && $_POST['setting_upload'] == 'save_upload') {
	$maxbyte = clean_text($_POST['maxsize']);
	
	
	$update = "UPDATE main_setting SET
		maxsize='".$maxbyte."'";	
	$reuslt=$db->query($update) or die($db->error);
	if (isset($reuslt)) {
		echo "<h3>تم التعديل بنجاح</h3>";
		echo "<meta http-equiv='Refresh' content='1; url=upload_setting.php'>";
	}

}
?>

<form id='signupForm' class='jNice cmxform' action='' method='post'>
	<h3>اعدادات مركز الرفع</h3>
	<fieldset>
	<p><label for='maxsize'>المساحة المحددة لرفع الملفات بالبايت :</label><input id='maxsize' type='text' class='text-long maxsize' name='maxsize' value='<?php echo $row->maxsize ?>' /></p>
    <button class='' type='submit' name='do' value='upload'><span><span>حفظ الاعدادات</span></span></button>
    <button class='' type="reset" name='reset' value=''><span><span>استعادة</span></span></button>
	<input type="hidden" name='setting_upload' value='save_upload'>
	<br /><br />
	<p> - حيث 2097152 بايت = 1 ميجا</p>
    </fieldset>
</form>
<?php include_once("includes/footer.php");?>