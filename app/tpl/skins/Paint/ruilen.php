<?php
include 'system/header.php';
include'inc/shopnav.php'; 
function table_exists($table, $db) 
{
	$tables = mysql_list_tables($db);
	while (list ($temp) = mysql_fetch_array ($tables)) 
	{
		if ($temp == $table) 
		{
			return TRUE;
		}
	}
	return FALSE;
}
if (!table_exists(sterren_doneren, $_CONFIG['mysql']['database'])) 
{
	if (table_exists(cms_doneren, $_CONFIG['mysql']['database'])) 
	{
		mysql_query("ALTER TABLE `cms_doneren`
CHANGE COLUMN `user_id` `zender_id`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `id`,
CHANGE COLUMN `user_id2` `ontvanger_id`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `zender_id`,
ADD COLUMN `aantal`  int(11) NOT NULL AFTER `sterren`,
ADD COLUMN `datum`  timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP AFTER `aantal`;");
		mysql_query("RENAME TABLE cms_doneren TO sterren_doneren");
		mysql_query("UPDATE sterren_doneren SET aantal = ceil(sterren * 1.10)");
	}
}

?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 <?php
	if (isset($_POST['doneren'])) 
	{	
        $sterren = clean($_POST['sterren']);
        $aantal = clean(ceil($sterren * 1.10));
		$getsomeuser = mysql_num_rows(mysql_query("SELECT id FROM users WHERE username = '".clean($_POST['gebruiker'])."'"));
		$regexp = "/^[0-9]+$/";
		if (clean($_POST['sterren']) < '0')
		{
			echo '<div class="content-box"> ';
			echo '<div class="content-box-black">';
			echo '<h2 class="title">Transactie</h2>';
			echo '</div>';
			echo '<div class="content-box-content">';
			echo 'Gelieve een echt getal in te vullen.';
			echo '</div>';
			echo '</div>';
			echo '<br>';
		}
		else
		{
			if (clean($_POST['sterren']) == '0')
			{
				echo '<div class="content-box"> ';
				echo '<div class="content-box-black">';
				echo '<h2 class="title">Transactie</h2>';
				echo '</div>';
				echo '<div class="content-box-content">';
				echo 'Gelieve een echt getal in te vullen.';
				echo '</div>';
				echo '</div>';
				echo '<br>';
			}
			else
			{
				if (clean($_POST['gebruiker']) == '')
				{
					echo '<div class="content-box"> ';
					echo '<div class="content-box-black">';
					echo '<h2 class="title">Transactie</h2>';
					echo '</div>';
					echo '<div class="content-box-content">';
					echo 'Geen geldige gebruiker geregistreerd.';
					echo '</div>';
					echo '</div>';
					echo '<br>';
				}
				else
				{
					if ($getsomeuser == '0')
					{
						echo '<div class="content-box"> ';
						echo '<div class="content-box-black">';
						echo '<h2 class="title">Transactie</h2>';
						echo '</div>';
						echo '<div class="content-box-content">';
						echo 'Geen geldige gebruiker geregistreerd.';
						echo '</div>';
						echo '</div>';
						echo '<br>';
					}
					else
					{
						if ($sterren > '100')
						{
							echo '<div class="content-box"> ';
							echo '<div class="content-box-black">';
							echo '<h2 class="title">Transactie</h2>';
							echo '</div>';
							echo '<div class="content-box-content">';
							echo 'Gelieve een niet te groot getal in te vullen.';
							echo '</div>';
							echo '</div>';
							echo '<br>';
						}
						else
						{
							if (clean($_POST['gebruiker']) == $userdata->username)
							{
								echo '<div class="content-box"> ';
								echo '<div class="content-box-black">';
								echo '<h2 class="title">Transactie</h2>';
								echo '</div>';
								echo '<div class="content-box-content">';
								echo 'Geen geldige gebruiker geregistreerd.';
								echo '</div>';
								echo '</div>';
								echo '<br>';
							}
							else
							{
								if ($aantal > $userdata->vip_points)
								{
									echo '<div class="content-box"> ';
									echo '<div class="content-box-black">';
									echo '<h2 class="title">Transactie</h2>';
									echo '</div>';
									echo '<div class="content-box-content">';
									echo 'Je hebt niet genoeg sterren.';
									echo '</div>';
									echo '</div>';
									echo '<br>';
								}
								else
								{
									if ($userdata->online == '1')
									{
										echo '<div class="content-box"> ';
										echo '<div class="content-box-black">';
										echo '<h2 class="title">Transactie</h2>';
										echo '</div>';
										echo '<div class="content-box-content">';
										echo 'Je moet eerst offline zijn.';
										echo '</div>';
										echo '</div>';
										echo '<br>';
									}
									else
									{
										$updatesterren_gebruiker_1_gever = "UPDATE users SET vip_points = vip_points -".$aantal." WHERE id = '$userid'";
										if (mysql_query($updatesterren_gebruiker_1_gever))
										{
											$updatesterren_gebruiker_2_krijger = "UPDATE users SET vip_points = vip_points +".$sterren." WHERE username = '".clean($_POST['gebruiker'])."'";
											if (mysql_query($updatesterren_gebruiker_2_krijger))
											{
												$user_name2 = clean($_POST['gebruiker']);
												$getUSERfromuser_id2 = mysql_fetch_object(mysql_query("select id,username from users where username = '$user_name2'"));
												$insertcms_doneren_voor_bewijs_1 = "INSERT INTO sterren_doneren(zender_id,ontvanger_id,sterren,aantal,datum) VALUES ('$userid', '$getUSERfromuser_id2->id', '$sterren', '$aantal', NOW())";
												if (mysql_query($insertcms_doneren_voor_bewijs_1))
												{
													MUS("updatepoints", $userid);
													MUS("updatepoints", $getUSERfromuser_id2->id);
													echo '<div class="content-box"> ';
													echo '<div class="content-box-black">';
													echo '<h2 class="title">Transactie</h2>';
													echo '</div>';
													echo '<div class="content-box-content">';
													echo "Er "; if ($sterren == '1') {echo'is';}else{echo'zijn';} echo " succesvol <strong>$sterren</strong> "; if ($sterren == '1') {echo'ster';}else{echo'sterren';} echo " overgebracht naar $user_name2 voor <strong>$aantal</strong> sterren.";
													echo '</div>';
													echo '</div>';
													echo '<br>';
												}
											}
										}
									}
								}
							}	
						}
					}			
				}		
			}					
		}
	}	
?>

<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Sterren doneren</h2> 
</div> 
<div class="content-box-content" style="overflow:hidden">
<span id="ster">Om 0 sterren te doneren, raak je 0 sterren kwijt.<br><br></span>
<form method="post">
<table width="60%">
<tr><td><b>Sterren</b></td><td>
        <input type="text" name="sterren" onkeyup="getstar(this.value);"></td></tr>
<tr><td><b>Gebruiker</b></td><td>
<input type="text" name="gebruiker" onkeyup="showHint(this.value)">
</td></tr>
<tr><td></td><td>
<input type="submit" class="glipperflexbtn" id="doneren" value="Doneren" name="doneren">
</td></tr>

</table>
</form>

</div>
  </div>

<span id="txtHint"> <br><div class='content-box'> 
    <div class='content-box-deep-blue'> 
    <h2 class='title'>Gebruikersinformatie</h2> 
    </div> 
    <div class='content-box-content' style='overflow:hidden'> Nog geen geldige gebruiker gekozen.</div></div></span>

</div> 


<div id="main_right"> 

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Sterren</h2> 

	  </div> 

<div id="gebruiker" class="content-box-content" style="overflow:hidden"> <table width="100%">

<?php
	$krijgGEHAD = mysql_query("SELECT sd.zender_id,sd.ontvanger_id,sd.sterren,sd.aantal,u.id,u.look,u.username FROM sterren_doneren sd JOIN users u ON (sd.zender_id = u.id AND sd.ontvanger_id = $userid)");
	if (mysql_num_rows($krijgGEHAD) == 0) 
	{
		echo 'Je hebt nog geen sterren gehad.';
	} 
	else 
	{
		echo "<tr><th><b>Look</b></th><th><b>Van wie</b></th><th><b>Sterren</b></th></tr>\n";
		while ($thanksforthestars_user = mysql_fetch_object($krijgGEHAD)) 
		{
			echo '<tr style="text-align: center;"><td><img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$thanksforthestars_user->look.'&direction=2&head_direction=3"></td><td>'.$thanksforthestars_user->username.'</td><td>'.$thanksforthestars_user->sterren."</td></tr>\n";
		}
			}
?>
</table>
</div>
  </div>


