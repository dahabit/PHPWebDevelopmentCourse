<?php
include ('includes/header.php');
require_once ("utf8.class.php");
?>
<br>
<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		

		<?

$job_id=intval($_GET['id']) ;

$sql = "INSERT INTO jobs_fill
					(j_cat_id,j_id,w_id) 
					VALUES	
					( '$_SESSION[j_cat_id]','$_SESSION[j_id]','$_SESSION[w_id]')";
					
					
 $result = $db->query($sql);
	
if (!$db->isError()) {
?>

<div id="arttitle">

<br>
<br>
<br>
<br>
تم إدراج إسمك في المتقدمين لهذه الوظيفة بنجاح
<br>

<?
echo 'رقم الطلب الخاص بك هو' ;

echo "<div id=redtext>" ;
  echo $result->insertID();
 
 echo "</div>";
 
$utfConverter = new utf8(CP1256);
$to="dahabit@gmail.com";
$sub="new job registration";
$msg= "Name:".$_SESSION[w_name]."<br>"  ;
$msg.="worker id".$_SESSION[w_id]."" ;
$msg.= "job id".$_SESSION[j_id]."" ;
$msg= $utfConverter->utf8ToStr($msg);
mail($to , $sub , $msg ) ; 
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