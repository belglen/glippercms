<?php
$connection = mysql_connect('localhost','root','Password') or die(mysql_error());
mysql_select_db('DATABASENAME', $connection) or die(mysql_error());
date_default_timezone_set('Europe/Amsterdam');

$image = "DraBBOHotelviewImageHAHA.png";
$src = 'pixel.png';
putenv('GDFONTPATH=' . realpath('.')); 
$font = 'font.ttf';  //Ubuntu font
$username = addslashes(htmlentities($_GET['drabbo_naam']));

$get_query = mysql_query("SELECT last_online FROM users WHERE username = '".$username."' LIMIT 1")or die(mysql_error());
$get = mysql_fetch_array($get_query);
$getstaff_query = mysql_query("SELECT username, look FROM users WHERE username = '".$username."' LIMIT 1") or die(mysql_error()); // Nu laat die alleen jou Drabbo zien x]
$getstaff = mysql_fetch_array($getstaff_query);
$krijg_vippunten = mysql_query("SELECT credits, vip_points FROM users WHERE username = '".$username."' ORDER BY RAND()") or die(mysql_error());
$vippunten = mysql_fetch_array($krijg_vippunten);
$d1 = date("d-m-y", $get['last_online']);
$adapt = $get['last_online']-7200;
$d2 = date("H:i", $adapt);
$im = imagecreatefrompng($image);
$src_to_copy = imagecreatefrompng($src);
$pg = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=' . $getstaff[1] . '&direction=2&head_direction=2&action=drk=667&gesture=sml&size=l');
$beneden = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=' . $getstaff[1] . '&direction=2&head_direction=3&action=wav&gesture=sml&size=l');
$staff_arjan = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=ca-3151-62-62.ch-3185-96.lg-3202-62-62.hr-831-42.sh-3089-64.hd-180-1&direction=2&head_direction=2&gesture=sml&size=l');
$staff_locus = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=lg-275-100.sh-290-92.hr-828-1350.ch-235-110.hd-190-3&direction=3&head_direction=2&gesture=sml&size=l');
$staff_gertlilly = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=hd-180-29.ea-3168-62.ch-3077-62-62.lg-3058-64.hr-828-59.ca-3084-73-62&direction=3&head_direction=3&gesture=sml&size=l');
$staff_timo = imagecreatefrompng('http://www.habbo.nl/habbo-imaging/avatarimage?figure=hd-185-22.lg-280-110.sh-295-62.ea-1406-62.hr-170-51.ch-220-110&size=l&direction=3&head_direction=3&gesture=sml&size=l');
$staff_ilkay = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=hd-195-3.lg-275-89.he-1608-62.sh-290-92.hr-831-45.ca-3187-89.ch-255-92&direction=3&head_direction=3&gesture=sml&action=wav&size=l');
$staff_lara = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=sh-730-1320.hr-3012-45.wa-2001-62.ca-3175-92.ch-824-1320.hd-605-3.lg-3018-1341&direction=6&head_direction=6&gesture=sml&size=l');
$staff_citroen = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=wa-2005-62.ca-3175-62.ch-3050-96-62.hd-180-14.lg-280-110.sh-290-77.cc-3007-96-62.ha-1026-62.he-1601-62.hr-828-58&direction=3&action=sit&head_direction=3&gesture=sml&size=l');

$staff_don = imagecreatefrompng('http://habbo.nl/habbo-imaging/avatarimage?figure=sh-290-92.hr-831-61.ca-3187-62.ch-215-106.hd-195-4.lg-275-83&direction=3&action=sit&head_direction=3&gesture=sml&size=l');

imagealphablending($im, true);
imagesavealpha($im, true);

imagealphablending($src_to_copy, true);
imagesavealpha($src_to_copy, true);

imagealphablending($pg, true);
imagesavealpha($pg, true);

$wc = ImageColorAllocate ($im, 255, 255, 255);
$red = ImageColorAllocate ($im, 255, 0, 0);
$blk = imagecolorallocate($im, 0, 0, 0);


imagecopy($im, $src_to_copy, 1300, 100, 0, 0, 0, 0);
imagecopy($im, $pg, 110, 669, 0, 0, 64, 110);
imagecopy($im, $beneden, 421, 275, 0, 0, 64, 110);
imagecopy($im, $staff_arjan, 400, 700, 0, 0, 64, 110);
imagecopy($im, $staff_locus, 530, 700, 0, 0, 64, 110);
imagecopy($im, $staff_gertlilly, 490, 700, 0, 0, 64, 110);
imagecopy($im, $staff_timo, 615, 700, 0, 0, 64, 110);
imagecopy($im, $staff_ilkay, 570, 700, 0, 0, 64, 110);
imagecopy($im, $staff_lara, 423, 711, 0, 0, 64, 110);
imagecopy($im, $staff_citroen, 470, 630, 0, 0, 64, 110);
imagecopy($im, $staff_don, 330, 630, 0, 0, 64, 110);

imagettftext($im, 19, 0, 550, 300, $blk, $font , "Welkom op Glipper,");
imagettftext($im, 19, 0, 550, 330, $blk, $font , "" . $username . "!");
if($get[0] != 0)
{
	imagettftext($im, 8, 0, 550, 360, $blk, $font , "Je laatste login was " . $d1 . " " . $d2 . "");
	imagettftext($im, 8, 0, 550, 375, $blk, $font , "We hebben je gemist!");
		imagettftext($im, 8, 0, 550, 400, $blk, $font , 'Je hebt ' . $vippunten[1] . ' VIP Punten & ' . $vippunten[0] . ' Credits!');
}
else
{
	imagettftext($im, 12, 0, 45, 310, $blk, $font , "Welkom bij Glipper!");
	imagettftext($im, 12, 0, 45, 330, $blk, $font , "Veel plezier");
}



header("Content-Type: image/png");
Imagepng($im);
ImageDestroy ($im);
?>