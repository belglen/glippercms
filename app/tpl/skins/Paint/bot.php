<?php
include 'system/header.php';
include 'inc/shopnav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
  <?php
	$rank = $userdata->rank;
	$isVIP = $userdata->vip;
	$vip_points = $userdata->vip_points;
		
	if (isset($_POST['koopkoop'])) 
	{
		$bot_name = filter($_POST['name']);
		$bot_motto = filter($_POST['motto']);
		$room_id = filter($_POST['room_id']);
		$look = filter($_POST['look']);
		$x = filter($_POST['x']);
		$y = filter($_POST['y']);
		$effect = filter($_POST['effect']);
		$walk_mode = filter($_POST['walk_mode']);
		$rotation = filter($_POST['rotation']);
		if ($room_id > '0') 
		{
			if ($vip_points >= $bot_cost)
			{
				if ($room_id != '0')
				{
					if ($userdata->online == '0')
					{
						$new_bot = mysql_query("INSERT INTO bots(room_id,name,motto,look,x,y,walk_mode,effect,rotation) VALUES ($room_id, '$bot_name', '$bot_motto', '$look', $x, $y, '$walk_mode', $effect, '$rotation')");
						$new_bot_id = mysql_insert_id();
						$sql = mysql_query("INSERT INTO user_bots(user_id, bot_id) VALUES ($userid, $new_bot_id)");
						$update_user = mysql_query("update users set vip_points=vip_points-$bot_cost where id=$userid");
						$roomid = mysql_fetch_object(mysql_query("SELECT id,room_id FROM bots WHERE id = '$new_bot_id'"));
						MUS("update_bots");
						MUS("unloadroom", $roomid->room_id);
						MUS("updatepoints", $userid);  
						echo '<div class="content-box"> ';
						echo '<div class="content-box-black">';
						echo '<h2 class="title">Transactie</h2>';
						echo '</div>';
						echo '<div class="content-box-content">';
						echo 'Jouw robot is succesvol aangekocht. Doe nu even :update_bots en vervolgens :unload in je kamer. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
						echo '</div>';
						echo '</div>';
						echo '<br>';
					}
					else
					{
						echo '<div class="content-box"> ';
						echo '<div class="content-box-black">';
						echo '<h2 class="title">Transactie</h2>';
						echo '</div>';
						echo '<div class="content-box-content">';
						echo 'Je moet eerst offline zijn voordat je een (ro)bot kan kopen! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
						echo '</div>';
						echo '</div>';
						echo '<br>';
					}
				}
				else
				{
					echo '<div class="content-box"> ';
					echo '<div class="content-box-black">';
					echo '<h2 class="title">Transactie</h2>';
					echo '</div>';
					echo '<div class="content-box-content">';
					echo 'Je hebt geen geldige kamer gekozen! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
					echo '</div>';
					echo '</div>';
					echo '<br>';
				}
			}
			else
			{
				echo '<div class="content-box"> ';
				echo '<div class="content-box-black">';
				echo '<h2 class="title">Transactie</h2>';
				echo '</div>';
				echo '<div class="content-box-content">';
				echo 'Je hebt helaas niet genoeg sterren om een robot te kopen. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
				echo '</div>';
				echo '</div>';
				echo '<br>';
			}
		}
		else
		{
			echo '<div class="content-box"> ';
			echo '<div class="content-box-black">';
			echo '<h2 class="title">Transactie</h2>';
			echo '</div>';
			echo '<div class="content-box-content">';
			echo 'Je hebt geen geldige kamer gekozen! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
			echo '</div>';
			echo '</div>';
			echo '<br>';
		}
	}
	if (isset($_POST['pasaan']))
	{
		$bot_name = clean($_POST['name']);
		$bot_motto = clean($_POST['motto']);
		$room_id = clean($_POST['room_id']);
		$look = clean($_POST['look']);
		$x = clean($_POST['x']);
		$y = clean($_POST['y']);
		$effect = clean($_POST['effect']);
		$walk_mode = clean($_POST['walk_mode']);
		$rotation = clean($_POST['rotation']);	
		$bot_id = clean($_POST['bot_id']);
		$getBOT1 = mysql_query("SELECT b.*,ub.* FROM bots b JOIN user_bots ub ON (ub.bot_id = b.id AND b.id = $bot_id AND ub.user_id = $userid)");
		if (mysql_num_rows($getBOT1) == '1')
		{
			if ($room_id > '0') 
			{
				if ($room_id != '0')
				{
					if ($look == '1')
					{
						$setlookvariable_userdata = $userdata->look;
						$updatesomelooks = mysql_query("UPDATE bots SET look = '$setlookvariable_userdata' WHERE id = '$bot_id'");
					}
					$updatethewholethingiefromthebots_now = "UPDATE bots SET name = '$bot_name', motto = '$bot_motto', room_id = '$room_id', x = '$x', y = '$y', rotation = '$rotation', walk_mode = '$walk_mode', effect = '$effect' WHERE id = '$bot_id'";
					if (mysql_query($updatethewholethingiefromthebots_now))
					{
						echo '<div class="content-box"> ';
						echo '<div class="content-box-black">';
						echo '<h2 class="title">Transactie</h2>';
						echo '</div>';
						echo '<div class="content-box-content">';
						echo 'Jouw robot is succesvol aangepast! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
						echo '</div>';
						echo '</div>';
						echo '<br>';
					}
				}
				else
				{
					echo '<div class="content-box"> ';
					echo '<div class="content-box-black">';
					echo '<h2 class="title">Transactie</h2>';
					echo '</div>';
					echo '<div class="content-box-content">';
					echo 'Je hebt geen geldige kamer gekozen! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
					echo '</div>';
					echo '</div>';
					echo '<br>';
				}
			}
			else
			{
				echo '<div class="content-box"> ';
				echo '<div class="content-box-black">';
				echo '<h2 class="title">Transactie</h2>';
				echo '</div>';
				echo '<div class="content-box-content">';
				echo 'Je hebt geen geldige kamer gekozen! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
				echo '</div>';
				echo '</div>';
				echo '<br>';
			}
		}
		else
		{
			echo '<div class="content-box"> ';
			echo '<div class="content-box-black">';
			echo '<h2 class="title">Transactie</h2>';
			echo '</div>';
			echo '<div class="content-box-content">';
			echo 'Je bent de programmeur van deze robot niet! Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
			echo '</div>';
			echo '</div>';
			echo '<br>';
		}
	}
	if (isset($_POST['del'])) 
	{
		$bot_id = clean($_POST['bot_id']);
		$getBOT1 = mysql_query("SELECT b.*,ub.* FROM bots b JOIN user_bots ub ON (ub.bot_id = b.id AND b.id = $bot_id AND ub.user_id = $userid)");
		if (mysql_num_rows($getBOT1) == '1')
		{
			$delete_user_bot = mysql_query("delete from user_bots where bot_id=$bot_id");
			$delete_bot = mysql_query("delete from bots where id=$bot_id");
			$add_stars = mysql_query("update users set vip_points=vip_points + 5 where id=$userid");
			MUS("updatepoints", $userid);  
			echo '<div class="content-box"> ';
			echo '<div class="content-box-black">';
			echo '<h2 class="title">Transactie</h2>';
			echo '</div>';
			echo '<div class="content-box-content">';
			echo 'Jouw robot is succesvol verwijderd. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
			echo '</div>';
			echo '</div>';
			echo '<br>';

		}
		else
		{
			echo '<div class="content-box"> ';
			echo '<div class="content-box-black">';
			echo '<h2 class="title">Transactie</h2>';
			echo '</div>';
			echo '<div class="content-box-content">';
			echo 'Jij bent de programmeur van deze robot niet. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
			echo '</div>';
			echo '</div>';
			echo '<br>';

		}
	}

