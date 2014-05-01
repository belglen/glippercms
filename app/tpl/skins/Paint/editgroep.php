<?php

//vars
$name = nl2br(stripslashes(strip_tags($_POST['groepnaam'])));
$desc = nl2br(stripslashes(strip_tags($_POST['beschrijf'])));
$locked = nl2br(stripslashes(strip_tags($_POST['status'])));
$group = nl2br(stripslashes(strip_tags($_POST['groupid'])));
// $badge = nl2br(stripslashes(strip_tags($_POST['badge'])));
// $room = nl2br(stripslashes(strip_tags($_POST['room'])));
//vars
 
if($name == "" || $desc == ""  || $locked == ""){
    echo 'Vul alle velden in!<br><br>Klik <a href="javascript:history.back(-1);">hier</a> om het opnieuw te proberen.';
}else{
    // $sql = "";
    // $sql = "UPDATE `groups` SET desc='".$desc."' WHERE id = '".$group."'";
	$sql = "UPDATE `groups` SET `desc`='".$desc."' WHERE (`id`='".$group."')";
    if(mysql_query($sql)){
		echo '<script>javascript:history.back(-1);</script>';
		// echo $sql;
		// mysql_query("");
		mysql_query("UPDATE `groups` SET locked='".$locked."' WHERE id = '".$group."'");
		mysql_query("UPDATE `groups` SET name='".$name."' WHERE id = '".$group."'");
    }else{
        echo '<strong>Error:</strong> '.mysql_error();
    }
}
?>