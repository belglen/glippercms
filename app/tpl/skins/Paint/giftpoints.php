<?php
include 'system/header.php';
include 'inc/shopnav.php'; 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<?php
if (isset($_POST['gid']))
{
?>
<div class="content-box"> 
<div class="content-box-orange"> 
<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
    <script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
            $('#notice').hide();
            $('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
</script>
	<?php
	$id = clean($_POST['id']);
	$badge1 = clean($_POST['badge1']);
	$checkid = mysql_query("SELECT * FROM `badge_shop_pakket` WHERE `id`='$id'");
	$checkbadge = mysql_num_rows(mysql_query("SELECT * FROM `user_badges` WHERE `user_id`='$userid' AND badge_id = '$badge1'"));
	if(mysql_num_rows($checkid) == 0)
	{
        echo "Er bestaat geen badge met het aangevraagde id. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
	}
	elseif ($userdata->online == '1')
	{
            echo "Vanwege veiligheidsproblemen mag je niet online zijn op het hotel tijdens het kopen van een badge. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
	}
	else
	{
		$item = mysql_fetch_object($checkid);
		if($userdata->sorry_points < $item->cost)
		{
			echo "Je hebt niet genoeg cadeaupunten. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
		}
		else
		{
                    if ($checkbadge == '0')
                    {
                        echo'<div id="notice">';
                        echo"Bezig met toevoegen.. Een ogenblik geduld!";
                        echo"</div>";
                        echo '<div id="download" style="display: none">';
                        mysql_query("UPDATE `users` SET `sorry_points`=`sorry_points`-'$item->cost' WHERE `id`='$userdata->id'");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge1', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge2', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge3', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge4', '0')");
                        mysql_query("INSERT INTO user_activity (user_id,activity,buy,tijd) VALUES ('$userdata->id', 'badgepack $id','1', NOW())");
                        echo"Je badgepakket is succesvol aangekocht in onze spiksplinternieuwe-geupdate cadeau-badgeshop! Hopelijk mogen we je nog eens verwelkomen in deze shop! Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
                        echo"</div>";
                    }
                    else
                    {
                        echo"Je hebt deze badge al! Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
                    }
		}
	}
	
	?>
	</div>
  </div>
<br>
<?php
}
if(isset($_POST['koop']))
{
?>
<div class="content-box"> 
<div class="content-box-orange"> 
<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
    <script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
            $('#notice').hide();
            $('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
</script>
	<?php
	$id = clean($_POST['id']);
	$badge1 = clean($_POST['badge1']);
	$checkid = mysql_query("SELECT * FROM `badge_shop_pakket` WHERE `id`='$id'");
	$checkbadge = mysql_num_rows(mysql_query("SELECT * FROM `user_badges` WHERE `user_id`='$userid' AND badge_id = '$badge1'"));
	if(mysql_num_rows($checkid) == 0)
	{
        echo "Er bestaat geen badge met het aangevraagde id. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
	}
	elseif ($userdata->online == '1')
	{
            echo "Vanwege veiligheidsproblemen mag je niet online zijn op het hotel tijdens het kopen van een badge. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
	}
	else
	{
		$item = mysql_fetch_object($checkid);
		if($userdata->sorry_points < $item->cost)
		{
			echo "Je hebt niet genoeg cadeaupunten. Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
		}
		else
		{
                    if ($checkbadge == '0')
                    {
                        echo'<div id="notice">';
                        echo"Bezig met toevoegen.. Een ogenblik geduld!";
                        echo"</div>";
                        echo '<div id="download" style="display: none">';
                        mysql_query("UPDATE `users` SET `sorry_points`=`sorry_points`-'$item->cost' WHERE `id`='$userdata->id'");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge1', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge2', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge3', '0')");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge4', '0')");
                        mysql_query("INSERT INTO user_activity (user_id,activity,buy,tijd) VALUES ('$userdata->id', 'badgepack $id','1', NOW())");
                        echo"Je badgepakket is succesvol aangekocht in onze spiksplinternieuwe-geupdate cadeau-badgeshop! Hopelijk mogen we je nog eens verwelkomen in deze shop! Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
                        echo"</div>";
                    }
                    else
                    {
                        echo"Je hebt deze badge al! Klik <a href=\"index.php?url=giftpoints\">hier</a> om terug te gaan.";
                    }
		}
	}
	
	?>
	</div>
  </div>
<br />
<?php
}
if (isset($_POST['rules']))
{
?>
<div class="content-box"> 
<div class="content-box-orange"> 
<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 

<?php
$name = clean($_POST['name']);
$desc = clean($_POST['desc']);
$code = clean($_POST['code']);
if (empty($name))
{
	echo"Je hebt niet alle velden ingevuld.";
}
else
{
	if (empty($desc))
	{
		echo"Je hebt niet alle velden ingevuld.";
	}
	else
	{
		if (empty($code))
		{
			echo"Je hebt niet alle velden ingevuld.";
		}
		else
		{
			if ($userdata->online == '1')
			{
				echo"Je kan helaas niets kopen zolang je online bent.";
			}
			else
			{
?>
    <script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
			$('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
$(document).ready(function () {
    var counter = 6;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
			$('#work').show();
			$('#down2').show();
            clearInterval(id);
      }
    }, 1000);
});
$(document).ready(function () {
    var counter = 8;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
			$('#donje').show();
            clearInterval(id);
      }
    }, 1000);
});
$(document).ready(function () {
    var counter = 10;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
			$('#alesklaar').show();
			$('#donje').hide();
			$('#work').hide();
			$('#down2').hide();
			$('#download').hide();
			$('#notice').hide();
            clearInterval(id);
      }
    }, 1000);
});
</script>
<span id="alesklaar" style="display:none;">
Klaar! Klik <a href="index.php?url=giftpoints">hier</a> om terug te gaan!
</span>
<span id="notice">Bezig met het verwijderen van 1 ster...<?php mysql_query("UPDATE users SET vip_points = vip_points - 1 WHERE id = '$userid'"); ?></span>
<span id="download" style="display:none;">
	<span style="color:green;"> KLAAR!</span>
	<br>Bezig met het toevoegen van de request... <?php mysql_query("INSERT INTO site_requests(badge_id,user_id,name,beschrijving,tijd) VALUES ('$code','$userid','$name','$desc',".time().")"); ?>