?>

<div class="content-box"> 
	<div class="content-box-deep-blue"> 
		<h2 class="title">Programmeer een BOT (<?php echo $bot_cost; ?> Sterren!)</h2> 
	</div> 
	<div class="content-box-content"> 
		<div style="margin-top: 10px;">
			<table width="100%">
				<tr>
					<td colspan="2"></td>
				</tr>
				<form method="post">
					<tr>
						<td>Naam bot:</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Motto bot:</td>
						<td><input type="text" name="motto"></td>
					</tr>
					<tr>
						<td>Look bot (de look is hetzelfde als jouw huidige look):</td>
						<td>
							<div id="poppetje">
								<img alt="<?php echo $userdata->username ?>" src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $userdata->look; ?>&direction=2" style="z-index:2;">
							</div>	
							<input type="hidden" name="look" value="<?php echo $userdata->look; ?>">
						</td>
					</tr>
					<tr>
						<td>Kamer voor bot:</td>
						<td>
							<select name="room_id">
								<option value="0">-- Selecteer kamer --</option>
								<?php
								$rooms = mysql_query("select r.* from rooms r, users u where r.owner=u.username and u.id=$userid order by r.caption");
								if (mysql_num_rows($rooms) == 0) 
								{
									echo '<option value="0">-- Je hebt nog geen kamer --</option>';
								} 
								else 
								{
									while ($room = mysql_fetch_object($rooms)) 
									{
										echo '<option value="'.$room->id.'">'.filter($room->caption).'</option>'."\n";
									}
								}	
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>x-as (<span class="hotspot" onmouseover="tooltip.show('Doe :coords op de plek waar jij je robot wil!');" onmouseout="tooltip.hide();">?</span>):</td>
						<td>
							<select name="x">
								<?php
								  for ($i=0; $i <= 30; $i++) 
								  {
									echo '<option value="'.$i.'">'.$i.'</option>';
								  }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>y-as (<span class="hotspot" onmouseover="tooltip.show('Doe :coords op de plek waar jij je robot wil!');" onmouseout="tooltip.hide();">?</span>):</td>
						<td>
							<select name="y">
								<?php
								  for ($i=0; $i <= 30; $i++) 
								  {
									echo '<option value="'.$i.'">'.$i.'</option>';
								  }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Effect (zelfde als :enable):</td>
						<td>
							<select name="effect">
								<?php
								  for ($i=0; $i <= 112; $i++) 
								  {
									echo '<option value="'.$i.'">'.$i.'</option>';
								  }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Lopen of staan:</td>
						<td>
							<script>
							</script>

							<select name="walk_mode">
								<option value="freeroam">Lopen</option>
								<option value="stand" selected="selected">Staan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Richting:</td>
						<td>					
							<select id="ddlViewRot" onchange="showHint7('<?php echo $userdata->username; ?>', '<?php echo $userdata->look; ?>', this.value)" name="rotation">
								<option value="1">1</option>
								<option value="2" selected="selected">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" class="glipperflexbtn" name="koopkoop" value="Kopen!">
						</td>
					</tr>
				</form>
		</table>
		<div style="margin-bottom:10px"></div>
		</div>
  </div>
