<?php 

$aMovieList = array(
		array("title" => "Hunt for Red October",
				"year" => 1990,
				"starring" => "Sean Connery, Alec Baldwin"
				),
		array("title" => "Good Will Hunting",
				"year" => 1996,
				"starring" => "Robin Williams, Matt Damon"
				),
		array("title" => "Swordfish",
				"year" => 2001,
				"starring" => "John Travolta, Hally Berry, Hugh Jacknman"
				)
		);

foreach($aMovieList as $aMovie)
{
	echo "<p>" . $aMovie["title"] . "," . $aMovie["year"] . "," . $aMovie["starring"] . "</p>";
}


?>