</span>
<span id="down2" style="display:none;">
<span style="color:green;"> KLAAR!</span>
</span>
<br><br>
<span id="work" style="display:none;">
Verwerken..
</span>
<span id="donje" style="display:none;">
	<span style="color:green;"> KLAAR!</span>
</span>
<?php
	}
	}
	}
	}
	?>
		</div>
  </div>
<br />

	<?php
}
if (isset($_POST['gobadge']))
{
?>
<div class="content-box"> 
<div class="content-box-orange"> 
<h2 class="title">Terms and Conditions</h2> 
</div> 
<div class="content-box-content"> 
<?php
$name = clean($_POST['naam']);
$desc = clean($_POST['beschrijving']);
$code = clean($_POST['code']);

if (empty($name))
{
	echo"Je hebt niet alle velden ingevuld.";
}
else
{
	if (empty($desc))
	{
		echo"Je hebt niet alle velden ingevuld.";
	}
	else
	{
		if (empty($code))
		{
			echo"Je hebt niet alle velden ingevuld.";
		}
		else
		{
			$filename= 'http://images.habbo.com/c_images/album1584/'.$code.'.gif';
			$file_headers = @get_headers($filename);
			if($file_headers[0] == 'HTTP/1.0 404 Not Found')
			{
				echo"De badgecode bestaat niet.";
			} 
			else 
			{
				if ($userdata->sorry_points < 4)
				{
					echo"Je hebt niet genoeg cadeaupunten.";
				}
				else
				{
			?>
			<center><u><span class="hotspot" onmouseover="tooltip.show('<center><b>Terms and Conditions</b></center><br><br>* Bij elke aanvraag word er 1 ster gepakt, als een soort van bewijs. Nadien krijg je alles terug als je geen rankbadges,.. hebt!<br><br>* De sterren die hier worden betaald zullen niet worden vergoed/terugbetaald. De 1 ster wel (kijk de paragraaf hierboven)..<br><br>* Indien je al 4-5 dagen wacht op jou badge, gelieve Airblender te contacteren!<br><br>* Jouw badge kan ook worden goedgekeurd of niet. Misschien is de badge al in gebruik, of niet? <br><br>* Bij misbruik zullen er grote maatregelen worden genomen.<br><br>* De badge zelf kost geen 1 ster. De badge zelf zal meer cadeaupunten kosten. Die 1 ster is maar een soort van bewijsje tegen misbruik. De echte prijs is 4 cadeaupunten.');" onmouseout="tooltip.hide();">Ga even over deze tekst, voordat je op de knop onderaan duwt!</span></u>
		</center><form method="post"><input type="hidden" name="name" value="<?php echo $name; ?>"><input type="hidden" name="desc" value="<?php echo $desc; ?>"><input type="hidden" name="code" value="<?php echo $code; ?>"><input type="submit" class="glipperflexbtn" name="rules" id="rules" value="Ik ga akkoord met de regels" style="width: 300px; margin: 10px auto; float:none; display:block;"></form>
			<?php
				}
			}	
		}
	}
}
?>
	</div>
  </div>
<br>
<?php
}
?>
  

