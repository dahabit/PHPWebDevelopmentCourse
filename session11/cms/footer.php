</div>
		<div id="sidebar">
		
			<h4>القائمة اليمنى</h4>
			<ul>
				
				<?php
		$q="select * from rightmenu where active=1";
		$reuslt=$db->query($q) or die($db->error);
		
		while($row=$reuslt->fetch_object()){
		echo "<li><a href='index.php?p={$row->link}' class='selected' title='{$row->title}'>{$row->name}</a>
		</li>";
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