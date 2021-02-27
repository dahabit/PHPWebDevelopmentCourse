<html>
<head>
<script type="text/javascript" src="datetimepicker_css.js"></script>
</head>
<body>
<?php 
if(isset($_POST['submit'])){
	$time=date('h:i:s',time());
	
	
	$userdate=$_POST['year']."-".$_POST['month']."-".$_POST['day']." ".$time;
	
	echo $userdate;
	
	
}
?>
<form name="test" action=""  method="post">

<input type="text" name="demo3" id="demo3" >
<a href="javascript:NewCssCal('demo3')">
<img src="images/cal.gif" width="16" height="16" alt="Pick a date"></a>
<input type="submit" name="submit" value="Submit">

<select name="year">
<?php 
$curentdate=date('Y-m-d',time());

for($i=1350;$i<=$curentdate;$i++):?>
<option value="<?php echo $i?>"> 
<?php echo $i;?>
</option>
<?php 
endfor;
?>
</select>

<select name="month">
<option value="20"> 
20
</option>
</select>


<select name="day">
<option value="5"> 
5
</option>
</select>
</form>

</body>
</html>