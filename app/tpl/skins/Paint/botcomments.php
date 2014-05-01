<?php
include 'system/header.php';
include 'inc/shopnav.php'; 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-content"> 
<img style="margin-top: -2px;" src="{url}/r63/c_images/album1584/BOT.gif" align="right"></img>
<strong>Melding:</strong> Gebruik na het updaten van je bot het commando <i>:update_bots</i> en <i>:unload</i> jouw kamer. De update zal dan na enkele ogenblikken worden uitgevoerd.
</div></div>  
<br />
  <?php
  if ($_POST['botid'] && $_POST['trigger'] && $_POST['reactie'] && $_POST['mode'] && isset($_POST['serve_id']) && $_POST['buy']) {
	$botid = filter($_POST['botid']);
	$trigger = filter($_POST['trigger']);
	$reactie = filter($_POST['reactie']);
	$mode = filter($_POST['mode']);
	$serve_id = filter($_POST['serve_id']);
		if ($botid != '0' || $botid != '') {
			if ($trigger != '') {
				if ($reactie != '') {
	$data = mysql_query("SELECT * FROM user_bots WHERE user_id = '".$userid."' AND bot_id = '$botid'");
	if ($botid != 0 && mysql_num_rows($data) != "") {
		$new_text = mysql_query("INSERT INTO bots_responses(bot_id,keywords,response_text,mode,serve_id) VALUES ('$botid','$trigger','$reactie','$mode', '$serve_id')");
		if (mysql_errno()) {
			echo 'Insert failed ['.mysql_errno().']: ' . mysql_error();
			return;
		}	
		// $new_bot_id = mysql_insert_id();
	// echo 'Inserted new bot ['.$new_bot_id.']';
		// $sql = "insert into user_bots(user_id, bot_id)"
			// . " values($userid, $new_bot_id)";
		// $new_user_bot = mysql_query($sql);	
		// if (mysql_errno()) {
			// echo 'Insert2 failed for Q"'.$sql.'"Q ['.mysql_errno().']: ' . mysql_error();
			// return;
		// }
		// $update_user = mysql_query("update users set vip_points=vip_points-$bot_cost where id=$userid");
	}
	}
	}
}
}
?>
<?php
if (isset($_POST['buy'])) {
?>
<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
Je reactie is succesvol toegevoegd!
  </div>
</div>
<br>
<?php
header("refresh:5;url=index.php?url=botcomments");
}
  ?>
  <?php
  if (isset($_POST['change'])) {
?>
<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
Je reactie is succesvol aangepast!
  </div>
</div>
<br>
<?php
header("refresh:2;url=index.php?url=botcomments");
}
  ?>
  <?php
  if (isset($_POST['buy2'])) {
?>
<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
<?php
if ($_POST['botid'] != '0') {
?>
Je tekst is succesvol toegevoegd!
<?php
}
else
{
?>
Je tekst is helaas <b>niet</b> toegevoegd! Geen geldige robot geslecteerd.
<?php
}
?>
  </div>
</div>
<br>
<?php
header("refresh:2;url=index.php?url=botcomments");
}
  ?>

<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Reactie toevoegen</h2> 
</div> 
<div class="content-box-content"> 

<div style="margin-top: 10px;">

<table width="100%">
<form method="post">

<tr><td>Robot</td>
<td><select name="botid">
<option value="0">-- Selecteer robot --</option>
<?php
$data = mysql_query("SELECT * FROM user_bots WHERE user_id = '".$userid."'");
while ($dat = mysql_fetch_assoc($data)) {
$rooms = mysql_query("SELECT * FROM bots WHERE id = '".$dat['bot_id']."'");
if (mysql_num_rows($data) == 0) {
	echo '<option value="0">-- Je hebt nog geen robot --</option>';
} else {
	while ($room = mysql_fetch_assoc($rooms)) {
		echo '<option value="'.$room['id'].'">'.filter($room['name']).'</option>'."\n";
	}
}	
}

?>
</select>
</td>
</tr>
<tr><td>Woorden die zinnen triggeren (hoi;hallo;hey)</td>
<td><input type="text" name="trigger"></td>
</tr>
<tr><td>De reactie op bovenstaande woord(en)</td>
<td>
<input type="text" name="reactie">
</td></tr>
<tr><td>Modus</td>
<td>
<select name="mode">
<option value="say">Zeggen</option>
<option value="shout">Roepen</option>
<option value="whisper">Fluisteren</option>
</select>
</td>
</tr>
<tr><td>Serveren</td>
<td>
<select name="serve_id">
<option value="0">Niets serveren</option><option value="1">Thee</option><option value="2">Sap</option><option value="3">Wortel</option><option value="4">Ijsje</option><option value="5">Melk</option><option value="6">Zwarte bes</option><option value="7">Water</option><option value="8">Koffie</option><option value="9">Decaff</option><option value="10">Latte</option><option value="11">Mocha</option><option value="12">Macchiato</option><option value="13">Espresso</option><option value="14">Filter</option><option value="15">Iced</option><option value="16">Cappuccino</option><option value="17">Java</option><option value="18">Tap</option><option value="19">{hotelName} Cola</option><option value="20">Camera</option><option value="21">Pizza</option><option value="22">Limoen {hotelName} Soda</option><option value="23">Rode Bieten {hotelName} Soda</option><option value="24">Bubbel Drank van 1990</option><option value="25">Iets rozes</option></select>
</td>
</tr>

