<?php 
session_start();
header('Content-type: image/jpeg');
$font=realpath('arial.ttf');
$image=imagecreatefromjpeg("../images\certificate\certificate.jpg");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');
imagettftext($image, 18, 0, 420, 600, $color,$font, $date);
$name=$_SESSION['fullname'];
imagettftext($image, 28, 0, 420, 360, $color,$font, $name);
$tutor_name=$_SESSION['uploader_username'];
imagettftext($image, 28, 0, 400, 460, $color,$font, $tutor_name);
//imagejpeg($image,"certificate/$name.jpg");
imagejpeg($image);



imagedestroy($image);
?>