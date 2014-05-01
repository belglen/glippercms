<?php
include "system/scripts.php";
    $sql = "UPDATE `user_stats` SET groupid='0' WHERE id = '".$userid."'";
    if(mysql_query($sql)){
		echo '<script>javascript:history.back(-1);</script>';
    }else{
		echo '<script>javascript:history.back(-1);</script>';
    }
?>