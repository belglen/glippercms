<?php
include 'system/header.php';
include 'inc/groepnav.php';

/* vars */
$id = clean(filter($_GET['id']));
$getgroup = mysql_query("SELECT * FROM groups WHERE id = '$id'");
/* vars */

/* scripts */
if (mysql_num_rows($getgroup) == '0')
{
	$exists = 0;
}
else
{
	$getgroep = mysql_fetch_object($getgroup);
	$getmember = mysql_query("SELECT * FROM group_memberships WHERE userid = '$userid' AND groupid = '$id'");
	$getallmembers = mysql_num_rows(mysql_query("SELECT * FROM group_memberships WHERE groupid = '$id'"));
	$leden = mysql_query("SELECT * FROM group_memberships WHERE groupid = '$id'");
	$getreq = mysql_query("SELECT * FROM group_requests WHERE userid = '$userid' AND groupid = '$id'");
	$getstats = mysql_fetch_object(mysql_query("SELECT us.id as user,us.groupid AS groep,u.id as uid FROM user_stats us JOIN users u ON (us.id = '$userid' AND u.id = '$userid')"));
	$getowner = mysql_fetch_object(mysql_query("SELECT id,username,look FROM users WHERE id = '$getgroep->ownerid'"));
	$getroom = mysql_fetch_object(mysql_query("SELECT id,caption FROM rooms WHERE id = '$getgroep->roomid'"));
	$exists = 1;
}
/* scripts */
?>
</span>
</div>

<div id="marginy">
	<div id="main_left"> 
		<?php
		if ($exists == '1')
		{
		?>
			<div class="content-box"> 
				<div class="content-box-black"> 
					<h2 class="title">
						Groeppagina: <?php echo $getgroep->name; ?>
					</h2> 
				</div> 
				<div class="content-box-content">
					<table>
						<tr>
							<td>
								<b>
									Groepsnaam: 
								</b>
							</td>
							<td width="75%">
								<?php 
									echo $getgroep->name."     ";
									if (mysql_num_rows($getmember) >= '1' || $getgroep->ownerid == $userid) 
									{
										if ($getstats->groep != $id) 
										{
											// als deze groep geen favoriet is
											echo"<a class=\"hotspot\" onmouseover=\"tooltip.show('Deze groep is niet je favoriet');\" onmouseout=\"tooltip.hide();\" href=\"index.php?url=hartjeleeg&id=$id\" style=\"cursor:pointer;\"><img src=\"app/tpl/skins/Paint/images/hartjeleeg.gif\"></a></form>";
										}
										else
										{
											// als deze groep al een favoriet is
											echo"<a class=\"hotspot\" onmouseover=\"tooltip.show('Deze groep is je favoriet');\" onmouseout=\"tooltip.hide();\" href=\"index.php?url=hartjevol\" style=\"cursor:pointer;\"><img src=\"app/tpl/skins/Paint/images/hartje.gif\"></a>";
										}
									}
								?>
							</td>
								<?php
									if ($getgroep->ownerid == $userid) 
									{
										// als je owner bent van de groep
										echo"<td align=\"right\"><div style=\"margin-left: 10px;\"><a href=\"index.php?url=groepedit&id=$id\">Instellingen</a></div></td>";
									} 
									elseif ($getgroep->ownerid != $userid) 
									{
										// als je geen owner bent van de groep
										if ($getgroep->locked == 'open') 
										{
											// als de groep open staat
											if (mysql_num_rows($getmember) == '0') 
											{
												// als je nog geen lid bent
												echo"<td align=\"right\"><div style=\"margin-left: 10px;\"><a href=\"index.php?url=joingroep&id=$id\">Join</a></div></td>";
											}
											else
											{
												// als je lid bent
												echo"<td align=\"right\"><div style=\"margin-left: 10px;\"><a href=\"index.php?url=verlaatgroep&id=$id\">Verlaat</a></div></td>";
											}
										}
										elseif ($getgroep->locked == 'locked' && mysql_num_rows($getmember) == '0' && mysql_num_rows($getreq) == '0') 
										{
											// als je nog geen lid bent en als je nog een lidmaatschap hebt gevraagd
											echo"<td align=\"right\"><div style=\"margin-left: 10px;\"><a href=\"index.php?url=lidmaat&id=$id\">Lidmaatschap</a></div></td>";
										}
									}
								?>
							<img src="r63/c_images/album1584/<?php echo $getgroep->badge; ?>.gif" style="margin-left: 10px;" align="right">
						</tr>
						<tr>
							<td>
							</td>
						</tr>
						<tr>
							<td>
								<strong>
									Eigenaar: 
								</strong>
							</td> 
							<td width="75%">
								<?php echo $getowner->username; ?>
							</td>
						</tr>
						<tr>
							<td>
								<strong>
									Leden: 
								</strong>
							</td> 
							<td width="75%">
								<?php echo $getallmembers+1; ?>
							</td>
						</tr>
						<tr>
							<td>
								<strong>
									Beschrijving: 
								</strong>
							</td> 
							<td width="75%">
								<?php echo $getgroep->desc; ?>
							</td>
						</tr>
						<td width="25%">
							- - - - - - - - -
						</td>
						<div style="margin-left: -40px;">
							<td style="margin-left: -40px;">
								- - - - - - - - - - - - - - - - - - - - - -
							</td>
						</div>
						<tr>
							<td>
								<b>
									Groepkamer:
								</b>
							</td>
							<td width="75%">
								<a href="index.php?url=client&roomId=<?php echo $getgroep->roomid; ?>" target="_blank"><?php echo $getroom->caption; ?></a>
							</td>
						</tr>
					</table>
				</div> 
			</div>
		<?php
		}
		else
		{
		?>
		<div class="glipperflexbox"> 
			<div class="glipperflexbar"> 
				<h2 class="title">
					Groeppagina: <?php echo $getgroep->name; ?>
				</h2> 
			</div> 
			<div class="glipperflexcont">
				De aangevraagde groep bestaat niet
			</div>
		</div>
		<?php
		}
		?>


 </div>




