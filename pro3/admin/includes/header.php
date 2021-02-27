<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once '../includes/config.php';
include_once 'functions.php';
if(!isset($_SESSION['login']) || $_SESSION['login']!='1' ) {
	header("Location: login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة تحكم الموقع</title>

<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>
<!--<script language="javaScript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.validate.js"></script>

<script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			user: "required",
			user: {
				required: true,
				minlength: 2
			},
			password: "required",
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: "required",
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
		},
		messages: {
			password: {
				required: "قم بادخال كلمة المرور لو سمحت",
				minlength: "يجب الا تقل كلمة المرور عن خمس حروف"
			},
			confirm_password: {
				required: "قم بادخال كلمة المرور لو سمحت",
				minlength: "يجب الا تقل كلمة المرور عن خمس حروف",
				equalTo: "تاكد من تطابق كلمة المرور"
			},
		}
	});
	
});
</script>
<script type="text/javascript" src="../includes/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	plugins : "style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras",
// Theme options

theme_advanced_toolbar_location : "top",

theme_advanced_toolbar_align : "right",

theme_advanced_statusbar_location : "bottom",

});
</script>
</head>

<body>
	<div id="wrapper">
    	<h1>
            <a class="menu" href="#" title="فى بى ايجى">
            <span style="color:#5494af;">V</span>
            <span style="color:#C5A059;">B</span>
           <span style="color:#c66653;">E</span>
           <span style="color:#5494af;">G</span>
           <span style="color:#c66653;">Y</span>
           </a>
        </h1>
        
        <ul id="mainNav">
        	<li><a href="#" class="active">الرئيسية</a></li>
        	<li><a href="main_setting.php">الاعدادات الاساسية</a></li>
        	<li><a href="upload_setting.php">اعدادات مركز الرفع</a></li>

        	<li class="logout"><a href="logout.php" onclick="return confirm('هل انت متاكد من تسجيل الخروج')">تسجيل الخروج</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    <?php include_once("menu.php"); ?>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                
                <div id="main">