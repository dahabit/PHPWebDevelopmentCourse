<?php
include ('includes/header.php');
require_once ("utf8.class.php");
?>
<br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		

		<?

$course_id=intval($_GET['id']) ;

$sql = "INSERT INTO courses_fill
					(c_cat_id,c_id,s_id) 
					VALUES	
					( '$_SESSION[c_cat_id]','$_SESSION[c_id]','$_SESSION[s_id]')";
					
					
 $result = $db->query($sql);
	
if (!$db->isError()) {
?>

<div id="arttitle">

<br>
<br>
<br>
<br>

تم إدراج إسمك في المتقدمين لهذه الدورة بنجاح

<br>

<?
echo 'رقم الطلب الخاص بك هو' ;

echo "<div id=redtext>" ;
  echo $result->insertID();
 
 echo "</div>";
 
$utfConverter = new utf8(CP1256);
$to="dahabit@gmail.com";
$sub="new job registration";
$msg= "Name:".$_SESSION[s_name]."<br>"  ;
$msg.="worker id".$_SESSION[s_id]."" ;
$msg.= "job id".$_SESSION[c_id]."" ;
$msg= $utfConverter->utf8ToStr($msg);
mail($to , $sub , $msg ) ; 

//$go=$_SERVER['HTTP_REFERER'];
//header("Location: train.php") ;

} else {
echo 'هناك خطأ في عمليه التقديم من فضلك عد للخلف وكرر المحاولة';
}
?>
</div>
<?
					








?>
</td></tr></table>
<?
include ('includes/footer.php');
?>