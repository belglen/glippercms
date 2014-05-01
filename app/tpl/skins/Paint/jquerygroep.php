<?php
global $users;
if ((isset($_POST['naam']) && isset($_POST['desc'])) && (!empty($_POST['naam']) && !empty($_POST['desc'])) && $_POST['final'] == '1')
{
	$name = mysql_real_escape_string($_POST['naam']);
	$desc = mysql_real_escape_string($_POST['desc']);
	if ((strlen($_POST['desc']) > 255 || strlen($_POST['name']) >= 40))
	{

	}
	else
	{
		if ((empty($_POST['naam']) || empty($_POST['desc'])))
		{
			
		}
		else
		{
			mysql_query("INSERT INTO `groups` (`name`, `desc`, `badge`, `ownerid`, `created`, `roomid`, `locked`, `privacy`) VALUES ('$name', '$desc', 'NRML', '" . $_SESSION['user']['id']. "', '', '0', 'locked', '');");
		}
	}
}
if ((isset($_POST['ownerid']) && isset($_POST['id'])) && ($_POST['sec'] == '1' && $_POST['del'] == '1'))
{
	$ownerid = (int)mysql_real_escape_string($_POST['ownerid']);
	$groupid = (int)mysql_real_escape_string($_POST['id']);
	$userid = (int)$_SESSION['user']['id'];
	
	$select = mysql_query("SELECT * FROM `groups` WHERE `ownerid` = '$userid' AND `id` = '$groupid'");
	
	if (($_POST['ownerid'] == $userid && mysql_num_rows($select) == '1'))
	{
		// <!--
		mysql_query("DELETE FROM `groups` WHERE `id` = '$groupid' AND `ownerid` = '$userid'");
		// -->
	}
}
if ((isset($_POST['groepsnaam']) && isset($_POST['groepstext']) && isset($_POST['id']) && isset($_POST['groepstype'])) && (!empty($_POST['id']) && !empty($_POST['groepsnaam']) && !empty($_POST['groepstext'])) && ($_POST['edit'] == '1'))
{
	echo"xd";
	$groupid = (int)mysql_real_escape_string($_POST['id']);
	$groepsnaam = mysql_real_escape_string($_POST['groepsnaam']);
	$groepstext = mysql_real_escape_string($_POST['groepstext']);
	$groepstype = mysql_real_escape_string($_POST['groepstype']);
	$userid = (int)$_SESSION['user']['id'];
	
	$select = mysql_query("SELECT * FROM `groups` WHERE `ownerid` = '$userid' AND `id` = '$groupid'");
	
	if ((mysql_num_rows($select) == '1') && ((strlen($_POST['groepsnaam']) < 40 && strlen($_POST['groepsnaam']) > 0) && (strlen($_POST['groepstext']) < 255 && strlen($_POST['groepstext']) > 0)))
	{
		echo"xd";
		mysql_query("UPDATE `groups` SET `name` = '$groepsnaam', `desc` = '$groepstext', `locked` = `$groepstype` WHERE `ownerid` = '$userid' AND `id` = '$groupid'");
	}
}
if ((isset($_POST['type']) && isset($_POST['subject']) && isset($_POST['message'])) && ($_POST['helptool'] == '1'))
{
	$type = (int)mysql_real_escape_string($_POST['type']);
	
	$subject = str_replace('`', " undefined ", $_POST['subject']);
	$subject = str_replace("'", " undefined ", $subject);
	$subject = str_replace('"', " undefined ", $subject);
	$subject = htmlentities(mysql_real_escape_string($subject));
	
	$message = str_replace('`', " undefined ", $_POST['message']);
	$message = str_replace("'", " undefined ", $message);
	$message = str_replace('"', " undefined ", $message);
	$message = mysql_real_escape_string(nl2br($message));
		
	if ((ctype_digit($_POST['type'])) && (!empty($_POST['type'])) && ($_POST['type'] > 0 && $_POST['type'] < 7))
	{
		// type checked
		if ((strlen($_POST['subject']) >= 10 && !empty($_POST['subject']) && strlen($_POST['subject']) <= 70))
		{
			// subject checked
			if ((!empty($_POST['message']) && strlen($_POST['message']) >= 40) && (strlen($_POST['message']) < 500))
			{
				if (isset($_SESSION['user']['id']))
				{
					mysql_query("INSERT INTO helptool_tickets(user_id, subject, message, status, type) VALUES ('".$_SESSION['user']['id']."', '$subject', '$message', 'orange', '$type')");
					$idtje = mysql_insert_id();
					mysql_query("INSERT INTO user_activity(user_id, activity, buy, tijd) VALUES ('".$_SESSION['user']['id']."', 'ticket (ID $idtje)', '0', NOW())");
				}
			}
		}
	}
}
if ((isset($_POST['text1']) && isset($_POST['ticketid']) && isset($_POST['reaction'])))
{
	echo'lol';
	$userid = $_SESSION['user']['id'];
	$text1 = mysql_real_escape_string(nl2br($_POST['text1']));
	$ticketid = (int)mysql_real_escape_string($_POST['ticketid']);
	$salt = sha1(md5("$ticketid - $text1 -> GlipperCMS => ticketsystem"))." - GlipperCMS";
	
	if (ctype_digit($_POST['ticketid']) && ctype_digit($_POST['reaction']) && $_POST['reaction'] == 1) 
	{
		echo'lol';
		if (strlen($_POST['text1']) >= 2 || strlen($_POST['text1']) != '')
		{
			echo'lol';
			$pers = mysql_fetch_object(mysql_query("SELECT id, username,rank FROM users WHERE id='".$_SESSION['user']['id']."'"));
			$pers2 = mysql_query("SELECT * FROM helptool_tickets WHERE id='$ticketid'");
			
			if (mysql_num_rows($pers2) == 1)
			{
				echo'lol';
				$pers11 = mysql_fetch_object($pers2);
				if (($pers11->user_id == $_SESSION['user']['id'] || $pers->rank > 6) && $pers11->status != 'red')
				{
					echo $text1."       ";
					echo'lol';
					$isStaffie = $pers->rank>6?'1':'0';
					mysql_query("INSERT INTO helptool_tickets_reacties(ticket_id, user_id, salt, message, staff) VALUES ('$ticketid', '$userid', '$salt', '$text1', '$isStaffie')");	
					if ($isStaffie == '1')
					{
						mysql_query("UPDATE `helptool_tickets` SET `status` = 'green'");	
					}
				}
			}
		}
	}
}
?>