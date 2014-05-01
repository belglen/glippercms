<?php
$userid = $_SESSION['user']['id'];
$ip = htmlspecialchars($_GET['id']);
$query = mysql_query("SELECT * FROM groups WHERE id = '" . $ip . "'");
$ikkeee = mysql_fetch_assoc($query);
$query5 = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . $ip . "' AND userid = '".$userid."'");
$query9 = mysql_query("SELECT * FROM group_requests WHERE groupid = '" . $ip . "' AND userid = '".$userid."'");

	if ($ikkeee['ownerid'] != $userid && mysql_num_rows($query) == '0') {
		if (mysql_num_rows($query5) != '1') {
			if (mysql_num_rows($query9) != '1') {
				if ($ikkeee['locked'] == 'locked') {
					$sql = "INSERT INTO group_requests(groupid,userid) VALUES ('".$ip."', '".$userid."')";
						if(mysql_query($sql)){
							echo '<script>javascript:history.back(-1);</script>';
							// echo $sql;
						}else{
							echo '<strong>Error:</strong> '.mysql_error();
					}
				}
			}
		}
	}
	else
	{
		header("Location: /index");
	}
?>