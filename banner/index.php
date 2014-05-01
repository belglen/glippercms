<?php 

$dbhost = 'db.glipper.be'; 
$dbuser = 'root'; 
$dbpass = 'FCDKfun1'; 
$dbname = 'newbut'; 

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql'); 
mysql_select_db($dbname); 

$usersreg = mysql_query("SELECT * FROM users WHERE online = '1'"); 
$num_rows = mysql_num_rows($usersreg); 

$image = imagecreatefrompng('images/banner.png'); 
$font_color = imagecolorallocate($image, 255, 0, 0); 
imagefttext($image, 15, 0, 406, 48, $font_color, './Volte.ttf', $num_rows); 
header('Content-type: image/png'); 
imagepng($image); 
imagedestroy($image); 
?>