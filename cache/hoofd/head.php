<?php
function clean($str) {
  $str = @trim($str);
  if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
  }
  return mysql_real_escape_string($str);
}
$habbo = clean($_GET['figure']);
$url  = "http://www.habbo.nl/habbo-imaging/avatarimage?figure={$habbo}&action=non&direction=3&head_direction=3&gesture=non&size=1&img_format=gif";
$habbo = imagecreatefromgif($url);
$head = imagecreatefromgif("./head.gif");
$patch = imagecreatefromgif("./patch.gif");

$white = imagecolorallocate($head, 255, 255, 255);
$purple = imagecolorallocate($head, 200, 0, 200);

imagefilledrectangle($head, 0, 0, 55, 50, $purple);

imagecopy($head, $habbo, 0, 0, 5, 7, 64, 110);
imagecopy($head, $patch, 13, 43, 0, 0, 31, 7);

imagecolortransparent($head, $purple);

header("Content-type: image/gif");

imagegif($head);
?>