<?php 

// set content type so that image will be rendered in the browser ... remember in jsp examples set text/plain 
header ("Content-type: image/png");

//create new 300 x 300 image
$myImage = ImageCreate(300,300);

// the first color allocated is the background color
$black = ImageColorAllocate($myImage, 0, 0, 0);
$white = ImageColorAllocate($myImage, 0xff, 0xff, 0xff);
$red = ImageColorAllocate($myImage, 0xff, 0, 0);
$blue = ImageColorAllocate($myImage, 0, 0, 0xff);
$green = ImageColorAllocate($myImage, 0, 0xff, 0);
$ltRed = ImageColorAllocate($myImage, 0xff, 150, 150);
$ltBlue = ImageColorAllocate($myImage, 150, 150, 0xff);
$ltGreen = ImageColorAllocate($myImage, 150, 0xff, 150);

//draw background
for($i = 130; $i > 100; $i--)
{
	ImageFilledArc($myImage, 100, $i, 200, 150, 0, 90, $ltRed, IMG_ARC_PIE);
	ImageFilledArc($myImage, 100, $i, 200, 150, 90, 180 , $ltGreen, IMG_ARC_PIE);
	ImageFilledArc($myImage, 100, $i, 200, 150, 180, 360 , $ltBlue, IMG_ARC_PIE);
}

//draw foreground

ImageFilledArc($myImage, 100, 100, 200, 150, 0, 90, $red, IMG_ARC_PIE);
ImageFilledArc($myImage, 100, 100, 200, 150, 90, 180 , $green, IMG_ARC_PIE);
ImageFilledArc($myImage, 100, 100, 200, 150, 180, 360 , $blue, IMG_ARC_PIE);

// send the bytes of the image
ImagePng($myImage);

// free the memory for the image
ImageDestroy($myImage);

?>