<tr><td></td><td>
<input type="submit" class="glipperflexbtn" name="buy" value="Voeg toe">
</td></tr>
</form>
</table>


<div style="margin-bottom:10px"></div>

</div>
  </div>
</div>
<br />
<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Reacties</h2> 
</div> 
<div class="content-box-content"> 
<table width="100%">
<?php
	if (isset($_POST['delreactie'])) {
	$botid = filter($_POST['bot_id']);
	$responseid = filter($_POST['re_id']);
	mysql_query("DELETE FROM bots_responses WHERE bot_id = $botid AND id = $responseid");
	}
	echo "<tr><th>Bot</th><th>Triggers</th><th>Reactie</th><th>Aanpassen</th><th>Verwijder</th></tr>\n";
$bots = mysql_query("select b.id as bid, b.name as bname,br.* from user_bots ub, bots b, bots_responses br where b.id=ub.bot_id and br.bot_id=b.id and user_id = $userid order by b.id desc");		while ($bot = mysql_fetch_assoc($bots)) {
		echo '<tr>'; 
		echo '<td>'.$bot['bname'].'</td>';
		echo '<td>'.$bot['keywords'].'</td>';
		echo '<td>'.$bot['response_text'].'</td>';
		echo '<td><form method="POST"><input type="hidden" name="bot_id" value="'.$bot['bid'].'"><input type="hidden" name="re_id" value="'.$bot['id'].'">';
		echo '<input type="submit" class="glipperflexbtn" value="Pas aan" name="pasaan"></form></td>';
		echo '<td><form method="POST"><input type="hidden" name="bot_id" value="'.$bot['bid'].'"><input type="hidden" name="re_id" value="'.$bot['id'].'">';
		echo '<input type="submit" class="glipperflexbtn" value="Verwijder" name="delreactie"></form></td>';
		echo "</tr>\n";
	}

?>
</table>
</div>
  </div>
