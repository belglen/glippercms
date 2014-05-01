<?php
include "app/tpl/skins/Paint/system/scripts.php";
$ip = htmlspecialchars($_GET['id']);
$tnt = htmlspecialchars($_GET['tnt']);
$query = mysql_query("SELECT * FROM groups WHERE id = '" . $ip . "'");
$ikkeee = mysql_fetch_assoc($query);

if ($tnt == '56') {
	if ($ikkeee['ownerid'] == $userid) {
		$sql = "DELETE FROM group_memberships WHERE groupid = '".$ip."'";
		if(mysql_query($sql)){
			header("Location: groepen");
			mysql_query("DELETE FROM groups WHERE id = '".$ip."'");
		}else{
			echo '<strong>Error:</strong> '.mysql_error();
		}
	}
} else {
	header("Location: index.php?url=index");	
	exit;
}
?>