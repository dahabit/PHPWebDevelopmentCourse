<?php
session_start();
print_r($_SESSION);
if(isset($_SESSION['name'])){
	
}
unset($_SESSION['name']);
echo $_SESSION['name'];