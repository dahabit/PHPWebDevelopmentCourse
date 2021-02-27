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
<html dir="rtl">
<head>
<link rel="stylesheet" type="text/css" href="style.css" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" src="includes/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	plugins : "style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras",
// Theme options
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",

theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

theme_advanced_toolbar_location : "top",

theme_advanced_toolbar_align : "right",

theme_advanced_statusbar_location : "bottom",

theme_advanced_resizing : true
});
</script>

</head>

<meta name="copyright" content="Developed and Designed By ahmed abu_eldahab Copyright &copy; dahabit@gmail.com development" />

<title>لوحة التحكم</title>

</head>


<body BGCOLOR=#F5F5F5 LEFTMARGIN=0 TOPMARGIN=15 MARGINWIDTH=0 MARGINHEIGHT=0>
	<!-- border -->


<div align="center">
	<table border="0" width="950" cellspacing="0" cellpadding="10" dir="ltr"  id="bordertbl">
	
		<tr>
			<td   width=100%  height="100%">
			

<!-- star body-->
<table border="0" width="950"  dir="rtl" cellspacing="0" cellpadding="0">
	<tr>
		<td width="180" align="right" valign="top" >
		
		
		
			<!--menu -->
		
	<?php include_once ("menu.php");?>
		
		
		<!--menu -->
		
		
		
		</td>
		<td width="565" align="center" valign="top" id="mainarea3">