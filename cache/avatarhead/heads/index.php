<?php
if(file_exists("./heads/" . stripslashes(addslashes($_GET['figure'])) .".png")) {
	header("Content-Type: image/png");
	$image = file_get_contents("./heads/" . stripslashes(addslashes($_GET['figure'])) .".png");
	echo $image;
	die();
}

$image = imagecreatetruecolor(64, 64);
$habbo = imagecreatefrompng("http://www.habbo.nl/habbo-imaging/avatarimage?figure=" . stripslashes(addslashes($_GET['figure'])) . "&head_direction=3&direction=3&gesture=sml");
$head_del = imagecreatefrompng("./head_delete.png");
$paars = imagecolorallocate($image, 255, 2, 154);
$wit = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 0, 0, 64, 64, $paars);
imagecolortransparent($image, $paars);

imagecopyresampled($image, $habbo, 0, -4, 0, 0, 64, 110, 64, 110);
imagecopyresampled($image, $head_del, 0, 3, 0, 0, 64, 64, 64, 64);

imagepng($image, "./heads/" . stripslashes(addslashes($_GET['figure'])) .".png");

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>