<?php 

// set content type so that image will be rendered in the browser ... remember in jsp examples set text/plain 
header ("Content-type: image/png");

//create new 300 x 300 image
$myImage = ImageCreate(300,200);

// the first color allocated is the background color
$white = ImageColorAllocate($myImage, 0xff, 0xff, 0xff);
$red = ImageColorAllocate($myImage, 0xff, 0, 0);
$green = ImageColorAllocate($myImage, 0, 0xff, 0);

// Draw a green rectangle around the edge of the screen

ImageRectangle($myImage, 0, 0, 299, 199, $green);

// Start Drawing line on graph


$mysqli = new mysqli('localhost', 'root', '', 'babysleep');

if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if(!($res = $mysqli->query("CALL babysleepsum()")))
{
	echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
else
{
	$x1 = 0;
	$y1 = 0;
	$x2 = -30;
	$y2 = 0;
	$color = $green;
	$sleepday = 0;
	
	while($row =  $res->fetch_assoc())
	{
		// we need to graph a line segment
		//echo $row["babyname"],", " , $row["sleepday"], ", ", $row["duration"], "\n";
		$sleepday = $row["sleepday"];
		if($sleepday == 1 && $y1 != 0)
		{
			$x1 = 0;
			$y1 = 0;
			$x2 = 10;
			$color = $red;
		}
		else 
		{
			$x1 = $x2;
			$y1 = $y2;
			$x2 += 40;
		}
		$y2 = $row["duration"] /3;
		if($y1 != 0)
		{
			ImageLine($myImage, $x1, $y1, $x2, $y2, $color);
		}
		
	}
}

// send the bytes of the image
ImagePng($myImage);

// free the memory for the image
ImageDestroy($myImage);

?>