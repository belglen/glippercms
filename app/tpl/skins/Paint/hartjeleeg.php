<?php
include "system/scripts.php";
//vars
$ip = htmlspecialchars($_GET["id"]);
$sql1 = mysql_query("SELECT * FROM group_memberships WHERE userid = '" . $userid . "' AND groupid = '".htmlspecialchars($_GET["id"])."'");
//vars
	$qu = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
		$qs = mysql_fetch_assoc($qu);
 if (mysql_num_rows($qu) == 0) {
		echo '<script>javascript:history.back(-1);</script>';
}
if(mysql_num_rows($sql1) == 0 && $qs['ownerid'] != $userid){
		echo '<script>javascript:history.back(-1);</script>';
}else{
    $sql = "UPDATE `user_stats` SET groupid='".$ip."' WHERE id = '".$userid."'";
    if(mysql_query($sql)){
		echo '<script>javascript:history.back(-1);</script>';
    }else{
		echo '<script>javascript:history.back(-1);</script>';
    }
}
?>