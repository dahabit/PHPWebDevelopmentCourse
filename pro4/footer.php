</div>

<div class="right">
<h2>أكثر المنتجات إستعراضاً</h2>
<ul>
	<?php
	$q="select * from products where pro_active=1 ORDER BY pro_viewnum DESC limit 1";
	$reuslt=$db->query($q) or die($db->error);
							
	while($row=$reuslt->fetch_object()){
	echo "<li><a href='products.php?pro={$row->pro_id}' title='{$row->pro_title}'>{$row->pro_title}</a></li>";
	}
	?>
</ul>
</div>

<div style="clear: both;"> </div>

</div>
<div id="bottom"> </div>
<div id="footer">
Developed by <a href="http://www.ahmeddahab.com/">Ahmed Abu_eldahab</a></div>

</div>
</body>
</html>