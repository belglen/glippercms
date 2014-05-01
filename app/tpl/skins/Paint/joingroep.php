<?php
 $ip = htmlspecialchars($_GET['id']); 
 $userid = $_SESSION['user']['id'];

//vars
$query = mysql_query("SELECT * FROM groups WHERE id = '".$ip."'");
$data = mysql_query("SELECT * FROM group_memberships WHERE groupid = '".$ip."' AND userid = '".$userid."'");
$joiin = mysql_fetch_array($query);
$qu = mysql_query("SELECT * FROM groups WHERE id = '".$ip."'");
	if (mysql_num_rows($qu) <= 0) {
		header("Location: index.php?url=notfound");
	}	if (mysql_num_rows($data) == 1 || mysql_num_rows($data) == 2 || mysql_num_rows($data) == 3 || mysql_num_rows($data) == 4 || mysql_num_rows($data) == 5 || mysql_num_rows($data) == 6) {
		header("Location: index.php?url=notfound");
	} else {
if($joiin['locked'] != 'open'){
		die('Fout bij het invoeren. De groep is niet open.');
}else{
    // $sql = "";
    // $sql = "UPDATE `groups` SET desc='".$desc."' WHERE id = '".$group."'";
 $sql = "INSERT INTO `group_memberships` VALUES ('".$ip."', '".$userid."')";    
    if(mysql_query($sql)){
		echo '<script>javascript:history.back(-1);</script>';
		// echo $sql;
		// mysql_query("");
		// mysql_query("UPDATE `groups` SET locked='".$locked."' WHERE id = '".$group."'");
		// mysql_query("UPDATE `groups` SET name='".$name."' WHERE id = '".$group."'");
    }else{
        echo '<strong>Error:</strong> '.mysql_error();
    }
}
}
?>