<br>
<?php
  if ($_POST['botid'] && $_POST['trigger'] && $_POST['reactie'] && $_POST['mode'] && $_POST['serve_id'] && $_POST['change']) {
	$botid = filter($_POST['botid']);
	$sql = mysql_query("SELECT * FROM bots_responses WHERE bot_id = '$botid'");
		$res = mysql_fetch_assoc($sql);
	$trigger = filter($_POST['trigger']);
	$reactie = filter($_POST['reactie']);
	$mode = filter($_POST['mode']);
	$serve_id = filter($_POST['serve_id']);
	$sql = "UPDATE bots_responses SET keywords='$trigger',response_text='$reactie',mode='$mode',serve_id='$serve_id' WHERE bot_id = '$botid' AND id = '".$res['id']."'";
    if(mysql_query($sql)){
		// header("Location: index.php?url=botcomments");
	}
	// die("Unable to connect to");
}
if (isset($_POST['pasaan'])) {
	
	$botid = filter($_POST['bot_id']);
	$responseid = filter($_POST['re_id']);

?>
<div class="content-box"> 

	  <div class="content-box-deep-blue"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Pas aan</h2> 

	  </div> 

	  <div class="content-box-content"> 
<table width="100%">
<form method="post">

<tr><td>Robot</td>
<td><select name="botid">
<?php
$rooms = mysql_query("SELECT * FROM bots WHERE id = '".$botid."'");
$rooms5 = mysql_query("SELECT * FROM bots_responses WHERE id = '".$responseid."'");
	$room = mysql_fetch_assoc($rooms);
	$room5 = mysql_fetch_assoc($rooms5);
		echo '<option value="'.$room['id'].'" readonly="readonly">'.filter($room['name']).'</option>'."\n";
?>
</select>
</td>
</tr>
<tr><td>Woorden die zinnen triggeren (hoi;hallo;hey)</td>
<td><input type="text" name="trigger" value="<?php echo $room5['keywords']; ?>"></td>
</tr>
<tr><td>De reactie op bovenstaande woord(en)</td>
<td>
<input type="text" name="reactie" value="<?php echo $room5['response_text']; ?>">
</td></tr>
<tr><td>Modus</td>
<td>
<select name="mode">
<option value="say" <?php if ($room5['mode'] == 'say') {echo 'selected="selected"';} ?>>Zeggen</option>
<option value="shout" <?php if ($room5['mode'] == 'shout') {echo 'selected="selected"';} ?>>Roepen</option>
<option value="whisper" <?php if ($room5['mode'] == 'whisper') {echo 'selected="selected"';} ?>>Fluisteren</option>
</select>
</td>
</tr>
<tr><td>Serveren</td>
<td>
<select name="serve_id">
<option value="0" <?php if ($room5['serve_id'] == '0') {echo 'selected="selected"';} ?>>Niets serveren</option>
<option value="1" <?php if ($room5['serve_id'] == '1') {echo 'selected="selected"';} ?>>Thee</option>
<option value="2" <?php if ($room5['serve_id'] == '2') {echo 'selected="selected"';} ?>>Sap</option>
<option value="3" <?php if ($room5['serve_id'] == '3') {echo 'selected="selected"';} ?>>Wortel</option>
<option value="4" <?php if ($room5['serve_id'] == '4') {echo 'selected="selected"';} ?>>Ijsje</option>
<option value="5" <?php if ($room5['serve_id'] == '5') {echo 'selected="selected"';} ?>>Melk</option>
<option value="6" <?php if ($room5['serve_id'] == '6') {echo 'selected="selected"';} ?>>Zwarte bes</option>
<option value="7" <?php if ($room5['serve_id'] == '7') {echo 'selected="selected"';} ?>>Water</option>
<option value="8" <?php if ($room5['serve_id'] == '8') {echo 'selected="selected"';} ?>>Koffie</option>
<option value="9" <?php if ($room5['serve_id'] == '9') {echo 'selected="selected"';} ?>>Decaff</option>
<option value="10" <?php if ($room5['serve_id'] == '10') {echo 'selected="selected"';} ?>>Latte</option>
<option value="11" <?php if ($room5['serve_id'] == '11') {echo 'selected="selected"';} ?>>Mocha</option>
<option value="12" <?php if ($room5['serve_id'] == '12') {echo 'selected="selected"';} ?>>Macchiato</option>
<option value="13" <?php if ($room5['serve_id'] == '13') {echo 'selected="selected"';} ?>>Espresso</option>
<option value="14" <?php if ($room5['serve_id'] == '14') {echo 'selected="selected"';} ?>>Filter</option>
<option value="15" <?php if ($room5['serve_id'] == '15') {echo 'selected="selected"';} ?>>Iced</option>
<option value="16" <?php if ($room5['serve_id'] == '16') {echo 'selected="selected"';} ?>>Cappuccino</option>
<option value="17" <?php if ($room5['serve_id'] == '17') {echo 'selected="selected"';} ?>>Java</option>
<option value="18" <?php if ($room5['serve_id'] == '18') {echo 'selected="selected"';} ?>>Tap</option>
<option value="19" <?php if ($room5['serve_id'] == '19') {echo 'selected="selected"';} ?>>{hotelName} Cola</option>
<option value="20" <?php if ($room5['serve_id'] == '20') {echo 'selected="selected"';} ?>>Camera</option>
<option value="21" <?php if ($room5['serve_id'] == '21') {echo 'selected="selected"';} ?>>Pizza</option>
<option value="22" <?php if ($room5['serve_id'] == '22') {echo 'selected="selected"';} ?>>Limoen {hotelName} Soda</option>
<option value="23" <?php if ($room5['serve_id'] == '23') {echo 'selected="selected"';} ?>>Rode Bieten {hotelName} Soda</option>
<option value="24" <?php if ($room5['serve_id'] == '24') {echo 'selected="selected"';} ?>>Bubbel Drank van 1990</option>
<option value="25" <?php if ($room5['serve_id'] == '25') {echo 'selected="selected"';} ?>>Iets rozes</option></select>
</td>
</tr>

<tr><td></td><td>
<input type="submit" class="glipperflexbtn" name="change" value="Pas aan">
</td></tr>
</form>
</table>


	  </div></div><br>
<?php }?>  
  <?php
  if ($_POST['botid'] &&$_POST['zegtekst'] && isset($_POST['modus']) && $_POST['buy2']) {
	$botid = filter($_POST['botid']);
	$zegtekst = filter($_POST['zegtekst']);
	$modus = filter($_POST['modus']);
	// $mode = filter($_POST['mode']);
	// $serve_id = filter($_POST['serve_id']);
		if ($botid != '0' || $botid != '') {
			if ($zegtekst != '') {
				if ($modus != '') {
	$data = mysql_query("SELECT * FROM user_bots WHERE user_id = '".$userid."' AND bot_id = '$botid'");
	if ($botid != 0 && mysql_num_rows($data) != "") {
		$newtext = mysql_query("INSERT INTO bots_speech VALUES ('$botid','$zegtekst','$modus')");
		if (mysql_errno()) {
			echo 'Insert failed ['.mysql_errno().']: ' . mysql_error();
			return;
		}	
		// $new_bot_id = mysql_insert_id();
	// echo 'Inserted new bot ['.$new_bot_id.']';
		// $sql = "insert into user_bots(user_id, bot_id)"
			// . " values($userid, $new_bot_id)";
		// $new_user_bot = mysql_query($sql);	
		// if (mysql_errno()) {
			// echo 'Insert2 failed for Q"'.$sql.'"Q ['.mysql_errno().']: ' . mysql_error();
			// return;
		// }
		// $update_user = mysql_query("update users set vip_points=vip_points-$bot_cost where id=$userid");
	}
	}
	}
}
}
?>

