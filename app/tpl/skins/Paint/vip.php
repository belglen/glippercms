<?php
include 'system/header.php';
include 'inc/shopnav.php';

$userid = $_SESSION['user']['id'];
$user = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$userid'")); 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Vijf willekeurige {hotelName} VIP's (Totaal: <?php
$rows = mysql_num_rows(mysql_query("SELECT * FROM users WHERE vip = '1'"));

$total = $rows-1;

echo "$total";
?>)
</h2> 
</div>
<div class="content-box-content"> 
<?php
$querylist = mysql_query("SELECT * FROM users WHERE vip = 1 ORDER BY RAND() LIMIT 5");
while($row = mysql_fetch_array($querylist))
  {
echo "<div id=\"StaffBox\"><div id=\"StaffBox\">";
echo "<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=";
echo $row['look'];
echo "\"style=\"float:left\"/>";
echo "<div id=\"staff_online\">";
if($row['online'] == 0){
	echo "<div id=\"offline\"><img src=\"app/tpl/skins/Paint/images/offline.gif\"></img></div>";
}
else{
	echo "<div id=\"online\"><img src=\"app/tpl/skins/Paint/images/online.gif\"></img></div>";
}
echo "</div><div id=\"staff_username\"><a href=\"index.php?url=profile&id=".$row['username']."\">";
$username = $row['username'];
echo ucwords($username);
echo "</a></div>";
echo $row['motto'];
echo "</br>";
echo "<img src=\"r63/c_images/album1584/VIP.gif\">";
echo "</div></div><br><hr>";
  }
  ?>
</div></div>

</br>
<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Vijf willekeurige {hotelName} Super VIP's (Totaal: <?php
$rows = mysql_num_rows(mysql_query("SELECT * FROM users WHERE rank = '3'"));

$total = $rows-1;

echo "$total";
?>)
</h2> 
</div>
<div class="content-box-content"> 
<?php
$querylist = mysql_query("SELECT * FROM users WHERE rank = 3 ORDER BY RAND() LIMIT 5");
while($row = mysql_fetch_array($querylist))
  {
echo "<div id=\"StaffBox\"><div id=\"StaffBox\">";
echo "<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=";
echo $row['look'];
echo "\"style=\"float:left\"/>";
echo "<div id=\"staff_online\">";
if($row['online'] == 0){
	echo "<div id=\"offline\"><img src=\"app/tpl/skins/Mango/images/offline.gif\"></img></div>";
}
else{
	echo "<div id=\"online\"><img src=\"app/tpl/skins/Mango/images/online.gif\"></img></div>";
}
echo "</div><div id=\"staff_username\"><a href=\"index.php?url=profile&id=".$row['username']."\">";
$username = $row['username'];
echo ucwords($username);
echo "</a></div>";
echo $row['motto'];
echo "</br>";
echo "<img src=\"r63/c_images/album1584/svip.gif\">";
echo "</div></div><br><hr>";
  }
  ?>
</div></div>


</div> 
</div> 

</div> 
</div> 
<div id="main_right"> 
<?php
if(isset($_POST['vipkopen1']))
{
?>

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Super VIP</h2> 

	  </div> 

	  <div class="content-box-content"> 

<?php
if($user->online == 1)
{
	echo"<strong>Vanwege veiligheidsproblemen mag je niet online zijn op het hotel tijdens het kopen van Super VIP.</strong>";
}
else
{
		if($user->vip_points < 100)
		{
			echo"<strong>Je hebt niet genoeg sterren</strong>";
		}
		else
		{
		if($user->rank >= 3)
		{
			echo"<strong>Je hebt succesvol Super VIP gekocht.			</strong>";
		}
		if($user->rank == 2)
		{
			mysql_query("UPDATE `users` SET `rank`='3' WHERE `id`='$user->id'");
			mysql_query("UPDATE `users` SET `vip`='1',`vip_points`=`vip_points`-'30',`activity_points`=`activity_points`+'50000',`credits`=`credits`+'50000' WHERE `id`='$user->id'");
			echo"<strong>Je hebt succesvol Super VIP gekocht.			</strong>";
		}
		else
		{
		echo"<strong>Je moet eerst VIP zijn voordat je Super VIP kan kopen.</strong>";

			}
		}
	}
?>

</div>	

	  </div>

<?php
}
?>

<?php
if(isset($_POST['vipkopen']))
{
?>

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">VIP</h2> 

	  </div> 

	  <div class="content-box-content"> 

<?php
if($user->online == 1)
{
	echo"<strong>Vanwege veiligheidsproblemen mag je niet online zijn op het hotel tijdens het kopen van VIP.</strong>";
}
else
{
	if($user->vip_points < 40)
	{
		echo"<strong>Je hebt niet genoeg sterren.</strong>";
	}
	else
	{
		echo"<strong>Je hebt succesvol VIP gekocht.</strong>";
		if($user->rank == 1)
		{
			mysql_query("UPDATE `users` SET `rank`='2' WHERE `id`='$user->id'");
		}
		mysql_query("UPDATE `users` SET `vip`='1',`vip_points`=`vip_points`-'40',`activity_points`=`activity_points`+'25000',`credits`=`credits`+'25000' WHERE `id`='$user->id'");
	}
}
?>

</div>	

	  </div>

<?php
}
?>



