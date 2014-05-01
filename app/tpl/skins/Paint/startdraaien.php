<?php
$userid = $_SESSION['user']['id'];
$dj = mysql_query("SELECT user_id,onair FROM `dj` WHERE `user_id` = '$userid'");

if (mysql_num_rows($dj) >= '1')
{
	$pers = mysql_fetch_object($dj);
	$iedereen = mysql_num_rows(mysql_query("SELECT user_id,onair FROM `dj` WHERE `onair` = '1'"));
	if ($pers->onair == '0' && $iedereen == '0')
	{
		mysql_query("UPDATE `dj` SET `onair` = '1' WHERE `user_id` = '$userid'");
		header("Location: index.php?url=radio");
	}
	else
	{
		header("Location: index.php?url=radio&error=start");
	}
}
else
{
	header("Location: index.php?url=me");
}
?>