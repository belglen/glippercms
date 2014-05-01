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
<h2 class="title">Zoeken</h2> 
</div>
<div class="glipperflexcont"> 
	<form method="post" action="index.php?url=adminruilen">
		<table>
			<tr>
				<td>
					Naam:
				</td>
				<td>
					<input type="text" name="naam" style="margin-left: -124px;">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="zoek" value="Zoeken" class="glipperflexbtn" style="margin-left: 100px;">
				</td>
			</tr>
	<tr style="font-size:11px;">
		<td style="font-size:11px;">
			<br>
			<strong class="adminDivOne" style="cursor:pointer;">
			<a class="show">
				Laat alle donaties zien
			</a>
		</strong>

		<strong class="adminDivTwo" style="cursor:pointer;display:none;">
			<a class="hide">
				Sluit alle donaties
			</a>
		</strong>
	</td></tr>

		</table>
	</form>
	<?php
	if (isset($_GET['none']))
	{
		echo'<br><div class="error">De ingevulde gebruiker heeft geen donaties gehad</div>';
	}
	if (isset($_GET['error']))
	{
		echo'<br><div class="error">Er zijn een paar problemen opgelopen!</div>';
	}
	?>
</div>
</div>
<?php
if (isset($_POST['zoek']))
{
	$error = 0;
	if (empty($_POST['naam']))
	{
		$error++;
	}
	$user = mysql_query("SELECT id,username FROM users WHERE username = '".clean($_POST['naam'])."'");
	if (mysql_num_rows($user) == '0')
	{
		header("Location: index.php?url=adminruilen&none");
	}
	else
	{
		$user = mysql_fetch_object($user);
	}
	$checkuser = mysql_query("SELECT u.id,u.username,sd.zender_id,sd.ontvanger_id,sd.sterren,sd.datum FROM sterren_doneren sd JOIN users u ON (sd.zender_id = u.id AND sd.ontvanger_id = '".$user->id."') ORDER BY sd.id DESC");
	if (mysql_num_rows($checkuser) == '0')
	{
		$error++;
	}
	if ($error > 0)
	{
		header("Location: index.php?url=adminruilen&error=$error");
	}
?>
<br>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Zoeken - <?php echo clean($_POST['naam']); ?></h2> 
</div> 
<div class="glipperflexcont"> 
<table>
	<tr style="margin-left: 3px;">
		<td class="aankopen username" style="margin-left: 3px;">Zender</th>
		<td class="aankopen datum" style="margin-left: 3px;">Ontvanger</th>
		<td class="aankopen aantal" style="margin-left: 3px;">Aantal</th>
		<td class="aankopen aantal" style="margin-left: 3px;">Datum</th>
	</tr>
	<?php
	while ($pers = mysql_fetch_object($checkuser))
	{
		$i++;
		$data = substr($pers->datum, 0, -9);
		$data2 = substr($pers->datum, 11);
		$perse = explode("-", $data);
		$array = array($perse[2], $perse[1], $perse[0]);
		$pers->datum = implode($array,"-")." $data2";
	?>
	<tr style="margin-left: 3px;" class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"two"; break;} ?> aankopen">
		<td style="margin-left: 3px;"><a href="index.php?url=profile&id=<?php echo $pers->username; ?>"><?php echo $pers->username; ?></a></td>
		<td style="margin-left: 3px;"><a href="index.php?url=profile&id=<?php echo $user->username; ?>"><?php echo $user->username; ?></a></td>
		<td style="margin-left: 3px;"><?php echo $pers->sterren; ?></td>
		<td style="margin-left: 3px;"><?php echo $pers->datum; ?></td>
	</tr>
   	    <?php 
	}
	?>
</table>		
<script>
$("a.show").click(function () {
	$("div.glipperflexbox").show("slow");
	$("strong.adminDivTwo").show("slow");
	$("span.box1").hide("slow");
	$("span.box2").show("slow");
});		
$("a.hide").click(function () {
	$("strong.adminDivOne").show("slow");
	$("strong.adminDivTwo").hide("slow");
	$("span.box1").show("slow");
	$("span.box2").hide("slow");
});
</script>

</div>
</div>
<?php } ?>
<br>
<span class="hide" style="display:none;">
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Alle donaties</h2> 
</div> 
<div class="glipperflexcont"> 
<table width="100%">
  	<?php
  		$begin = ($_GET['p'] >= 0) ? $_GET['p']*20 : 0;
		$doneren = mysql_query("SELECT cd.*,u.id,u.username,u.ip_last FROM sterren_doneren cd JOIN users u ON (u.id = cd.zender_id) ORDER BY cd.id DESC LIMIT $begin,20");
		if (mysql_num_rows($doneren) == '0')
		{
			echo"<div class=\"hoofdcat\"><b>Er zijn geen donaties!</b></div>";
		}
		else
		{
			?>
			  <tr>
			    <th class="aankopen username">Gebruikersnaam</th>
			    <th class="aankopen username">Verzonden naar</th>
			    <th class="aankopen username">Sterren</th>
			  </tr>

			<?php
			$io = 0;
			for($j=$begin+1; $koop = mysql_fetch_object($doneren); $j++)
			{
				$io++;
				$user2 = mysql_fetch_object(mysql_query("SELECT id,username ,ip_last FROM users WHERE id = '$koop->ontvanger_id'"));
			?>
			<center>
			  <tr class="<?php switch($io %2){case 1: echo"first"; break; case 0: echo"two"; break;} ?> aankopen">
			    <td class="aankopen"><a href="index.php?url=adminusers&ip=<?php echo $koop->ip_last; ?>"><?php echo $koop->username; ?></a></td>
			    <td class="aankopen"><a href="index.php?url=adminusers&ip=<?php echo $user2->ip_last; ?>"><?php echo $user2->username; ?></a></td>
			    <td class="aankopen"><?php echo $koop->sterren; ?></td>
			  </tr>
			</center>
   	    <?php 
			}
		}
			$pageurl = clean($_GET['url']);
            $dbres = mysql_query("SELECT * FROM sterren_doneren");
			print "<table width=98%><tr><td align=\"center\">";
			
			if(mysql_num_rows($dbres) <= 20)
			{
				print "&#60; 1 &#62;</td></tr></table>\n";
			}
			else 
			{
				if($begin/20 == 0)
				{
					print "&#60; ";
				}
				else
				{
					print "<a href=\"index.php?url=$pageurl&p=". ($begin/20-1) ."\">&#60;</a> ";
				}
				
				for($i=0; $i<mysql_num_rows($dbres)/20; $i++) 
				{
					print "<a href=\"index.php?url=$pageurl&p=$i\">". ($i+1) ."</a> ";
				}
			
				if($begin+20 >= mysql_num_rows($dbres))
				{
					print "&#62; ";
				}
				
				else
				{
					print "<a href=\"index.php?url=$pageurl&p=". ($begin/20+1) ."\">&#62;</a>";
				}
				print "</td></tr></table>\n";
			}

		?>
</table>
</div> 
</div>	
</span>
<script>
$("a.show").click(function () {
	$("span.hide").show("slow");
	$("strong.adminDivOne").hide("fast");
	$("strong.adminDivTwo").show("fast");
});		
$("a.hide").click(function () {
	$("strong.adminDivOne").show("fast");
	$("strong.adminDivTwo").hide("fast");
	$("span.hide").hide("slow");
});
</script>
<?php
if (isset($_GET['p']))
{
	?>
	<script>
	$("span.hide").show("slow");
		$("strong.adminDivOne").hide("fast");
	$("strong.adminDivTwo").show("fast");

	</script>
	<?php
}
?><br>