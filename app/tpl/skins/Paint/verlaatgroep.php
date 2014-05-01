<?php
include "system/scripts.php";
$ip = htmlspecialchars($_GET['id']);
$query = mysql_query("SELECT * FROM groups WHERE id = '" . $ip . "'");
$ikkeee = mysql_fetch_assoc($query);
$query5 = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . $ip . "' AND userid = '".$userid."'");

	if ($ikkeee['ownerid'] != $userid) {
		if (mysql_num_rows($query5) == '1') {
			$sql = "DELETE FROM group_memberships WHERE groupid = '".$ip."' AND userid = '".$userid."'";
			if(mysql_query($sql)){
				echo '<script>javascript:history.back(-1);</script>';
			}else{
				echo '<strong>Error:</strong> '.mysql_error();

			}
		}
	}
?>