<?php 

// set content type so that image will be rendered in the browser ... remember in jsp examples set text/plain 
header ("Content-type: image/png");

//create new 300 x 300 image
$myImage = ImageCreateFromJpeg("images/Koala.jpg");

// the first color allocated is the background color
$white = ImageColorAllocate($myImage, 0xff, 0xff, 0xff);

ImageFilledRectangle($myImage, 100, 100, 140, 130, $white);

// send the bytes of the image
ImagePng($myImage);

// free the memory for the image
ImageDestroy($myImage);

?>