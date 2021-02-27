<?php
include_once 'functions.php';

include_once 'header.php';

$ahmed=$_GET['p'];

switch($ahmed){
	case 'home':
		//include_fiels is function that check the
		include_files('home.php');
		break;
	case 'blog':
		include_files('blog.php');
		break;
	case 'about':
		include_files('about.php');
		break;
	case 'contact':
		include_files('contact.php');
		break;
	default:
		include_once 'home.php';
}




include_once 'footer.php';