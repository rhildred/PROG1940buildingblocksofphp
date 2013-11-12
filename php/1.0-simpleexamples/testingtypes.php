<?php 

$nVar = 3;


// here we could do a cast or a settype
$testing = $nVar;


if(is_int($testing))
{
	// print the word true rather than php's 1
	echo "testing is int? true";
}
else
{
	// print the word false instead of php's nothing
	echo "testing is int? false";
}
	

?>