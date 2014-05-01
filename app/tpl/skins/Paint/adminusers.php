<?php
include 'system/header.php';
include 'inc/adminnav.php';
// INDIEN JE EEN WITTE PAGINA KRIJGT, ADD DE CLEAN FUNCTION
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Zoeken</h2> 
</div> 
<div class="glipperflexcont" style="background: #FFFFFF url(app/tpl/skins/{skin}/images/breedMonsterPlantsPromo.png) no-repeat scroll right bottom;"> 
	<form method="post" action="index.php?url=adminusers">
		<table>
			<tr>
				<td>
					Naam:
				</td>
				<td>
					<input type="text" name="naam" style="margin-left: -124px;" <?php if (isset($_GET['user'])) {echo'value="'.clean($_GET['user']).'"';} ?> >
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="zoek" value="Zoeken" class="glipperflexbtn" style="margin-left: 100px;">
				</td>
			</tr>
		</table>
	</form>
</div> 
</div>

<?php
if (isset($_POST['zoek']) || isset($_GET['ip']))
{
	if (isset($_GET['ip']))
	{
		$bestaat = mysql_query("SELECT id,username,ip_reg,ip_last,rank FROM users WHERE ip_last = '".clean($_GET['ip'])."' ORDER BY rank DESC");
		$exists = 1;
	}
	elseif (isset($_POST['zoek']))
	{
		$bestaat = mysql_query("SELECT id,username,ip_reg,ip_last,rank FROM users WHERE username = '".clean($_POST['naam'])."' ORDER BY rank DESC");
		$exists = 1;
	}
	if (mysql_num_rows($bestaat) < 1)
	{
		$exists = 0;
	}
?>

<br />
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Zoeken - <?php if(!isset($_GET['ip'])){echo clean($_POST['naam']);}else{echo clean($_GET['ip']);} ?></h2> 
</div> 
<div class="glipperflexcont"> 
	<span class="notexists" style="display:none;"><div class="hoofdcat"><?php if (isset($_GET['ip'])) {echo"Er staan geen geregistreerde gebruikers op ons systeem bij het volgende IP: ".clean($_GET['ip']);}else{echo"De ingevoerde gebruiker bestaat niet!";} ?></div></span>
	<table class="users">
		<tr>
			<th>
				Gebruikersnaam
			</th>
			<th>
				Registratie IP
			</th>
			<th>
				Laatste IP
			</th>
			<th>
				Rank
			</th>
		</tr>
		<?php
		$i = 0;
		while ($pers = mysql_fetch_object($bestaat))
		{
			$i++;
			$rank = mysql_fetch_object(mysql_query("SELECT * FROM ranks WHERE id = '$pers->rank'"));
			foreach ($hidden as $value) 
			{
				if ($value == $pers->username)
				{
					$pers->ip_last = 'Hidden';
					$pers->ip_reg = 'Hidden';
				}
			}
		?>
			<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;}
			?> users" style="text-decoration: none;">
				<td>
					<a href="index.php?url=profile&id=<?php echo $pers->username; ?>"><?php echo $pers->username; ?></a>
				</td>
				<td>
					<a href="index.php?url=adminusers&ip=<?php echo $pers->ip_reg; ?>"><?php echo $pers->ip_reg; ?></a>
				</td>
				<td>
					<a href="index.php?url=adminusers&ip=<?php echo $pers->ip_last; ?>"><?php echo $pers->ip_last; ?></a>
				</td>
				<td>
					<a href="#" title="Rank <?php echo $pers->rank; ?>: <?php echo $rank->name; ?>"><?php echo $pers->rank; ?></a>
				</td>
			</tr>
		<?php
		}

		?>
	</table>
	<?php
	switch ($exists)
	{
		case 0:
		$flagme = mysql_query("SELECT id,user_id,user_name,command,extra_data FROM cmdlogs WHERE user_name = '$naam' AND command = 'flagme' ORDER BY timestamp DESC LIMIT 1");
		if (mysql_num_rows($flagme) == '0')
		{
			echo"<script type=\"text/javascript\">";
			echo"$(document).ready(function(){";
			echo"$(\".notexists\").show(\"slow\");";
			echo"$(\".users\").css(\"display\",\"none\");";
			echo"});";
			echo"</script>";
		}
		else
		{
			$setting = mysql_fetch_object($cmd);
			$extra = explode(" ", $setting->extra_data);
			$array = array($extra[3]);
			$print = implode(" ", $array);
			header("Location: index.php?url=adminusers&user=$print");
		}
		break;
	}
	?>
</div> 
</div>
<?php
}
?>