</div>
		<div id="sidebar">
		
			<h4>القائمة الرئيسية</h4>
			<ul>
				
				<?php
	include_once ("includes/config.php");
	$q= "select * from rightmenu ";
	$result=$db->query($q);
	if($result)
	
				{
					while($row=$result->fetch_object())
					
						{
						echo "<li><a href='index.php?id={$row->link}' class='selected' title='{$row->title}'>{$row->name}</a></li>";
						
						}
				}
	
	?>
				
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
	<p>&copy; 2010 Copyrights:<a href="http://www.ahmeddahab.com" title="ahmed website">Developed By Ahmed abu eldahab</a>		</p>

	</div>
			
</div>
</body>
</html>