</div>
  





 <?php
 		if ($exists == '1')
		{
			echo"<div id=\"main_right\">";
			echo"<br>";
			echo"<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\">";
			echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
			echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">Leden</h2> ";
			echo"</div>";
			echo"<div class=\"content-box-content\">";
			echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('".$getowner->username."');\" onmouseout=\"tooltip.hide();\">";
			echo"<a href=\"index.php?url=profile&id=".$getowner->username."\"><img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=".$getowner->look."&size=s\"/></a>";
			echo"</span>";
			$i = 0;
			while($lid = mysql_fetch_object($leden))
			{
				$getMember = mysql_query("SELECT * FROM users WHERE id ='$lid->userid' LIMIT 1");
				if(mysql_num_rows($getMember) > 0)
				{
					$i++;
					if($i == 1)
					{
						echo'';
					}
					$member = mysql_fetch_object($getMember);
					echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('$member->username');\" onmouseout=\"tooltip.hide();\">";
					echo"<a href=\"index.php?url=profile&id=$member->username\">";
					echo"<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$member->look&size=s\"/></a>";
					echo"</span>";
				}
			}
			echo"</div>";
			echo"</div>";
			echo"<br>";
			echo"<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\">";
			echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
			echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">Al mijn groepen</h2>";
			echo"</div>";
			echo"<div class=\"content-box-content\">";
			$getall = mysql_query("SELECT * FROM groups WHERE ownerid = '$userid'");
			while($groepen = mysql_fetch_object($getall)) 
			{
				echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('".clean($groepen->name)."');\" onmouseout=\"tooltip.hide();\">";
				echo"<a href=\"index.php?url=groep&id=$groepen->id\">";
				echo"<img src=\"r63/c_images/album1584/$groepen->badge.gif\"></span></a>";
			}
			echo"</div>";
			echo"</div>";
			echo"<br>";
			echo"<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\">";
			echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
			echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">Groepen waar ik lid van ben</h2>";
			echo"</div>";
			echo"<div class=\"content-box-content\">";
			$getsome = mysql_query("SELECT gms.*, g.*  FROM group_memberships gms JOIN groups g ON (gms.groupid = g.id) WHERE gms.userid = '" . $userid . "'");    
			while($group = mysql_fetch_object($getsome)) 
			{
				echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('".clean($group->name)."');\" onmouseout=\"tooltip.hide();\">";
				echo"<a href=\"index.php?url=groep&id=$group->id\">";
				echo "<img src=\"r63/c_images/album1584/$group->badge.gif\"></span></a>";
			}
			echo"</div>";
			echo"</div>";
			if ($userdata->rank >= '6' && $userdata->rank <= 11) 
			{
				echo"<br>";
				echo"<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\">";
				echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
				echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">Moderatiehoekje</h2>";
				echo"</div>";
				echo"<div class=\"content-box-content\">";
				echo"<a href=\"index.php?url=modereergroep\">";
				echo"<img src=\"app/tpl/skins/Paint/images/modbutton.gif\" align=\"center\" style=\"margin-left: 75px;\" onmouseover=\"this.src='app/tpl/skins/Paint/images/modbutton2.gif'\" onmouseout=\"this.src='app/tpl/skins/Paint/images/modbutton.gif'\">";
				echo"</a>";
				echo"</div>";
				echo"</div>";
			}
		}
		echo"</div>";
		echo"<div id=\"clear\">".include'system/footer.php'."</div>";
		echo"</div>";
		echo"</div>";
?>