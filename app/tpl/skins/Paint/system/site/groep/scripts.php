<?php
$pers = mysql_fetch_object(mysql_query("SELECT * FROM `groups` WHERE `id` = '$pers->id'"));
$userid = $_SESSION['user']['id'];
$data = mysql_fetch_object(mysql_query("SELECT * FROM `groups` WHERE `ownerid` = '$userid' LIMIT 1"));

$url = $_SERVER["REQUEST_URI"];
$QUERYVAR= parse_url($url, PHP_URL_QUERY);
$GETVARS = explode('&',$QUERYVAR);

$chet = 0;

foreach($GETVARS as $string){
     list($is,$code) = explode('=',$string);
	 if($is == "id")
	 {
	 	$id = $code;
	 }
	 if($is == "p")
	 {
	 	$p = $code;
	 }
}

$id = clean($id);

$bestaat = mysql_query("SELECT * FROM `groups` WHERE `id`='$id'");
$bestaat2 = mysql_query("SELECT * FROM `groups` WHERE `id`='$data->id'");
if(mysql_num_rows($bestaat) == 0)
{
	if(mysql_num_rows($bestaat2) == 1)
	{
		$exists = 1;
		$pers = mysql_fetch_object($bestaat2);
		$getmember = mysql_query("SELECT * FROM group_memberships WHERE groupid = '$pers->id'");
		$getreq = mysql_query("SELECT * FROM group_requests WHERE  groupid = '$pers->id'");
		$getowner = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = '$pers->ownerid'"));
		$getroom = mysql_fetch_object(mysql_query("SELECT id,caption FROM rooms WHERE id = '$pers->roomid'"));
	}
	else
	{
		$exists = 0;
	}
}
else
{
	$exists = 1;
	$pers = mysql_fetch_object($bestaat);
	$getmember = mysql_query("SELECT * FROM group_memberships WHERE groupid = '$pers->id'");
	$getreq = mysql_query("SELECT * FROM group_requests WHERE  groupid = '$pers->id'");
	$getowner = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = '$pers->ownerid'"));
	$getroom = mysql_fetch_object(mysql_query("SELECT id,caption FROM rooms WHERE id = '$pers->roomid'"));
}

	//$image = "app/tpl/skins/Paint/images/".$pers->bg;
	$badge = "r63/c_images/album1584/".$pers->badge.".gif";
	$image = "app/tpl/skins/Paint/images/groep/bg_colour_08.gif";
	$image_options = "app/tpl/skins/Paint/images/groep/bg_colour_08.gif";
?>