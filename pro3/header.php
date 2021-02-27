<?php
error_reporting(E_ALL);
include_once ("includes/config.php");
include_once'includes/functions.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<title><?php echo $sname; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
<meta name="keywords" content="<?php echo $sdesc; ?>" />
<meta name="description" content="<?php echo $stags; ?>" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
</head>
<body>
<div id="wrap">
<div id="header">
<h1><a href="<?php echo $surl; ?>"><?php echo $sname; ?></a></h1>
<h2><?php echo $sdesc; ?></h2>
</div>

<div id="top"> </div>
<div id="contentt">
<div id="headermenu"> 
<div class="headerm">
<ul>
<li><a href="index.php">الرئيسية</a></li> 
<li><a href="#">نبذه عنا</a></li> 
<li><a href="#">خدماتنا</a></li> 
<li><a href="categories.php">معرض المنتجات</a></li>
<li><a href="#">إتصل بنا</a></li> 

</ul>
</div>
</div>

<div class="left">
<h2>أقسام الموقع</h2>
<ul>

	<?php
	$q="select * from cats where cat_active=1 ORDER BY cat_id ASC";
	$reuslt=$db->query($q) or die($db->error);
							
	while($row=$reuslt->fetch_object()){
	echo "<li><a href='categories.php?cat={$row->cat_id}' title='{$row->cat_name}'>{$row->cat_name}</a></li>";
	}
	?>

</ul>
<h2>أحدث المنتجات</h2>
<ul>
	<?php
	$q="select * from products where pro_active=1 ORDER BY pro_id DESC limit 5";
	$reuslt=$db->query($q) or die($db->error);
							
	while($row=$reuslt->fetch_object()){
	echo "<li><a href='products.php?pro={$row->pro_id}' title='{$row->pro_title}'>{$row->pro_title}</a></li>";
	}
	?>
</ul>
</div>

<div class="middle">