<?php
class Greet{
	function sayhello(){
		echo "Hello from class";
		echo '<br />';
	}
}

class Welcome extends Greet{
	function saywelcome(){
		echo "Welcome from class";
	}
	

}
//$ads= new Greet();

//$ads->sayhello();

$mahmoud= new Welcome();
$mahmoud->sayhello();
$mahmoud->saywelcome();


