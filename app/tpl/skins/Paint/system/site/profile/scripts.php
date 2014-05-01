<?php
$pers = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$pers->username'"));
$userid = $_SESSION['user']['id'];
$data = mysql_fetch_object(mysql_query("SELECT id, username, motto, rank, credits, vip_points, activity_points, look, account_created, last_online FROM `users` WHERE `id`='$userid'"));

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

$bestaat = mysql_query("SELECT * FROM `users` WHERE `username`='$id'");
$bestaat2 = mysql_query("SELECT * FROM `users` WHERE `username`='$data->username'");
if(mysql_num_rows($bestaat) == 0)
{
	if(mysql_num_rows($bestaat2) == 1)
	{
		$exists = 1;
		$pers = mysql_fetch_object($bestaat2);
		$datas = mysql_fetch_object(mysql_query("SELECT id, OnlineTime FROM `user_stats` WHERE `id`='$pers->id'"));
		$jour = mysql_num_rows(mysql_query("SELECT user_id, achievement_id FROM `user_achievements` WHERE `user_id`='$pers->id' AND achievement_id = '59'"));
		$dj = mysql_fetch_object(mysql_query("SELECT user_id, rank FROM `dj` WHERE `user_id`='$pers->id'"));
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
	$datas = mysql_fetch_object(mysql_query("SELECT id, OnlineTime FROM `user_stats` WHERE `id`='$pers->id'"));
	$jour = mysql_num_rows(mysql_query("SELECT user_id, achievement_id FROM `user_achievements` WHERE `user_id`='$pers->id' AND achievement_id = '59'"));
	$dj = mysql_fetch_object(mysql_query("SELECT user_id, rank FROM `dj` WHERE `user_id`='$pers->id'"));
	$bans = mysql_fetch_object(mysql_query("SELECT user_id,bans FROM user_info WHERE user_id=".$pers->id));
}

	$image = "http://www.habbo.nl/habbo-imaging/avatarimage?direction=4&head_direction=3&gesture=sml&figure=".$pers->look."&action=crr=667";
?>