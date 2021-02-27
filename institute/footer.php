</div>

<div class="right">
<h2>أكثر الدورات إستعراضاً</h2>
 <?php
$q= "select * from courses where c_active='1' order by c_view_num desc limit 1";
	$result=$db->query($q) or die($db->error);
	if($result)
	
				{
					while($r=$result->fetch_object())
					
						{
						echo "<li><a href='view_courses.php?c_id={$r->c_id}' class='selected'>{$r->c_name}</a></li>";
					
						}
				}
	
	?>
</div>

<div style="clear: both;"> </div>

</div>
<div id="bottom"> </div>
<div id="footer">
Developed by <a href="http://www.ahmeddahab.com/">Ahmed Abu_eldahab</a></div>

</div>
</body>
</html>