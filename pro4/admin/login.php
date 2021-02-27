<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
session_start();
include("../includes/config.php");
include_once("includes/functions.php");

if (isset($_POST['submit']) || !empty($_POST['username']) || !empty($_POST['password']) ) {
	
	$name= clean_text($_POST['username']);
	$pass=md5(md5(md5(md5(clean_text($_POST['password'])))));
		
	$q="select * from admin where name='".$name."' and password='".$pass."' ";
	$r=$db->query($q) or die($db->error);
	
		if ($r->num_rows ==1) {
			
			$_SESSION['login'] ='1';
			echo '
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تسجيل الدخول</title>
<link rel="stylesheet" href="style/css/transdmin.css" type="text/css" media="screen" />
<script language="javaScript" src="gen_validatorv31.js" type="text/javascript"></script>

</head>

<body>
<br />
<br />
<br />
<br />
<br />
<br />

تم الدخول بنجاح جارى تحويلك الى الموقع
<meta http-equiv="Refresh" content="2; url=index.php">

</body>
</html>

';


			}else {	
				header("Location: login.php");
		}
		
}else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تسجيل الدخول</title>
<link rel="stylesheet" href="style/css/transdmin.css" type="text/css" media="screen" />
<script language="javaScript" src="gen_validatorv31.js" type="text/javascript"></script>

</head>

<body>

<br />
<br />
<br />
<br />
<h1>
    <a class="menu" href="#" title="فى بى ايجى">
        <span style="color:#5494af;">V</span>
        <span style="color:#C5A059;">B</span>
        <span style="color:#c66653;">E</span>
        <span style="color:#5494af;">G</span>
        <span style="color:#c66653;">Y</span>
    </a>
</h1>
<div class="box">

<div class="cp"><img style="vertical-align:middle;" alt="vbegy" src="http://upload.vbegy.com/admin/admin_style/images/icon/Security_go.gif">تسجيل الدخول</div>
<hr />
<form name="myform" method="post" action="">
<input class="text_medium" type="text" name="username" id="username" onblur="if (this.value == '') {this.value = 'الاسم :';}" onfocus="if (this.value == 'الاسم :') {this.value = '';}" value="الاسم :" />
<br />
<br />
<br />
<input class="text_medium" type="password" name="password" id="password" onblur="if (this.value == '') {this.value = 'كلمة المرور :';}" onfocus="if (this.value == 'كلمة المرور :') {this.value = '';}" value="كلمة المرور :" />
<br />
<br />
<div id="myform_errorloc" class="error_strings"></div>
<br />

<button class="" type="submit" name="submit" value=""><span><span>تسجيل الدخول</span></span></button>
<button class="" type="reset" name="reset" value=""><span><span>استعادة</span></span></button>

</form>
<script language="JavaScript" type="text/javascript">
	var frmvalidator  = new Validator("myform");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
	frmvalidator.EnableMsgsTogether();


	frmvalidator.addValidation("username","alnum","قم بادخال الاسم لو سمحت .");
	
	frmvalidator.addValidation("password","alnum","قم بادخال كلمة المرور لو سمحت .");
</script>
</div>

</body>
</html>

<?php } ?>