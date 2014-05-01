<?php
include "system/scripts.php";
$ip = htmlspecialchars($_GET['id']);
$user = htmlspecialchars($_GET['user']);
$query = mysql_query("SELECT * FROM groups WHERE id = '" . $ip . "'");
$ikkeee = mysql_fetch_assoc($query);
$query5 = mysql_query("SELECT * FROM group_requests WHERE groupid = '" . $ip . "' AND userid = '".$user."'");

	if ($ikkeee['ownerid'] == $userid) {
		if (mysql_num_rows($query5) == '1') {
			$sql = "DELETE FROM group_requests WHERE groupid = '" . $ip . "' AND userid = '".$user."'";
			if(mysql_query($sql)){
				echo '<script>javascript:history.back(-1);</script>';
				mysql_query("INSERT INTO group_memberships VALUES ('".$ip."', '".$user."')");
			}else{
				echo '<strong>Error:</strong> '.mysql_error();

			}
		}
	}
?>