<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 



	  <div class="content-box-deep-blue2" style="width:290px"> 



	    <h2 class="title" style="padding:0;line-height:30px;">Betalen</h2> 



	  </div> 



	  <div class="content-box-content"> 
<?php
if ($user->vip == '0')
{
?>
<strong>VIP Kopen</strong><br />

VIP kost <strong>40</strong> Sterren! Beschik je niet over het benodigde aantal Sterren? Klik dan <a href="index.php?url=shop">hier</a> om ze te kopen.<br /><br />
<?php
	if($user->vip == 1 && $user->rank > 1)
	{
		echo"<strong>Je bent reeds VIP - Dubbel VIP kopen is overbodig en niet mogelijk.</strong>";
	}
	else
	{

if(isset($_POST['vip']))
{
?>
<form method="post">
<input type="submit" name="vipkopen" value="Bevestig">
</form>
<?php
}
else
{
?>
<form method="post">
<input type="submit" name="vip" value="Koop!">
</form>
<?php
}
}
}
else
{
?>
<strong>Super VIP Kopen</strong><br />

Super VIP kost <strong>30</strong> Sterren! Beschik je niet over het benodigde aantal Sterren? Klik dan <a href="index.php?url=shop">hier</a> om ze te kopen.<br /><br />
<?php
	if($user->rank >= 3)
	{
		echo"<strong>Je bent reeds Super VIP - Dubbel Super VIP kopen is overbodig en niet mogelijk.</strong>";
	}
	else
	{

if(isset($_POST['vip']))
{
?>
<form method="post">
<input type="submit" name="vipkopen1" value="Bevestig">
</form>
<?php
}
else
{
?>
<form method="post">
<input type="submit" name="vip" value="Koop!">
</form>
<?php
}
}
?>

<?php	
}
?>

<br /><br /><br />
</div>	



	  </div>



	



<div class="content-box" style="width:300px; margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 



	  <div class="content-box-deep-blue2" style="width:290px"> 



	    <h2 class="title" style="padding:0;line-height:30px;">Voordelen van VIP</h2> 



	  </div> 



	  <div class="content-box-content"> 


<img style="float: left;" src="app/tpl/skins/Paint/images/VIP.gif" alt="" width="50" height="50" /><strong>Cadeau's:</strong><br />

Bij het aanschaffen van een VIP Lidmaatschap ontvang je van ons deze unieke badge. Tevens mag je een badge uitkiezen naar keuze. Ook ontvang je nog eens 25.000 credits en 25.000 pixels.<br /><br />

<strong>Commando's:</strong><br />

Als VIP heb je speciale commando's, waarmee je leuke maar ook handige dingen kunt doen. Tot nu toe krijg je als VIP het commando <font color="grey">:moonwalk</font>, <font color="grey">:pull</font>, <font color="grey">:push</font> en <font color="grey">:flagme</font>. Hiermee kun je o.a. je naam veranderen en speciale moves maken.<br /><br />

<strong>Uitgebreide Catalogus:</strong><br />

De VIP Catalogus bevat alle seizoensmeubels het hele jaar door. Een zomers kamertje, winters kamertje of een geheel ander thema kun jij dus het hele jaar bouwen. Tevens krijg je toegang tot verschillende customs en heb jij i.p.v. een Catalogus Zeldzaam per week, twee Catalogus Zeldzaams per week.<br /><br />

<i><font color="grey">Buiten deze voordelen, zijn er nog een aantal zelf te ontdekken. Je krijgt bijvoorbeeld ook dubbele credits ieder kwartier!</font></i>
	




</div> 
</div><br/><br/> 

<div class="content-box" style="width:300px; margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 



	  <div class="content-box-deep-blue2" style="width:290px"> 



	    <h2 class="title" style="padding:0;line-height:30px;">Voordelen van Super VIP</h2> 



	  </div> 



	  <div class="content-box-content"> 


<img style="float: left;" src="app/tpl/skins/Mango/images/SVP.gif" alt="" width="35" height="35" /><strong>Cadeau's:</strong><br />

Bij het aanschaffen van een Super VIP Lidmaatschap ontvang je van ons deze unieke badge.<br /><br />

<strong>Commando's:</strong><br />

Als Super VIP heb je speciale commando's, waarmee je leuke maar ook handige dingen kunt doen. Tot nu toe krijg je als Super VIP het commando <font color="grey">:spull</font>, <font color="grey">:enable</font> en <font color="grey">:setspeed</font>. Hiermee kan je iemand van ver naar je toe laten lopen, effecten dragen en rollers sneller laten gaan.<br /><br />

<strong>Uitgebreide Catalogus:</strong><br />

De Super VIP Catalogus bevat de nieuwste zeldzaamste meubels. Deze meubels kunnen alleen Super VIP's kopen en niemand anders.<br /><br />

<i><font color="grey">Buiten deze voordelen, heb je ook nog het voordeel dat je geen typverbod meer kan krijgen!</font></i>
	

</div> 
</div><br/><br/> 

</div> 
<div id="clear">
<?php
include 'footer.php';
?></div></div> 
</div> 
