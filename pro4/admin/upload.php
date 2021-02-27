<?php
//TRUNCATE TABLE
include_once("includes/header.php");

$q = "SELECT surl,maxsize FROM main_setting";	
$reuslt = $db->query($q) or die($db->error);
$row = $reuslt->fetch_object();

?>
<br />
<?php
	
$maxsize = $row->maxsize;
$filetypes = array('image/jpeg','image/gif','image/png');

if (isset($_POST['do']) && $_POST['do'] == 'upload') {
$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$filetype = $_FILES['file']['type'];
$tmpname = $_FILES['file']['tmp_name'];
$folder = "upload/";
$url = $surl.$folder.$filename;
$alt = clean_text($_POST['alt']);

	if (empty($filename)) {
		echo "اختار رابط الصورة لو سمحت";
	}else if ($filesize > $maxsize) {
		echo " الملف اكبر من ".$maxsize;
	}else if (!in_array($filetype,$filetypes)) {
		echo"الصيغه التى تقوم برفعها غير متاحة";
	}else{
	$q="INSERT INTO upload (url,alt) VALUES ('".$url."','".$alt."')";
	$reuslt=$db->query($q) or die($db->error);
	if($reuslt){
		move_uploaded_file($tmpname,$folder.$filename);
		echo "
		<div style='text-align:center;'>
		<a target='_blank' href='".$surl.$folder.$filename."'>
		<img class='img_r' src='".$surl.$folder.$filename."' alt='' />
		</a>
		</div>
		<br /><br />";
		echo "<h3>تم رفع الصورة بنجاح</h3>";
	}
	}
}else {
?>

<form id='signupForm' class='jNice cmxform' action='upload.php' method='post' enctype='multipart/form-data'>
	<h3>رفع صورة جديدة</h3>
	<fieldset>
	<p><label for='file'>مسار الصورة :</label><input id='file' type='file' class='text-long file' name='file' /></p>
	<p><label for='alt'>اسم الصورة :</label><input id='alt' type='text' class='text-long alt' name='alt' /></p>
    <button class='' type='submit' name='do' value='upload'><span><span>رفـع</span></span></button>
    <button class='' type='reset' name='reset' value=''><span><span>استعادة</span></span></button>
	<br /><br />
	<p> - لا يمكن رفع الصورة اكبر من : <?php echo $maxsize; ?></p>
	<br /><br />
	<p> - امتدادات الصور المسموح برفعها : 
    <?php 
	foreach ($filetypes as $f) {
		$f = (str_replace('image',' ',$f));
		echo $f."  ";
	}
	?></p>
	</fieldset>
</form>

<?php
}
?>
<?php include_once("includes/footer.php");?>