</div>

<br />

<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Herprogrammeer een BOT</h2> 
</div> 
<div class="content-box-content"> 

<?php

if (!isset($_POST['change']))
{
?>
<table width="100%">

<?php
	$bots = mysql_query("select b.*, r.caption as room_name from user_bots ub, bots b, rooms r where b.id=ub.bot_id and b.room_id=r.id and user_id = $userid order by b.id desc");
	$nr_bots = mysql_num_rows($bots);
	if ($nr_bots == 0) 
	{
		echo '<tr><td colspan="3">Je hebt nog geen bots</td></tr>';
	} 
	else 
	{
		while ($bot = mysql_fetch_assoc($bots)) 
		{
			echo '<tr>'; 
			echo '<td><div id="poppetje">
	<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$bot['look'].'&direction=2&size=s" alt="Verwijder" style="z-index:2;">
	</div></td>';
			echo '<td><span style="margin-left: 100px;">'.$bot['name'].'</span></td>';
			echo '<td><form method="POST"><input type="hidden" name="bot_id" value="'.$bot['id'].'">';
			echo '<input type="submit" class="glipperflexbtn" value="Pas aan" style="margin-left: 80px;" id="change" name="change"></td>';
			echo '<td><input type="submit" class="glipperflexbtn" value="Verwijder" name="del"></form></td>';
			echo "</tr>\n";
		}
	}
?>
</table>
<?php
}
else
{
	$getBOT = mysql_query("SELECT b.*,ub.*,u.id FROM bots b JOIN user_bots ub ON (ub.bot_id = b.id AND b.id = ".clean($_POST['bot_id']).") JOIN users u ON (ub.user_id = u.id)");
	$getBOT1 = mysql_query("SELECT b.*,ub.* FROM bots b JOIN user_bots ub ON (ub.bot_id = b.id AND b.id = ".clean($_POST['bot_id'])." AND ub.user_id = $userid)");
	if (mysql_num_rows($getBOT) == '1')
	{
		if (mysql_num_rows($getBOT1) == '1')
		{
			$robot = mysql_fetch_object($getBOT);
			$paste = clean($_POST['bot_id']);
?>

<div style="margin-top: 0px;">

<table width="100%">
<tr><td colspan="2"><b>Bij het verwijderen van een bot krijg je 5 sterren terug.</b><br></td></tr>


<form method="post">
<tr>
<td>Bot:</td>
<td><input type="text" name="name" value="<?php echo $robot->name; ?>"></td>
</tr>
<tr>
<td>Motto:</td>
<td><input type="text" name="motto" value="<?php echo $robot->motto; ?>"></td>
</tr>
<tr>
<td>Look aanpassen naar huidige look?</td>
<td><select name="look">
<option value="0" selected="selected">Nee</option>
<option value="1">Ja</option>
</select>
</td>
</tr>
<tr>
<td>Kamer:</td>
<td><select name="room_id">
	<option value="0">-- Selecteer kamer --</option>
				<?php				
					$jaa = mysql_fetch_object(mysql_query("SELECT b.*, b.id as bid, ub.*, r.*, r.id as rid FROM bots b JOIN user_bots ub ON (b.id = $paste AND ub.bot_id = b.id AND ub.user_id = $userid) JOIN rooms r ON (b.room_id = r.id)"));
					$rooms = mysql_query("select r.* from rooms r, users u where r.owner=u.username and u.id=$userid and r.id NOT LIKE $jaa->rid order by r.caption");
					if (mysql_num_rows($rooms) == 0) 
					{
						echo '<option value="0">-- Je hebt nog geen kamer --</option>';
					} 
					else 
					{
							echo '<option value="'.$jaa->rid.'" selected="selected">'.filter($jaa->caption).'</option>'."\n";
						while ($room = mysql_fetch_object($rooms)) 
						{
							echo '<option value="'.$room->id.'">'.filter($room->caption).'</option>'."\n";
						}
					}	
				?>
							</select>
</td>
</tr>

<tr><td>x-as (gebruik :coords op de plaats waar je je bot wilt):</td>
<td>
<select name="x">
	<?php
		for ($i=0; $i <= 27; $i++) 
		{
			echo '<option value="'.$i.'"'; if ($robot->x == $i) {echo'selected="selected"';} echo'>'.$i.'</option>';
		}
	?>
</select>
</td>
</tr>
<tr><td>y-as (gebruik :coords op de plaats waar je je bot wilt):</td>
<td>
<select name="y">
	<?php
		for ($i=0; $i <= 27; $i++) 
		{
			echo '<option value="'.$i.'"'; if ($robot->y == $i) {echo'selected="selected"';} echo'>'.$i.'</option>';
		}
	?>
</select>
</td>
</tr>
<tr><td>Effect (zelfde als :enable):</td>
<td>
<select name="effect">
	<?php
		for ($i=0; $i <= 112; $i++) 
		{
			echo '<option value="'.$i.'"'; if ($robot->effect == $i) {echo'selected="selected"';} echo'>'.$i.'</option>';
		}
	?>


</select>
</td>
</tr>
<tr><td>Lopen of staan:</td>
<td>
<select name="walk_mode">
<option value="freeroam"<?php if ($robot->walk_mode == 'freeroam') {echo'selected="selected"';} ?>>Lopen</option>
<option value="stand" <?php if ($robot->walk_mode == 'stand') {echo'selected="selected"';} ?>>Staan</option>
</select>
</td>
</tr>
<tr><td>Richting:</td>
<td>					
<script>
					var e = document.getElementById("ddlViewBy");
					var strUser = e.options[e.selectedIndex].text;
					</script>
<select id="ddlViewBy" onchange="showHint7('laurettes', 'ea-3224-62-72.ch-3045-110.hd-600-28.lg-3198-110.hr-515-33.fa-1211-62.ha-1011-110.sh-735-68', this.value)" name="rotation">
	<?php
		for ($i=0; $i <= 8; $i++) 
		{
			echo '<option value="'.$i.'"'; if ($robot->rotation == $i) {echo'selected="selected"';} echo'>'.$i.'</option>';
		}
	?>
</td>
</tr>

<tr>
<td>Actie:</td>
<td><input type="hidden" name="bot_id" value="<?php echo $paste; ?>"><input type="submit" class="glipperflexbtn" name="pasaan" value="Pas aan"></td>
</tr>
</form>



</table>


<div style="margin-bottom:10px"></div>

</div>
<?php	
		}	
		else
		{
			echo 'Jij bent de programmeur van deze robot niet. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
		}
	}
	else
	{
		echo 'Er bestaat geen robot van dit ID. Klik <a href="index.php?url=bot">hier</a> om terug te gaan.';
	}
}
?>
  </div>
