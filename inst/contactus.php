<?include_once("includes/header.php");require_once ("utf8.class.php");?>

<br><br><TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">		
<div align="center" dir="rtl">
  <center>
  <table  dir="ltr"  height="181" width="371" bgcolor="#FFFFFF" >
    <tr>
      <td  rowspan="2" height="181" valign="top">

        <br>







<?
$utfConverter = new utf8(CP1256);

  //send mail
if (isset($_POST['submit5'])){

$to="admin@dahabit.com" ;
$sub = $utfConverter->utf8ToStr($subject);
$msg= "Name:" .$_POST['name']."<br>"  ;
$msg.="E-mail:".$_POST['email']."" ;
$msg.= "Message:".$_POST['text']."" ;


$msg= $utfConverter->utf8ToStr($msg);





mail($to , $sub , $msg ) ;






mail($to , $sub , $msg ) ;

echo ("<div align=\"center\"> <p><b><font color=\"#0000FF\">نشكركم علي الإتصال بنا تم إرسال الرسالة بنجاح</font></b></p> </div>");




} else
{

?>
<SCRIPT language="JavaScript" type="text/javascript">
<!--
function checkentery()
{

  if (theForm3.name.value == "")
  {
    alert("من فضلك أدخل إسمك");
    theForm3.name.focus();
    return false ;
  }



  if (theForm3.email.value == "")
  {
    alert("من فضلك أدخل الإيميل الخاص بك");
    theForm3.email.focus();
    return false ;
  }

  if (theForm3.email.value != "")
	{
        if (theForm3.email.value.indexOf("@")==-1)
         {
			alert("   " +"من فضلك أدخل إيميل صحيح  \n مثال:someone@site.com");
			theForm3.email.focus();
			return false;
		}


     if (theForm3.email.value.indexOf(".")==-1)
         {
   alert("   " +"من فضلك أدخل إيميل صحيح  \n مثال:someone@site.com");
			theForm3.email.focus();
			return false;
		}

}








 if (theForm3.subject.value == "")
  {
    alert("من فضلك أدخل عنوان الرسالة التي تريد إرسالها");
    theForm3.subject.focus();
    return false ;
  }


  if (theForm3.text.value == "")
  {
    alert("من فضلك أدخل نص الرسالة التي تريد إرسالها");
    theForm3.text.focus();
    return false ;
  }






}
//-->

      </SCRIPT>


<div align="center">
  <center>
  <table width="383" dir="rtl" bgcolor="#FFFFFF" >
<form method="post" name="theForm3" onsubmit="return checkentery()"  action="<?php echo $PHP_SELF ?> ">
    <tr>
      <td width="15%"><b><font color="#000080">الإسم </font></b></td>

      <td width="77%" colspan="3" align="right">

      <input style="BORDER-RIGHT: #040AD2 1px solid; BORDER-TOP: #040ad2 1px solid; BORDER-LEFT: #040ad2 1px solid; COLOR: #111111; BORDER-BOTTOM: #040ad2 1px solid; BACKGROUND-COLOR: #ffffff" type="text" name="name" size="30"> <font color="#FF0000">*</font></td>

    </tr>
    <tr>
      <td width="15%"><b><font color="#000080">الإيميل  </font></b></td>
      <td width="77%" colspan="3" align="right">
      <input style="BORDER-RIGHT: #040AD2 1px solid; BORDER-TOP: #040ad2 1px solid; BORDER-LEFT: #040ad2 1px solid; COLOR: #111111; BORDER-BOTTOM: #040ad2 1px solid; BACKGROUND-COLOR: #ffffff" type="text" name="email" size="30"> <font color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="15%"><b><font color="#000080">عنوان الرسالة</font></b></td>
      <td width="77%" colspan="3" align="right">
      <input style="BORDER-RIGHT: #040AD2 1px solid; BORDER-TOP: #040ad2 1px solid; BORDER-LEFT: #040ad2 1px solid; COLOR: #111111; BORDER-BOTTOM: #040ad2 1px solid; BACKGROUND-COLOR: #ffffff" type="text" name="subject" size="30">




      </td>
    </tr>
    <tr>
      <td width="15%"><b><font color="#000080">الرسالة :</font></b></td>
      <td width="52%" colspan="2" align="right">


      <p align="left">


      <textarea style="BORDER-RIGHT: #040AD2 1px solid; BORDER-TOP: #040ad2 1px solid; BORDER-LEFT: #040ad2 1px solid; COLOR: #111111; BORDER-BOTTOM: #040ad2 1px solid; BACKGROUND-COLOR: #ffffff" cols="35" rows="10" name="text" class="inputbox"></textarea>


      </td>
    </tr>
    <tr>
      <td width="15%"></td>
      <td width="60%">

      <p align="center">

      <input style="BORDER-RIGHT: #123974 1px solid; BORDER-TOP: #123974 1px solid; BORDER-LEFT: #123974 1px solid; COLOR: #123974; BORDER-BOTTOM: #123974 1px solid; FONT-FAMILY: Tahoma; BACKGROUND-COLOR: #f5f5f5"  type=submit name=submit5 value="أرسل الرسالة" style="float: right"></td>




      <td width="13%">

<input style="BORDER-RIGHT: #123974 1px solid; BORDER-TOP: #123974 1px solid; BORDER-LEFT: #123974 1px solid; COLOR: #123974; BORDER-BOTTOM: #123974 1px solid; FONT-FAMILY: Tahoma; BACKGROUND-COLOR: #f5f5f5"  type=reset name=reset value="إمسح البيانات" style="float: right"></td>




      <td width="1%">

      <p align="center">&nbsp;</td>
      </form>
&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<?

}
?>
       <br>

      </td>

      </table>
  </center>
</div>

</td></tr></table>

<? include_once("includes/footer.php"); ?>