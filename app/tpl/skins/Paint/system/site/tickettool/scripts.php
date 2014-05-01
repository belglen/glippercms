<?php

$usertje = new User($_SESSION['user']['id']);

$pers = mysql_fetch_object(mysql_query("SELECT * FROM helptool_tickets WHERE id='$pers->id'"));

$url = $_SERVER["REQUEST_URI"];
$QUERYVAR= parse_url($url, PHP_URL_QUERY);
$GETVARS = explode('&',$QUERYVAR);

$chet = 0;

foreach($GETVARS as $string){
     list($is,$code) = explode('=',$string);
	 if($is == "id")
	 {
	 	$id = $code;
	 }
	 if($is == "p")
	 {
	 	$p = $code;
	 }
}

$id = (int)clean($id);

$bestaat = mysql_query("SELECT ht.*, u.*, u.id AS uid FROM `helptool_tickets` ht JOIN `users` u ON (ht.id = $id AND ht.user_id = u.id)");
if(mysql_num_rows($bestaat) == 0)
{
	$exists = 0;
	$macht = 0;
}
else
{
	$exists = 1;
	$pers = mysql_fetch_object($bestaat);
	if ($pers->user_id == $_SESSION['user']['id'] || $usertje->isStaff == '1')
	{
		$macht = 1;
		$image = "http://www.habbo.nl/habbo-imaging/avatarimage?direction=4&head_direction=3&gesture=sml&figure=".$pers->look;
		$msg = nl2br($pers->message);
		$msg = str_replace("<br /><br />", "<br />", $msg);
		
		$pers1 = mysql_query("SELECT * FROM helptool_tickets_reacties WHERE ticket_id='$id' AND staff = '1'");
		$pers4 = mysql_query("SELECT * FROM helptool_tickets_reacties WHERE ticket_id='$id' AND staff = '1'");
		$rowss = mysql_num_rows($pers1)>0?'A':'B';
		
		$bestaatss = mysql_fetch_object(mysql_query("SELECT ht.*, ht.id AS hid, u.*, u.id AS uid FROM `helptool_tickets` ht JOIN `users` u ON (ht.id = $id AND ht.user_id = u.id)"));

		$statusje = strtolower($pers->status=='orange'?'Onbeantwoord':($pers->status=='green'?'beantwoord':'gesloten'));
		$openclose = $pers->status=='red'?'open':'close';
		$icons = $pers->status=='red'?'green':'red';
		$idkopenclose = ucfirst($pers->status=='red'?'open':'sluit');
		
		$checkadminidk = $usertje->isAdmin==1?"<a class='nodec' href='index.php?url=adminusers&ip=$pers->ip_last'><img src='app/tpl/skins/Paint/images/b_blue.png' > <span class='ticketA'>Check info</span></a>":'';
		
		if (isset($_GET['close']))
		{
			if ($usertje->isStaff == '1')
			{
				mysql_query("UPDATE `helptool_tickets` SET `status` = 'red' WHERE `id` = '$id'");
				header("Location: index.php?url=tickettool&id=$id");
			}
		}
		if (isset($_GET['open']))
		{
			if ($usertje->isStaff == '1')
			{
				mysql_query("UPDATE `helptool_tickets` SET `status` = 'green' WHERE `id` = '$id'");
				header("Location: index.php?url=tickettool&id=$id");
			}
		}
	}
	else
	{
		$macht = 0;	
	}
	$title = $macht==0?'Toegang verboden':substr($pers->subject, 0, 50) . " ($statusje)";
	$sidenav = $usertje->isStaff==0
	?
	"<img src='app/tpl/skins/Paint/images/b_green.png' > Ticket geantwoord <br />
		<img src='app/tpl/skins/Paint/images/b_orange.png' > Ticket in wacht/in behandeling <br />
		<img src='app/tpl/skins/Paint/images/b_red.png' > Ticket gesloten
	"
	:
	(mysql_num_rows($pers4)>0?"<a class='nodec' href='index.php?url=tickettool&id=$id&$openclose'><img src='app/tpl/skins/Paint/images/b_$icons.png' > <span class='ticket$rowss'>$idkopenclose ticket</span></a><br />$checkadminidk":"<img src='app/tpl/skins/Paint/images/b_red.png' > <span class='ticket$rowss'>Sluit ticket</span><br />$checkadminidk")
	;
}
?>