<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Tekst toevoegen</h2> 
</div> 
<div class="content-box-content"> 

<div style="margin-top: 10px;">

<table width="100%">
<form method="post">

<tr><td>Robot</td>
<td><select name="botid">
<option value="0">-- Selecteer robot --</option>
<?php
$data = mysql_query("SELECT * FROM user_bots WHERE user_id = '".$userid."'");
while ($dat = mysql_fetch_assoc($data)) {
$rooms = mysql_query("SELECT * FROM bots WHERE id = '".$dat['bot_id']."'");
if (mysql_num_rows($data) == 0) {
	echo '<option value="0">-- Je hebt nog geen robot --</option>';
} else {
	while ($room = mysql_fetch_assoc($rooms)) {
		echo '<option value="'.$room['id'].'">'.filter($room['name']).'</option>'."\n";
	}
}	
}

?>
</select>
</td>
</tr>
<tr><td>Tekst             </td>
<td><input type="text" name="zegtekst"></td>
</tr>
<tr><td>Zeggen of roepen</td>
<td>
<select name="modus">
<option value="0">Zeggen</option>
<option value="1">Roepen</option>
</select>
</td>
</tr>


<tr><td></td><td>
<?php
$data = mysql_query("SELECT * FROM user_bots WHERE user_id = '".$userid."'");
	$dt = mysql_fetch_assoc($data);
$data2 = mysql_query("SELECT * FROM bots_speech WHERE bot_id = ".$dt['bot_id']);
if (mysql_num_rows($data2) != '1') 
{ 
?>
<input type="submit" class="glipperflexbtn" name="buy2" value="Voeg toe">
<?php
}
else
{
echo'Je hebt al een tekst voor je robot!';
}
?>
</td></tr>
</form>
</table>


<div style="margin-bottom:10px"></div>

</div>
  </div>
</div>
<br>
<div class="content-box"> 
<div class="content-box-deep-blue"> 

<h2 class="title">Teksten</h2> 
</div> 
<div class="content-box-content"> 
<table width="100%">
<?php
	if (isset($_POST['deltekst'])) {
	$botid = filter($_POST['bot_id']);
	$responseid = filter($_POST['re_id']);
	mysql_query("DELETE FROM bots_speech WHERE bot_id = $botid");
	}
	echo "<tr><th>Bot</th><th>Verwijder</th></tr>\n";
$bots = mysql_query("select b.id as bid, b.name as bname,bs.* from user_bots ub, bots b, bots_speech bs where b.id=ub.bot_id and bs.bot_id=b.id and user_id = $userid order by b.id desc");		while ($bot = mysql_fetch_assoc($bots)) {
	echo '<tr>'; 
		echo '<td align="center">'.$bot['bname'].'</td>';
		echo '<td align="right"><form method="POST"><input type="hidden" name="bot_id" value="'.$bot['bid'].'">';
		echo '<input type="submit" class="glipperflexbtn" value="Verwijder" name="deltekst" style="margin-left: 180px;"></form></td>';
		echo "</tr>\n";
	}

?>
</table>
</div>
  </div><br>	
<div id="clear"></div></div><div id="main_right"> 


<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Uitleg!</h2> 

	  </div> 

	  <div class="content-box-content"> 



<strong>Wat houden teksten in?</strong><br />
Teksten zijn de standaard zinnetjes die jouw BOT zal spreken. Je kunt bijvoorbeeld je bezoekers willekeurig verwelkomen of ze een leuke mop laten vertellen. Houdt er echter wel rekening mee dat je je aan de regels houd!
<br /><br />
<strong>Wat zijn reacties?</strong><br />
Bij reacties kun je bepaalde triggers opgeven, waarop de BOT moet reageren. Een voorbeeld van een trigger is <i>Hoi</i> en een voorbeeld van een reactie van de BOT daarop kan zijn <i>Hallo!</i>.<br /><br />
</div>	

	  </div>

	</div>
	


	  
	</div>
</div>
</body></html>