</div>	  
<br />



<div id="clear"></div></div><div id="main_right"> 


<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Koop een BOT!</h2> 

	  </div> 

	  <div class="content-box-content"> 

<strong>Het kopen van een BOT</strong><br />
<img src="app/tpl/skins/Paint/images/bots.gif" align="right">De BOT's kunnen worden gekocht door elke speler in {hotelName}! Je kan er maar liefst 5 in bezit hebben.<br /><br />
<strong>Wat kan ik met een BOT?</strong><br />
Via deze pagina's kun je jouw BOT configureren. Je kunt je BOT bijvoorbeeld plaatsen in een discotheek als barman of laten werken als ober in een knus cafeetje. Kortom, handige hulp in huis dus!<br /><br />
<strong>Gelden er regels?</strong><br />
Uiteraard gelden er regels. De standaard {hotelName} regels zijn hierop van toepassing. Bij het overtreden van deze regels, door jouw bot bijvoorbeeld te laten schelden/spammen of te laten praten over sexuele onderwerpen kan jouw BOT zonder teruggave van Sterren worden ingenomen.<br /><br />
<strong>Niet goed? Sterren terug!</strong><br />
Ben je niet tevreden met jouw BOT? Is het niet wat je er van verwacht had? Jammer! Maar we hebben in ieder geval wel de mogelijkheid, dat als je jouw BOT verwijderd, je je Sterren terugkrijgt!
		
		
</div>	

	  </div>

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Statistieken</h2> 

	  </div> 

	  <div class="content-box-content"> 
Er zijn inmiddels <strong><?php echo mysql_num_rows(mysql_query("SELECT * FROM bots")); ?></strong> BOT's op Glipper!
</div></div>

	</div>
	


	  
	</div>
</div>
</body></html>