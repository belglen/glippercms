<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Alle actuele idee&euml;n</h2> 
</div> 
<div class="glipperflexcont">
<?php
$bestaat = mysql_query("SELECT u.id AS userid,u.username,u.ip_last,ui.*,ui.id AS idd FROM users u JOIN user_ideas ui ON (ui.user_id = u.id) ORDER BY ui.id ASC");
if (mysql_num_rows($bestaat) >= '1')
{
?>
<table class="ideas">
	<tr>
		<th style="width: 50%">
			Idee
		</th>
		<th style="width: 20%">
			Gebruikersnaam
		</th>
		<th>
			Respect
		</th>
		<th style="width: 90px;">
			Actie
		</th>
	</tr>
	<?php
	for ($i = 0; $pers = mysql_fetch_object($bestaat); $i++)
	{
	?>
	<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;} ?> ideas" style="text-decoration: none;">
		<td>
			<?php echo clean($pers->idee); ?>
		</td>
		<td>
			<a href="index.php?url=adminusers&ip=<?php echo $pers->ip_last; ?>"><?php echo $pers->username; ?></a>
		</td>
		<td>
			<?php
			if ($pers->min > $pers->plus)
			{
				echo'<font style="color:rgb(244, 60, 58);">
					'.$pers->plus.'+
					'.$pers->min.'-
					</font>';
			}
			elseif ($pers->plus == $pers->min)
			{
				echo'<font style="color:rgb(255, 106, 0);">';
				echo $pers->plus.'+ '.$pers->min.'-';
			}
			elseif ($pers->plus > $pers->min)
			{
				echo'<font style="color:rgb(47, 205, 50);">
				+'.$pers->plus.'
				-'.$pers->min.'
				</font>';
			}
			?>
		</td>
		<td>
			<form method="post" action="index.php?url=adminoptions">
				<input type="hidden" name="id" value="<?php echo $pers->idd; ?>">
				<input onclick="return confirm('Weet je zeker dat je dit idee wil verwijderen?')" id="del" type="submit" name="delete" value="Verwijderen" class="habbobutton red" style="text-align:center;width: 90px;margin-left: 25px;">
			</form>
		</td>
	</tr>
	<?php
	}
	?>
</table>
<?php
}
else
{
	echo"<div class=\"hoofdcat\">Er zijn momenteel geen idee";?>&euml;<?php echo".</div>";
}
?>
</div> 
</div>
<br>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Aangevraagde idee&euml;n</h2> 
</div> 
<div class="glipperflexcont">
<?php
$bestaat = mysql_query("SELECT u.id AS userid,u.username,u.ip_last,ui.*,ui.id AS idd FROM users u JOIN user_ideas_second ui ON (ui.user_id = u.id) ORDER BY ui.id ASC");
if (mysql_num_rows($bestaat) >= '1')
{
?>
<table class="ideas">
	<tr>
		<th style="width: 50%">
			Idee
		</th>
		<th style="width: 20%">
			Gebruikersnaam
		</th>
		<th style="width: 90px;">
			Accepteren
		</th>
		<th style="width: 90px;">
			Weigeren
		</th>
	</tr>
	<?php
	for ($i = 0; $pers = mysql_fetch_object($bestaat); $i++)
	{
	?>
	<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;} ?> ideas" style="text-decoration: none;">
		<td>
			<?php echo clean($pers->idee); ?>
		</td>
		<td>
			<a href="index.php?url=adminusers&ip=<?php echo $pers->ip_last; ?>"><?php echo $pers->username; ?></a>
		</td>
		<td>
			<form method="post" action="index.php?url=adminoptions">
				<input type="hidden" name="id" value="<?php echo $pers->idd; ?>">
				<input id="allow" type="submit" name="allow" value="Accepteren" class="habbobutton green" style="text-align:center;width: 90px; margin-left: 15px;">
			</form>
		</td>
		<td>
			<form method="post" action="index.php?url=adminoptions">
				<input type="hidden" name="id" value="<?php echo $pers->idd; ?>">
				<input onclick="return confirm('Weet je zeker dat je dit idee wil weigeren?')" id="deny" type="submit" name="deny" value="Weigeren" class="habbobutton red" style="text-align:center;width: 90px;margin-left: 15px;">
			</form>
		</td>
	</tr>
	<?php
	}
	?>
