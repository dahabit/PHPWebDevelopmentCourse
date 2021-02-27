<?php
session_start();
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
$_SESSION['name']="ahmed";
$_SESSION['pass']="password";
//echo $_SESSION['name'];
