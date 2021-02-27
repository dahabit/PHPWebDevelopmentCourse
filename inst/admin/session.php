<?
//$ses=$_COOKIE['ses'];
if(isset($_COOKIE['ses']) )
{}
else{

header("Location: login.php");
exit;

}
?>