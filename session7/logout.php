<?php
session_start();
unset($_SESSION['login']);
session_destroy();
//echo "logedout";

header("Location: login.php");