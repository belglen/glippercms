<?php
error_reporting(0);
$connect = mysql_connect("db.glipper.be","root","FCDKfun1");
if (!$connect)
{
	die('Kan niet connecteren naar de Glipper database. Kom later terug!');
}
mysql_select_db("newbut", $connect);
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}
	function detect_mobile()
	{
		if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	$mobile = detect_mobile();

	if($mobile === false)
	{
		header('Location: http://cms.glipper.be:8079/');
	}
?>