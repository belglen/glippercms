<?php$userid = $_SESSION['user']['id'];$data = mysql_fetch_object(mysql_query("SELECT *,UNIX_TIMESTAMP(`lastlogin`) AS `login` FROM `users` WHERE `id`='$userid'"));$datum = $data->login;$dag = date('j',$datum);$maand = date('n',$datum);$jaar = date('Y',$datum);$nudatum = time();$nudag = date('j',$nudatum);$numaand = date('n',$nudatum);$nujaar = date('Y',$nudatum);if($jaar < $nujaar){	//je bent vorig jaar ingelogd	$update = 1;}else if($maand < $numaand){	//je bent vorige maand ingelogd	$update = 1;}else if($dag < $nudag){	//je bent deze maand nog ingelogd, maar niet vandaag	$update = 1;}else{	//niks voor jou	$update = 0;}if($update == 1){	mysql_query("UPDATE `users` SET `lastlogin`=NOW() WHERE `id`='$data->id'");}$ip = $_SERVER['REMOTE_ADDR'];mysql_query("UPDATE `users` SET `ip_last` = '$ip' WHERE `id` = '$data->id'");  ?>