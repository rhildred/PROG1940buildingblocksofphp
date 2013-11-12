<?php 

// set content type so that image will be rendered in the browser ... remember in jsp examples set text/plain 
header ("Content-type: image/png");

//create new 300 x 300 image
$myImage = ImageCreate(300,300);

// the first color allocated is the background color
$black = ImageColorAllocate($myImage, 0, 0, 0);
$white = ImageColorAllocate($myImage, 0xff, 0xff, 0xff);

ImageFilledRectangle($myImage, 100, 100, 140, 130, $white);

// send the bytes of the image
ImagePng($myImage);

// free the memory for the image
ImageDestroy($myImage);

?>