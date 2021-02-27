<?php
	error_reporting(E_ALL);
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include_once 'functions.php';
		if(!isset($_SESSION['login']) || $_SESSION['login']!='1' )
		{
		header("Location: login.php");
		}
		include_once ("includes/config.php");
		include_once ("includes/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="includes/jscripts/tiny_mce/tiny_mce.js"></script>
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
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>
	<div id="container">
    	<div id="header">
        	<h2>Admin area</h2>
    <div id="topmenu">
            	<ul>
                	<li class="current"><a href="../index.php">الرئيسية</a></li>
                   
              </ul>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <li><a href="logout.php" class="report">تسجيل الخروج</a></li>
                    <li><a href="#" class="report_seo">SEO Report</a></li>
                    <li><a href="#" class="search">Search</a></li>
                    <li><a href="#" class="feed">RSS Feed</a></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
       			