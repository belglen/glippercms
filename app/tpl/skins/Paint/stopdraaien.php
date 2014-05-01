<?php
$userid = $_SESSION['user']['id'];
$dj = mysql_query("SELECT user_id,onair FROM `dj` WHERE `user_id` = '$userid'");

if (mysql_num_rows($dj) >= '1')
{
	$pers = mysql_fetch_object($dj);
	if ($pers->onair == '1')
	{
		mysql_query("UPDATE `dj` SET `onair` = '0' WHERE `user_id` = '$userid'");
		header("Location: index.php?url=radio");
	}
	else
	{
		header("Location: index.php?url=radio&error=stop");
	}
}
else
{
	header("Location: index.php?url=me");
}
?>