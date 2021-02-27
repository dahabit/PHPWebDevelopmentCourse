<?php

$host=gethostbyaddr($_SERVER['REMOTE_ADDR'])  ;

$time_now=time()-3600; 


?>



<?



$sql = "SELECT  visitnum  FROM visits WHERE id=1 ";
			$result = $db->query($sql);
			if ($result->size() > 0) {
			
			while ($row = $result->fetch()) {



$nums=$row['visitnum'];
 
 
}
			
		
			$nums++;
			
			
			$sql = "UPDATE visits SET  visitnum = ".$nums." WHERE id=1 " ;
			$result = $db->query($sql);
			
			
			}
			
			
			
			
		
$sql1 = "SELECT  visitnum  FROM visits WHERE id=1   ";
			$result2 = $db->query($sql1);
				

			while ($row = $result2->fetch()) {



$nums1=$row['visitnum'];
 

 
 
}
?>



<?
 echo " تم تصفح الموقع بواسطة";
 echo "<br>";

 
 echo $nums1;
 echo "<br>";
 echo "زائر";
?>

