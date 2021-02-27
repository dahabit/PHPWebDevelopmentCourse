<?php 

#########################
## LAST X POSTS v3.1   ##
## PHASE(1) MEDIA      ##
## WWW.PHASE1MEDIA.COM ##
## TRE@PHASE1MEDIA.COM ##
#########################

/* This script shows the last X numbers of posts (titles) posted last on a non-VB page.
You may customize it in any way you wish. If you have any problems with it, you can
post them at vB.org or send me an email to tre@phase1media.com.

Enjoy!
*/

## CUSTOMIZE SETTINGS FOR YOUR SITE ##
$db_host = "localhost"; // Change this if your MySQL database host is different.
$db_name = "loaloaa_forum"; // Change this to the name of your database.
$db_user = "root"; // Change this to your database username.
$db_pw = ""; // Change this to your database password.

$forum_url = "http://z3tr.loaloaa.com/"; // Change this to reflect to your forum's URL.
$forum_id = ""; // If you wish to display the posts from a specific forum, enter the forum id here. Otherwise, leave it blank.
$limit = "10"; // Number of posts displayed.
$titlecolor = "#0000FF"; // This is the color of the title.
$postedcolor = "#404040"; // This is the color of the bottom text.
$txtlimit = "100"; // This is the character limit.
#######################################

// Connecting to your database
mysql_connect($db_host, $db_user, $db_pw) 
OR die ("Cannot connect to your database"); 
mysql_select_db($db_name) OR die("Cannot connect to your database"); 
?>
<div align="center" align="right">

<MARQUEE direction=up width="180" height="100" scrollamount="2" scrolldelay="100">
<?php

// Below is the beginning of a table. If you feel you don't need it, you may remove it.
echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">";

if ($forum_id!="") {
	$forumid = "AND forumid=$forum_id";
}
else{$forumid="";}

if ($limit) {
	$limited = "LIMIT $limit";
}
$thread_sql = mysql_query("SELECT threadid,title,lastpost,lastposter FROM thread WHERE visible=1 AND open=1 $forumid ORDER BY lastpost DESC $limited");
//echo "SELECT threadid,title,lastpost,lastposter FROM thread WHERE visible=1 AND open=1 $forumid ORDER BY lastpost DESC $limited";
while($thread_get=mysql_fetch_array($thread_sql))
{
$lastpost = $thread_get['lastpost'];
$poster = $thread_get['lastposter'];
$tid = $thread_get['threadid'];
$psql = mysql_query("SELECT postid FROM post WHERE threadid=$tid ORDER BY postid DESC");
$getp=mysql_fetch_array($psql);
$pid = $getp['postid'];
$date2 = date ("m/d/y h:i A" ,$lastpost);
$title = $thread_get['title'];
//$title = substr($title,0,$txtlimit);
$title = wordwrap($title, 8, "\n",1);
echo "<tr><td><font size=\"4\" face=\"arial,verdana,geneva\"><a href=\"$forum_url/showthread.php?p=$pid#post$pid\"><FONT SIZE=\"2\" COLOR=\"$titlecolor\" face=\"arial,verdana,geneva\">$title</FONT></a></font><br /><font color=\"$postedcolor\" face=\"arial,verdana,geneva\" size='1'>الراسل: $poster <i>$date2</i></FONT></td></tr>";
}
echo "</table>";

?>
</MARQUEE>

</div>