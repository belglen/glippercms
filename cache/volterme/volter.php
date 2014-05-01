<?php
$font = "./Volte.ttf";
$text = ((isset($_GET['t'])) ? $_GET['t'] : '');
$size = ((isset($_GET['s'])) ? $_GET['s'] : 7);
$image = imagecreatetruecolor(($size * strlen($text) + 2), ($size + 4));
$wit = imagecolorallocate($image, 255, 255, 255);
$zwart = imagecolorallocate($image, 0, 0, 0);
$paars = imagecolorallocate($image, 204, 119, 255);

imagefilledrectangle($image, 0, 0, ($size * strlen($text) + 2), ($size + 4), $wit);

imagecolortransparent($image, $wit);

imagettftext($image, $size, 0, 1, ($size + 1), $zwart, $font, $text);

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>