<div class="content-box"> 
<div class="content-box-black-new"> 
<h2 class="title">Badgepakketen</h2> 

</div> 
<div class="content-box-content">
<?php
$query = mysql_query("SELECT id,badge1,badge2,badge3,badge4,cost FROM `badge_shop_pakket` ORDER BY id ASC");

echo"<table width=\"600px;\">";
echo"<tr><td><b>Badge 1</b></td><td><b>Badge 2</b></td><td><b>Badge 3</b></td><td><b>Badge 4</b></td><td><b>Prijs</b></td><td><b>#</b></td></tr>";
while($info = mysql_fetch_array($query))
{
	echo"<tr>";
	echo"<td><img src=\"r63/c_images/album1584/".$info['badge1'].".gif\" alt=\"\"";
	echo"\" /></td>";
	echo"<td><img src=\"r63/c_images/album1584/".$info['badge2'].".gif\" alt=\"\"";
	echo"\" /></td>";
	echo"<td><img src=\"r63/c_images/album1584/".$info['badge3'].".gif\" alt=\"\"";
	echo"\" /></td>";
	echo"<td><img src=\"r63/c_images/album1584/".$info['badge4'].".gif\" alt=\"\"";
	echo"\" /></td>";
	echo"<td><strong>";
	echo $info['cost'];
	echo"</strong></td><td><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"";
	echo $info['id'];
	echo"\" /><input type=\"hidden\" name=\"badge1\" value=\"";
	echo $info['badge1'];
	echo"\" /><input type=\"submit\" class=\"glipperflexbtn\" name=\"koop\" value=\"Koop\" style=\"width: 100px;\"/></form></td></tr>";
}
echo"</table>";
?>  
</div>
  </div>
  <br>
<div class="content-box"> 
<div class="content-box-black-new"> 
<h2 class="title">Badges (4 Cadeaupunten)</h2> 

</div> 
<div class="content-box-content"> 
<span id="showbadge"></span>
	<table width="80%">
		<form method="post">
			<tr>
				<td>
					Naam Badge
				</td>
				<td>
					<input type="text" name="naam">
				</td>
			</tr>
			<tr>
				<td>
					Beschrijving Badge
				</td>
				<td>
					<input type="text" name="beschrijving">
				</td>
			</tr>
			<tr>
				<td>
					Badgecode
				</td>
				<td>
					<input type="text" name="code" onkeyup="getbadge(this.value);">
				</td>
			</tr>
			<tr>
				<td>
					Ga verder
				</td>
				<td>
					<input type="submit" class="glipperflexbtn" name="gobadge" value="Ga verder">
				</td>
			</tr>
		</form>			
	</table>

</div>
  </div>

</div>

<div id="main_right"> 

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Cadeaupunten</h2> 

	  </div> 

	  <div class="content-box-content"> 

	<img src="app/tpl/skins/Paint/images/gift.gif" align="left"/>
			&nbsp;&nbsp;Je hebt momenteel:<br>
			<b style="font-size: 1.2em;">&nbsp;&nbsp; <?php echo $userdata->sorry_points; ?> Cadeaupunten</b><br /><br />
<strong>Wat zijn Cadeaupunten?</strong><br />
Een cadeaupunt is een nieuw betaalmiddel in Glipperhotel. Je kan ermee zoals sterren, leuke en exclusieve badges mee kopen! <br /><br><p>
<strong>Zijn er voordelen?</strong></br /></p>
Jazeker! Je kan niet alleen badges kopen, maar ook nog de beste meubels, speciaal voor JOU!<br /><br />
<font color="red">Ben je jonger dan 14 jaar? Vraag dan eerst toestemming aan je ouders/verzorgers.</font>

</font>


	  </div>

	</div>
</div> 
<div id="clear"></div></div> 

</body></html>