</table>
<?php
}
else
{
	echo"<div class=\"hoofdcat\">Er zijn momenteel geen aanvragen.</div>";
}
?>
</div> 
</div>
<!-- allow -->
<?php
if (isset($_POST['allow']))
{
	$id = clean($_POST['id']);
	$info = mysql_query("SELECT * FROM user_ideas_second WHERE id = '$id'");
	if (mysql_num_rows($info) > 0)
	{
		$datam = mysql_fetch_object($info);
		mysql_query("INSERT INTO user_ideas(user_id,idee,plus,min) VALUES ('$datam->user_id', '".clean($datam->idee)."', '0', '0')");
		mysql_query("UPDATE users SET vip_points = vip_points + 5 WHERE id = '$datam->user_id'");
		mysql_query("DELETE FROM user_ideas_second WHERE id = '$id'");
	?>
	<div class="allowed" style="display:none;">
	<div id="dialog-modal" title="Klaar!">
<p>Hallo {username}!</p>
<p>Het geselecteerde idee is succesvol toegevoegd aan de actuele idee&euml;n. De verzender heeft uiteraard ook zijn/haar 5 sterren teruggekregen!</p>
<p>Tot nog eens in {hotelName}!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.allowed').show('slow');});</script>
	<?php
	}
	else
	{
	?>
		<div class="failure" style="display:none;">
	<div id="dialog-modal" title="Probleempje">
<p>Hey {username}!</p>
<p>Er is een probleempje opgelopen, blijkbaar bestaat het aangevraagde idee niet/meer.</p>
<p>Het kan zijn dat het idee misschien al is geaccepteerd/geweigerd door een andere beheerder.</p>
<p>Tot nog eens!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "explode",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.failure').show('slow');});</script>

	<?php
	}
	$err++;
}
?>

<!-- deny -->
<?php
if (isset($_POST['deny']))
{
	$id = clean($_POST['id']);
	$info = mysql_query("SELECT * FROM user_ideas_second WHERE id = '$id'");
	if (mysql_num_rows($info) > 0)
	{
		$datam = mysql_fetch_object($info);
		mysql_query("DELETE FROM user_ideas_second WHERE id = '$id'");
	?>
	<div class="allowed" style="display:none;">
	<div id="dialog-modal" title="Klaar!">
<p>Hallo {username}!</p>
<p>Het geselecteerde idee is succesvol geweigerd. Het idee is <u>NIET</u> toegevoegd aan de lijst, en de eigenaar heeft zijn/haar 5 sterren ook <u>NIET</u> teruggekregen</p>
<p>Tot nog eens in {hotelName}!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.allowed').show('slow');});</script>
	<?php
	}
	else
	{
	?>
		<div class="failure" style="display:none;">
	<div id="dialog-modal" title="Probleempje">
<p>Hey {username}!</p>
<p>Er is een probleempje opgelopen, blijkbaar bestaat het aangevraagde idee niet/meer.</p>
<p>Het kan zijn dat het idee misschien al is geaccepteerd/geweigerd door een andere beheerder.</p>
<p>Tot nog eens!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "explode",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.failure').show('slow');});</script>

	<?php
	}
	$err++;
}
?>


<!-- delete -->
<?php
if (isset($_POST['delete']))
{
	$id = clean($_POST['id']);
	$info = mysql_query("SELECT * FROM user_ideas WHERE id = '$id'");
	
	if (mysql_num_rows($info) > 0)
	{
	?>
	<div class="del" style="display:none;">
	<div id="dialog-modal" title="Klaar!">
<p>Hallo {username}!</p>
<p>Het geselecteerde idee is succesvol verwijdert van {hotelName}'s database.</p>
<p>Tot nog eens in {hotelName}!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.del').show('slow');});</script>
	<?php
		mysql_query("DELETE FROM user_ideas WHERE id = '$id'");
	}
	else
	{
	?>
		<div class="del" style="display:none;">
	<div id="dialog-modal" title="Probleempje">
<p>Hey {username}!</p>
<p>Er is een probleempje opgelopen, blijkbaar bestaat het idee niet/meer.</p>
<p>Het kan zijn dat het idee misschien al is verwijdert door een andere beheerder.</p>
<p>Tot nog eens!</p>
</div>
	<script>
 $( "#dialog-modal" ).dialog({
autoOpen: true,
modal: true,
show: {
effect: "explode",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
	</script> 

	</div>
	<script>$(document).ready(function(){$('div.del').show('slow');});</script>
	<?php
	}
	$err++;
}
?>