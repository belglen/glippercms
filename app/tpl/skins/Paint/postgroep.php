<?php
//vars
$name = nl2br(stripslashes(strip_tags($_POST['groepnaam'])));
$desc = nl2br(stripslashes(strip_tags($_POST['beschrijf'])));
$locked = nl2br(stripslashes(strip_tags($_POST['status'])));
$badge = nl2br(stripslashes(strip_tags($_POST['badge'])));
$room = nl2br(stripslashes(strip_tags($_POST['room'])));
$ip = $_GET['id'];
//vars
$detectLOL = mysql_query("SELECT * FROM cms_groepen_badges WHERE badgeid = '$badge'");
if($name == "" || $desc == ""  || $locked == "" || $room == "" || $badge == ""){
    echo 'Vul alle velden in!<br><br>Klik <a href="javascript:history.back(-1);">hier</a> om het opnieuw te proberen.';
}else{
	if (mysql_num_rows($detectLOL) == '1')
	{
		$sql = "INSERT INTO `groups` (`name`, `desc`, `badge`, `ownerid`, `created`, `roomid`, `locked`, `privacy`) VALUES ('" . $name. "', '".$desc."', '".$badge."', '" . $_SESSION['user']['id']. "', '', '" . $room. "', '" . $locked. "', '');";
		if(mysql_query($sql)){
			echo '<script>javascript:history.back(-1);</script>';
		}else{
			echo '<strong>Error:</strong> '.mysql_error();
		}
    }
}
?>