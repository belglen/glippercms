<?php
include "system/scripts.php";
$ip = htmlspecialchars($_GET['id']);
$user = htmlspecialchars($_GET['user']);
$query = mysql_query("SELECT * FROM groups WHERE id = '" . $ip . "'");
$ikkeee = mysql_fetch_assoc($query);
$query5 = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . $ip . "' AND userid = '".$user."'");

	if ($ikkeee['ownerid'] == $userid && isset($_GET['id'])) {
		if (mysql_num_rows($query5) == '1') {
			$sql = "DELETE FROM group_memberships WHERE groupid = '".$ip."' AND userid = '".$user."'";
			if(mysql_query($sql)){
header("Location: index.php?url=groepedit&id=$ip");
			}else{
				echo '<strong>Error:</strong> '.mysql_error();

			}
		}
	}else{
		header("Location: /index");
	}
	// echo $_POST['allow'];
?>