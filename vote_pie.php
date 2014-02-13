<?php 
header('Content-type: image/png'); 
$one = $_GET['one'];
$two = $_GET['two'];
 $slide = $one + $two; 
 $handle = imagecreate(100, 100); 
 $background = imagecolorallocate($handle, 255, 255, 255); 
 $red = imagecolorallocate($handle, 255, 0, 0); 
 $green = imagecolorallocate($handle, 0, 255, 0); 
 $blue = imagecolorallocate($handle, 0, 0, 255); 
 $darkred = imagecolorallocate($handle, 150, 0, 0); 
 $darkblue = imagecolorallocate($handle, 0, 0, 150); 
 $darkgreen = imagecolorallocate($handle, 0, 150, 0); 

 // 3D look
 for ($i = 60; $i > 50; $i--) 
 { 
 imagefilledarc($handle, 50, $i, 100, 50, 0, $one, $darkred, IMG_ARC_PIE); 
 imagefilledarc($handle, 50, $i, 100, 50, $one, $slide , $darkblue, IMG_ARC_PIE); 

if ($slide = 360)
{
 }
else
{
 imagefilledarc($handle, 50, $i, 100, 50, $slide, 360 , $darkgreen, IMG_ARC_PIE); 
 }
}
 imagefilledarc($handle, 50, 50, 100, 50, 0, $one , $red, IMG_ARC_PIE); 
 imagefilledarc($handle, 50, 50, 100, 50, $one, $slide , $blue, IMG_ARC_PIE); 
 if ($slide = 360)
{
 }
else
{
 imagefilledarc($handle, 50, 50, 100, 50, $slide, 360 , $green, IMG_ARC_PIE); 
}
 imagepng($handle); 
 ?>
