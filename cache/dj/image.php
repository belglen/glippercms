<?php

	header("Content-type: image/gif");
	$habbo = stripslashes(htmlspecialchars($_GET['habbo']));
    $im = @ imagecreate("169", "145") or die();

    $transparant= imagecolorallocate($im, 51, 80, 124);
	ImageColorTransparent($im, $transparant); 

    $habbo2 = imagecreatefromgif("http://www.habbo.nl/habbo-imaging/avatarimage?hb=img&figure=$habbo&action=wav,drk=0&gesture=sml&size=b&direction=4&head_direction=2&img_format=gif");
    imagecopy($im, $habbo2, 89, -8, 0, 0, 160, 200);

// Get Disco-image and place the image
    $home = imagecreatefromgif("images/disco.gif");
    imagecopy($im, $home, 0, 14, 0, 0, 169, 200);


// Create Image
imagegif($im);

// Destroy headers
imagedestroy($im);

// END
?>