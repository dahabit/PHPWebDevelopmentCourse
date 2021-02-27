<?php
// this function used to cleat text 
/*
// how to use 

$var = clean_text($var);

*/
function clean_text($text='')

			{
				$text=trim($text);
				$text=strip_tags($text);
				$text=addslashes($text);
				$text=htmlspecialchars($text);	
			return $text;
			}

?>